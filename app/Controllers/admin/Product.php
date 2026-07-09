<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\coreModule\SettingModel;
use App\Models\Cms\ProductModel;
use App\Models\Cms\SolutionModel;
use App\Models\Cms\SectorModel;
use App\Models\Cms\ProductCategoryModel;
use App\Models\Cms\IndustryModel;
use App\Models\Cms\ServiceModel;

class Product extends BaseController
{
    public $config_logo;

    public function __construct()
    {
        $settingModel = new SettingModel();
        $default_img = $settingModel->asObject()->where(array('key'=>'config_logo'))->first();
        $this->config_logo = $default_img->value;     
    }

    public function category(){
        $model = new ProductCategoryModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
           return  redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Category List';

        $query = array();
        $like = array();
        if(!empty($_GET['type'])){
            $query['type'] = $_GET['type'];
        }

        if(!empty($_GET['name'])){
            $like['name'] = $_GET['name']; 
        }

        if (empty($query) && empty($like) ) {
            $query['parent'] = 0;
        }

        // pagination
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->where($query)->like($like)->orderBy('id','asc')->paginate($data['perPage']);
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

        $data['total'] = $model->where($query)->like($like)->countAllResults();

        $data['data'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        $data['pages'] = round($data['total']/$data['perPage']);
        $data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];
        
        $data['config_logo'] = $this->config_logo;
        echo view('admin/product/category',$data);
    }

    public function add_category($id=false)
    {
        error_reporting(0);

        $model = new ProductCategoryModel();
        $data['categoryList'] = $model->asObject()->where('parent',0)->findAll();
        $data['layoutList'] =   array('only_sub_category'=>'Sub Category without industry Serve','with_subcategory'=>'Sub Category with industry Serve','only_product'=>'Only Product List');

        $IndustryModel = new IndustryModel();
        $data['industryList'] = $IndustryModel->asObject()->where('status',1)->orderBy('id','asc')->findAll();

        if(!empty($id)) {
            $data['page_title'] = ' Edit Category';
            $data['form_action'] ='admin/add_category/'.$id;
            $row = $model->asObject()->where(array('id'=>$id))->first();
        
            $data['name'] =  $row->name; 
            $data['shortDescription'] =  $row->shortDescription;    
            $data['description'] =  $row->description;   
            $data['image'] = $row->image; 
            $data['sortOrder'] = $row->sortOrder; 
            $data['status'] = $row->status; 
            $data['slug'] = $row->slug; 

            $data['metaTitle'] = $row->metaTitle; 
            $data['metaKeyword'] = $row->metaKeyword; 
            $data['metaDescription'] = $row->metaDescription; 
            $data['parent'] = $row->parent;
            $data['layout'] = $row->layout;
            $data['bottomImage'] = $row->bottomImage;
            $data['industry'] = json_decode($row->industry);
            $data['standardList'] = $this->AdminModel->all_fetch('category_standard',array('category_id'=>$row->id));
        }else{
            $data['page_title'] = ' Add Category';
            $data['form_action'] ='admin/add_category';

            $data['name'] = '';  
            $data['shortDescription'] = '';    
            $data['description'] = '';     
            $data['image'] = ''; 
            $data['sortOrder'] = ''; 
            $data['status'] = ''; 
            $data['slug'] = ''; 

            $data['metaTitle'] =''; 
            $data['metaKeyword'] = ''; 
            $data['metaDescription'] = ''; 
            $data['parent'] = ''; 
            $data['layout'] = ''; 
            $data['bottomImage'] = '';
            $data['industry'] = array();
            $data['standardList'] =array();
        }

        // FIXED: Modernized to check for post request streams safely
        if($this->request->is('post')){
            $rules = [
                'name'=>'trim'
            ];
        
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
            } else{
                $save= array();
                $save['info']['name'] = $this->request->getVar('name'); 
                $save['info']['shortDescription'] =  $this->request->getVar('shortDescription');    
                $save['info']['description'] =  $this->request->getVar('description');     
                $save['info']['sortOrder'] =  $this->request->getVar('sortOrder'); 
                $save['info']['status'] =  $this->request->getVar('status'); 
                $save['info']['layout'] =  trim($this->request->getVar('layout')); 

                $save['info']['industry'] = json_encode($this->request->getVar('industry'));

                if (!empty($this->request->getVar('slug'))) {
                    $save['info']['slug'] =  sfu($this->request->getVar('slug'));
                }else{
                    $save['info']['slug'] =  sfu($this->request->getVar('name'));
                }

                $save['info']['metaTitle'] =  $this->request->getVar('metaTitle'); 
                $save['info']['metaKeyword'] =  $this->request->getVar('metaKeyword');  
                $save['info']['metaDescription'] =  $this->request->getVar('metaDescription'); 
                $save['info']['parent'] =  $this->request->getVar('parent'); 

                $file = $this->request->getFile('image');
                if(!empty($_FILES['image']['name'])){
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/images/', $file_name)){
                            $save['info']['image'] = 'uploads/images/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                $file = $this->request->getFile('bottomImage');
                if(!empty($_FILES['bottomImage']['name'])){
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/images/', $file_name)){
                            $save['info']['bottomImage'] = 'uploads/images/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                $save['featureTitle'] = $this->request->getVar('featureTitle'); 
                $save['featureDescription'] = $this->request->getVar('featureDescription'); 
                $save['featureSortOrder'] = $this->request->getVar('featureSortOrder'); 

                if ($id) {
                    $save['id'] = $id;
                    $result=  $model->update(array('id'=>$id),$save['info']);
                    if ($result) {
                        $model->save_standard($save);
                        $this->session->setFlashdata('success','Record Update successfully');
                        return redirect()->to('admin/add_category/'.$id);
                    }else{
                        $this->session->setFlashdata('error','Record not update');
                        return redirect()->to('admin/add_category/'.$id);
                    }
                }else{
                    $result=  $model->insert($save['info']);
                    if ($result) {
                        $save['id'] = $result;
                        $model->save_standard($save);
                        $this->session->setFlashdata('success','Record insert successfully');
                        return redirect()->to('admin/category');
                    }else{
                        $this->session->setFlashdata('error','Record not insert');
                        return redirect()->to('admin/add_category');
                    }
                }
            }
        }
        return view('admin/product/add_category',$data);
    }
    
    public function delete_category(){
        if ($this->request->getVar()) {
            $model = new ProductCategoryModel();
            $id = $this->request->getVar('selected');
            if ($id) {
                foreach($id as $value){
                    $model->delete(array('id'=>$value));
                    $this->AdminModel->deleteData('category_standard',array('category_id'=>$value));
                }
                $this->session->setFlashdata('success','Record Delete successfully');
            }else{
                $this->session->setFlashdata('error','');
            }
        }
        return redirect()->to('admin/category');
    }

    public function products(){
        $categogryModel = new ProductCategoryModel();
        $data['categoryList'] = $categogryModel->asObject()->where('parent',0)->findAll();

        $model = new ProductModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
           return  redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Products List';

        $query = array();
        $like = array();
        if(!empty($_GET['type'])){
            $query['products.type'] = $_GET['type'];
        }

        if(!empty($_GET['name'])){
            $like['products.name'] = $_GET['name']; 
        }

        // pagination
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->select('products.*,sl.name as category_name')->join('categories sl','products.category_id=sl.id','left')->where($query)->like($like)->orderBy('products.id','asc')->paginate($data['perPage']);
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

        $data['total'] = $model->where($query)->like($like)->countAllResults();

        $data['data'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        $data['pages'] = round($data['total']/$data['perPage']);
        $data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];

        $data['config_logo'] = $this->config_logo;
        echo view('admin/product/products',$data);
    }
      
    public function add_product($id=false)
    {
        $solutionModel = new SectorModel();
        $categogryModel = new ProductCategoryModel();
        $data['categoryList'] = $categogryModel->asObject()->where('parent',0)->findAll();

        $model = new ProductModel();
        $db = \Config\Database::connect(); // Initialize Core Database Connection Builder

        $IndustryModel = new IndustryModel(); 
        $data['inudstryList'] = $IndustryModel->asObject()->select('id,name')->where('status',1)->findAll(); 
     
        if(!empty($id)) {
            $data['page_title'] = ' Edit Product';
            $data['form_action'] ='admin/add_product/'.$id;
            $row = $model->asObject()->where(array('id'=>$id))->first();
          
            $data['name'] =  $row->name;   
            $data['shortDescription'] = $row->shortDescription;
            $data['description'] = $row->description;
            $data['category_id'] = $row->category_id;
            $data['metaTitle'] = $row->metaTitle;
            $data['metaKeyword'] = $row->metaKeyword; 
            $data['metaDescription'] = $row->metaDescription;
            $data['status'] = $row->status; 
            $data['feature'] = $row->feature;
            $data['slug'] = $row->slug; 
            $data['image'] = $row->image;
            $data['thumbnail'] = $row->thumbnail; 
            $data['hero_banner'] = isset($row->hero_banner) ? $row->hero_banner : '';
            $data['solution'] = $row->solution; 
            
            $data['keyTitle'] = $row->keyTitle; 
            $data['keyDescription'] = $row->keyDescription; 
            $data['caseTitle'] = $row->caseTitle; 
            $data['casetDescription'] = $row->casetDescription; 
            $data['industryTitle'] = $row->industryTitle; 
            $data['industryDescription'] = $row->industryDescription; 
            
            // ========================================================
            // FETCH RECOVERY ENGINE: Load Product Overview Context Fields
            // ========================================================
            $data['overviewEyebrow'] = isset($row->overviewEyebrow) ? $row->overviewEyebrow : '';
            $data['overviewTitle']   = isset($row->overviewTitle) ? $row->overviewTitle : '';
            
            $data['industries'] = json_decode($row->industries); 

            $data['featureList'] = $this->AdminModel->all_fetch('cyb_product_feature',array('product_id'=>$row->id)); 
            $data['capabilitiesList'] = $this->AdminModel->all_fetch('cyb_product_capabilities',array('product_id'=>$row->id)); 
            $data['imagesList'] = $this->AdminModel->all_fetch('cyb_product_images',array('product_id'=>$row->id)); 

            // FETCH OVERVIEW REPEATER MATRIX: Load current point list rows securely
            $data['overviewMatrixList'] = $db->table('cyb_product_overview_matrix')
                                             ->where('product_id', $row->id)
                                             ->orderBy('sort_order', 'ASC')
                                             ->get()
                                             ->getResult();

            // FETCH EXSTING TESTIMONIALS: Load from table during edit execution cycles
            $data['testimonialsList'] = $db->table('cyb_testimonials')
                                           ->where('product_id', $row->id)
                                           ->orderBy('sort_order', 'ASC')
                                           ->get()
                                           ->getResult();
            
            $data['partnershipSubheading']  = isset($row->partnershipSubheading) ? $row->partnershipSubheading : 'Strategic Value';
            $data['partnershipTitle']       = isset($row->partnershipTitle) ? $row->partnershipTitle : 'Why Our Partnerships Matter';
            $data['partnershipDescription'] = isset($row->partnershipDescription) ? $row->partnershipDescription : '';

            // ========================================================================
// FIXED RELATIONAL RETRIEVAL: TARGETS THE SANITIZED PARAMETER ID DIRECTLY
// ========================================================================
$data['partnershipCardsList'] = $db->table('cyb_product_partnership_cards')
                                   ->where('product_id', $id) // Changed from $row->id to $id
                                   ->orderBy('sort_order', 'ASC')
                                   ->get()
                                   ->getResult();
// ========================================================================
        }else{
            $data['page_title'] = ' Add Product';
            $data['form_action'] ='admin/add_product';
            $data['name'] =  '';     
            $data['shortDescription'] =  ''; 
            $data['description'] =  ''; 
            $data['category_id'] =  ''; 
            $data['metaTitle'] =  ''; 
            $data['metaKeyword'] =  '';  
            $data['metaDescription'] =  ''; 
            $data['status'] =  ''; 
            $data['feature'] =  ''; 
            $data['slug'] =  '';  
            $data['image'] = '';
            $data['thumbnail'] = '';
            $data['hero_banner'] = '';
            $data['solution'] = '';
            
            $data['keyTitle'] = '';
            $data['keyDescription'] = '';
            $data['caseTitle'] = '';
            $data['casetDescription'] ='';
            $data['industryTitle'] ='';
            $data['industryDescription'] = '';

            // INITIAL BLANK ARRAYS DEFAULT CONFIGURATION
            $data['overviewEyebrow'] = 'Understanding Platform Context';
            $data['overviewTitle']   = 'Product Overview';

            $data['featureList'] = array();
            $data['capabilitiesList'] = array();
            $data['imagesList'] = array();
            $data['industries'] = array();
            $data['testimonialsList'] = array(); 
            $data['overviewMatrixList'] = array();
            
            $data['partnershipSubheading']  = 'Strategic Value';
            $data['partnershipTitle']       = 'Why Our Partnerships Matter';
            $data['partnershipDescription'] = '';
            $data['partnershipCardsList']   = array();
        }

        if ($this->request->is('post')) {
            $rules = [
                'name' =>'required'
            ];     
                
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
            } else{
                $save= array();
                $save['info']['name'] = $this->request->getVar('name');
                $save['info']['shortDescription'] = $this->request->getVar('shortDescription');
                $save['info']['description'] = $this->request->getVar('description');
                $save['info']['category_id'] = $this->request->getVar('category_id');
                $save['info']['metaTitle'] = $this->request->getVar('metaTitle');
                $save['info']['metaKeyword'] = $this->request->getVar('metaKeyword');
                $save['info']['metaDescription'] = $this->request->getVar('metaDescription');
                $save['info']['status'] = $this->request->getVar('status');

                $save['info']['keyTitle'] = $this->request->getVar('keyTitle');
                $save['info']['keyDescription'] = $this->request->getVar('keyDescription');
                $save['info']['caseTitle'] = $this->request->getVar('caseTitle');
                $save['info']['casetDescription'] = $this->request->getVar('casetDescription');
                $save['info']['industryTitle'] = $this->request->getVar('industryTitle');
                $save['info']['industryDescription'] = $this->request->getVar('industryDescription');

                $save['info']['overviewEyebrow'] = $this->request->getVar('overviewEyebrow');
                $save['info']['overviewTitle']   = $this->request->getVar('overviewTitle');

                $save['info']['industries'] = json_encode($this->request->getVar('industries'));
                
                $save['info']['partnershipSubheading']  = $this->request->getPost('partnershipSubheading');
                $save['info']['partnershipTitle']       = $this->request->getPost('partnershipTitle');
                $save['info']['partnershipDescription'] = $this->request->getPost('partnershipDescription');

                // ========================================================================
                // FIXED EXTRACTION SYSTEM: MATCHED EXACTLY TO VIEW SELECT ELEMENTS NAME 'partnerCardIcon'
                // ========================================================================
                $save['partnerCardTitle']     = $this->request->getPost('partnerCardTitle');
$save['partnerCardDesc']      = $this->request->getPost('partnerCardDesc');
$save['partnerCardIcon']      = $this->request->getPost('partnerCardIcon'); // Synced completely
$save['partnerCardSortOrder'] = $this->request->getPost('partnerCardSortOrder');
                // ========================================================================

                if (!empty($this->request->getVar('slug'))) {
                   $save['info']['slug'] = sfu($this->request->getVar('slug'));
                }else{
                   $save['info']['slug'] = sfu($this->request->getVar('name'));
                }

                if(!empty($_FILES['thumbnail']['name'])){
                    $file = $this->request->getFile('thumbnail');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['thumbnail'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                if(!empty($_FILES['image']['name'])){
                    $file = $this->request->getFile('image');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['image'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                if(!empty($_FILES['hero_banner']['name'])){
                    $file = $this->request->getFile('hero_banner');
                    if($file && $file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['hero_banner'] = 'uploads/product/'.$file_name;
                        }
                    } else {
                        $uploadError = $file ? $file->getErrorString() : 'File system stream rejected';
                        $this->session->setFlashdata('error', 'Hero Banner Error: ' . $uploadError);
                        return redirect()->to($id ? 'admin/add_product/'.$id : 'admin/add_product');
                    }
                }

                // features / use cases upload mapping logic
                $uploadImgData = array();
                if ($this->request->getFileMultiple('featureImages')) {
                    foreach($this->request->getFileMultiple('featureImages') as $key => $file)
                    {  
                        if($file->isValid() && !$file->hasMoved()){
                            $file_name = $file->getRandomName();
                            if($file->move('uploads/product/', $file_name)){
                                $uploadImgData[$key] = 'uploads/product/'.$file_name;
                            }     
                        }
                    }
                }
                            
                $save['featureImages'] = $uploadImgData;
                $save['feature_old_image'] = $this->request->getVar('feature_old_image');
                $save['featureTitle'] = $this->request->getVar('featureTitle'); 
                $save['featureDescription'] = $this->request->getVar('featureDescription');
                $save['featureSortOrder'] = $this->request->getVar('featureSortOrder'); 
                $save['featureYoutube'] = $this->request->getVar('featureYoutube');

                // capabilities / key features array pipeline
                $save['capabilitiesTitle'] = $this->request->getVar('capabilitiesTitle'); 
                $save['capabilitiesDescription'] = $this->request->getVar('capabilitiesDescription'); 
                $save['capabilitiesSortOrder'] = $this->request->getVar('capabilitiesSortOrder'); 

                // gallery additional images uploads
                $uploadimagesData = array();
                if ($this->request->getFileMultiple('images')) {
                    foreach($this->request->getFileMultiple('images') as $key => $file)
                    {  
                        if($file->isValid() && !$file->hasMoved()){
                            $file_name = $file->getRandomName();
                            if($file->move('uploads/product/', $file_name)){
                                $uploadimagesData[$key] = 'uploads/product/'.$file_name;
                            }     
                        }
                    }
                }
                            
                $save['images'] = $uploadimagesData;
                $save['old_image'] = $this->request->getVar('old_image');
                $save['imageSortOrder'] = $this->request->getVar('imageSortOrder'); 

                // Execute core product table transactional storage via product Model logic
                if ($id) {
                    $save['id'] = $id;
                    $result = $model->save_product($save);
                } else {
                    $save['id'] = '';
                    $result = $model->save_product($save);
                    if ($result) {
                        $id = $result; 
                    }
                }

                if ($result) {
                    // ========================================================
                    // REPEATER PROCESSING PIPELINE: Save Overview Matrix List
                    // ========================================================
                    $db->table('cyb_product_overview_matrix')->where('product_id', $id)->delete();
                    $mLabels      = $this->request->getPost('overviewMatrixLabel');
                    $mTexts       = $this->request->getPost('overviewMatrixText');
                    $mSortOrders  = $this->request->getPost('overviewMatrixSortOrder');

                    if (!empty($mLabels)) {
                        foreach ($mLabels as $idx => $mLabel) {
                            if (empty(trim($mLabel))) continue;
                            $db->table('cyb_product_overview_matrix')->insert([
                                'product_id' => $id,
                                'label'      => esc($mLabel),
                                'text'       => esc($mTexts[$idx]),
                                'sort_order' => isset($mSortOrders[$idx]) ? (int)$mSortOrders[$idx] : 0
                            ]);
                        }
                    }

                    // ========================================================================
                    // FIXED ADMIN LAYER: Removed double 'cyb_' prefix handling
                    // ========================================================================
                    $db->table('product_partnership_cards')->where('product_id', $id)->delete(); // <-- REMOVED "cyb_"

                    $pCardTitles     = $this->request->getPost('partnerCardTitle');
                    $pCardDescs      = $this->request->getPost('partnerCardDesc');
                    $pCardIcons      = $this->request->getPost('partnerCardIcon');
                    $pCardSortOrders = $this->request->getPost('partnerCardSortOrder');

                    if (!empty($pCardTitles)) {
                        foreach ($pCardTitles as $idx => $pCardTitle) {
                            if (empty(trim($pCardTitle))) continue;
                            
                            $db->table('product_partnership_cards')->insert([ // <-- REMOVED "cyb_"
                                'product_id'  => $id,
                                'title'       => esc($pCardTitle),
                                'description' => isset($pCardDescs[$idx]) ? esc($pCardDescs[$idx]) : '',
                                'icon_class'  => !empty($pCardIcons[$idx]) ? $pCardIcons[$idx] : 'fas fa-handshake',
                                'sort_order'  => isset($pCardSortOrders[$idx]) ? (int)$pCardSortOrders[$idx] : 0
                            ]);
                        }
                    }
                    // ========================================================

                    // ========================================================
                    // REPEATER PROCESSING PIPELINE: Save Client Testimonials
                    // ========================================================
                    $db->table('cyb_testimonials')->where('product_id', $id)->delete();

                    $tNames        = $this->request->getPost('testimonialName');
                    $tDesignations = $this->request->getPost('testimonialDesignation');
                    $tDescriptions = $this->request->getPost('testimonialDescription');
                    $tSortOrders   = $this->request->getPost('testimonialSortOrder');
                    $tOldImages    = $this->request->getPost('testimonial_old_image');
                    $tFiles        = $this->request->getFiles();

                    if (!empty($tNames)) {
                        foreach ($tNames as $idx => $tName) {
                            if (empty(trim($tName))) continue;

                            $finalImagePath = isset($tOldImages[$idx]) ? $tOldImages[$idx] : '';
                            
                            if (isset($tFiles['testimonialImages'][$idx])) {
                                $tFile = $tFiles['testimonialImages'][$idx];
                                if ($tFile->isValid() && !$tFile->hasMoved()) {
                                    $tNewName = $tFile->getRandomName();
                                    $tFile->move('uploads/testimonials/', $tNewName);
                                    $finalImagePath = 'uploads/testimonials/' . $tNewName;
                                }
                            }

                            $db->table('cyb_testimonials')->insert([
                                'product_id'  => $id,
                                'name'        => esc($tName),
                                'designation' => esc($tDesignations[$idx]),
                                'description' => esc($tDescriptions[$idx]),
                                'image'       => $finalImagePath,
                                'sort_order'  => isset($tSortOrders[$idx]) ? (int)$tSortOrders[$idx] : 0,
                                'create_date' => date('Y-m-d H:i:s')
                            ]);
                        }
                    }

                    $this->session->setFlashdata('success', 'Record saved successfully');
                    return redirect()->to('admin/add_product/' . $id);
                } else {
                    $this->session->setFlashdata('error', 'Error inside transaction handling sequence');
                    return redirect()->to($id ? 'admin/add_product/'.$id : 'admin/add_product');
                }
            }
        }
        echo view('admin/product/add_product',$data);
    }

    public function delete_products(){
        $model = new ProductModel();
        if ($this->request->getVar()) {
            $id = $this->request->getVar('selected');
          
            if ($id) {
                $db = \Config\Database::connect();
                foreach ($id as $key => $value) {
                    $model->delete(array('id'=>$value));
                    $this->AdminModel->deleteData('product_feature',array('product_id'=>$value));
                    $this->AdminModel->deleteData('product_capabilities',array('product_id'=>$value));
                    $this->AdminModel->deleteData('product_images',array('product_id'=>$value));
                    
                    // CASCADE DELETION LAYER: Drops matching rows instantly
                    $db->table('cyb_testimonials')->where('product_id', $value)->delete();
                }     
                $this->session->setFlashdata('success','Record Delete successfully'); 
            }else{
                $this->session->setFlashdata('error','');
            }
        }
        return redirect()->to('admin/products');
    }

    public function solutions(){
        $model = new SolutionModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
           return  redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Solution List';

        $query = array();
        $like = array();
        if(!empty($_GET['type'])){
            $query['type'] = $_GET['type'];
        }

        if(!empty($_GET['name'])){
            $like['name'] = $_GET['name']; 
        }

        // pagination
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->where($query)->like($like)->orderBy('id','asc')->paginate($data['perPage']);
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

        $data['total'] = $model->where($query)->like($like)->countAllResults();

        $data['data'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        $data['pages'] = round($data['total']/$data['perPage']);
        $data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];

        $data['config_logo'] = $this->config_logo;
        echo view('admin/product/solutions',$data);
    }
      
    public function add_solution($id=false)
    {
        $model = new SolutionModel();
     
        if(!empty($id)) {
            $data['page_title'] = ' Edit Solution';
            $data['form_action'] ='admin/add_solution/'.$id;
            $row = $model->asObject()->where(array('id'=>$id))->first();
          
            $data['name'] =  $row->name;   
            $data['shortDescription'] = $row->shortDescription;
            $data['description'] = $row->description;
            $data['featureHeading'] = $row->featureHeading;
            $data['metaTitle'] = $row->metaTitle;
            $data['metaKeyword'] = $row->metaKeyword; 
            $data['metaDescription'] = $row->metaDescription;
            $data['status'] = $row->status; 
            $data['feature'] = $row->feature;
            $data['offering'] = $row->offering;
            $data['slug'] = $row->slug; 
            $data['image'] = $row->image;
            $data['thumbnail'] = $row->thumbnail; 
            $data['productTitle'] = $row->productTitle; 
            $data['productDescription'] = $row->productDescription; 
            $data['feeTitle'] = $row->feeTitle; 
            $data['feeDescription'] = $row->feeDescription; 
            $data['securityTitle'] = $row->securityTitle; 
            $data['securityDescription'] = $row->securityDescription; 
            $data['processTitle'] =  $row->processTitle; 
            $data['processDescription'] =  $row->processDescription; 

            $data['featureList'] = $this->AdminModel->all_fetch('solution_feature',array('solution_id'=>$row->id)); 
            $data['feeList'] = $this->AdminModel->all_fetch('solution_fee',array('solution_id'=>$row->id)); 
        }else{
            $data['page_title'] = ' Add Solution';
            $data['form_action'] ='admin/add_solution';
            $data['name'] =  '';     
            $data['shortDescription'] =  ''; 
            $data['description'] =  ''; 
            $data['featureHeading'] =  ''; 
            $data['metaTitle'] =  ''; 
            $data['metaKeyword'] =  '';  
            $data['metaDescription'] =  ''; 
            $data['status'] =  ''; 
            $data['feature'] =  ''; 
            $data['slug'] =  '';  
            $data['image'] = '';
            $data['thumbnail'] = '';
            $data['productTitle'] =  '';
            $data['productDescription'] = '';
            $data['feeTitle'] = '';
            $data['feeDescription'] = '';
            $data['securityTitle'] = '';
            $data['securityDescription'] =  '';
            $data['processTitle'] =  '';
            $data['processDescription'] =  '';
            $data['offering'] =  '';

            $data['featureList'] = array();
            $data['feeList'] = array();
        }

        // FIXED: Switched to is('post') stream layer validation
        if ($this->request->is('post')) {
            $rules = [
                'name' =>'required'
            ];     
                
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
            } else{
                $save= array();
                $save['info']['name'] = $this->request->getVar('name');
                $save['info']['shortDescription'] = $this->request->getVar('shortDescription');
                $save['info']['description'] = $this->request->getVar('description');
                $save['info']['featureHeading'] = $this->request->getVar('featureHeading');
                $save['info']['metaTitle'] = $this->request->getVar('metaTitle');
                $save['info']['metaKeyword'] = $this->request->getVar('metaKeyword');
                $save['info']['metaDescription'] = $this->request->getVar('metaDescription');
                $save['info']['status'] = $this->request->getVar('status');
                $save['info']['feature'] = $this->request->getVar('feature');
                $save['info']['productTitle'] = $this->request->getVar('productTitle');
                $save['info']['productDescription'] = $this->request->getVar('productDescription');
                $save['info']['feeTitle'] = $this->request->getVar('feeTitle');
                $save['info']['feeDescription'] = $this->request->getVar('feeDescription');
                $save['info']['securityTitle'] = $this->request->getVar('securityTitle');
                $save['info']['securityDescription'] = $this->request->getVar('securityDescription');
                $save['info']['processTitle'] = $this->request->getVar('processTitle');
                $save['info']['processDescription'] = $this->request->getVar('processDescription');
                $save['info']['offering'] = $this->request->getVar('offering');

                if (!empty($this->request->getVar('slug'))) {
                   $save['info']['slug'] = sfu($this->request->getVar('slug'));
                }else{
                   $save['info']['slug'] = sfu($this->request->getVar('name'));
                }

                if(!empty($_FILES['thumbnail']['name'])){
                    $file = $this->request->getFile('thumbnail');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['thumbnail'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                if(!empty($_FILES['image']['name'])){
                    $file = $this->request->getFile('image');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['image'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                $uploadImgData = array();
                if ($this->request->getFileMultiple('images')) {
                    foreach($this->request->getFileMultiple('images') as $key => $file)
                    {  
                        if($file->isValid() && !$file->hasMoved()){
                            $file_name = $file->getRandomName();
                            if($file->move('uploads/product/', $file_name)){
                                $uploadImgData[$key] = 'uploads/product/'.$file_name;
                            }     
                        }
                    }
                }
                            
                $save['images'] = $uploadImgData;
                $save['old_image'] = $this->request->getVar('old_image');

                $save['title'] = $this->request->getVar('title'); 
                $save['featureDescription'] = $this->request->getVar('featureDescription'); 
                $save['feature_sort_order'] = $this->request->getVar('feature_sort_order'); 

                $save['area'] = $this->request->getVar('area'); 
                $save['price'] = $this->request->getVar('price'); 
                $save['arrival'] = $this->request->getVar('arrival'); 

                if ($id) {
                    $save['id'] = $id;
                    $result = $model->save_solution($save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record Update successfully');
                        return redirect()->to('admin/add_solution/'.$id);
                    }else{
                        $this->session->setFlashdata('error','Error in Update ');
                        return redirect()->to('admin/add_solution/'.$id);
                    }
                }else{
                    $save['id'] = '';
                    $result = $model->save_solution($save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record Insert successfully');
                        return redirect()->to('admin/solutions');
                    }else{
                        $this->session->setFlashdata('success','Record not inserted');
                        return redirect()->to('admin/add_solution');
                    }
                }
            }
        }
        return view('admin/product/add_solution',$data);
    }

    public function delete_solutions(){
        $model = new SolutionModel();
        if ($this->request->getVar()) {
            $id = $this->request->getVar('selected');
          
            if ($id) {
                foreach ($id as $key => $value) {
                    $model->delete(array('id'=>$value));
                    $this->AdminModel->deleteData('solution_feature',array('solution_id'=>$value));
                    $this->AdminModel->deleteData('solution_fee',array('solution_id'=>$value));
                }     
                $this->session->setFlashdata('success','Record Delete successfully'); 
            }else{
                $this->session->setFlashdata('error','');
            }
        }
        return redirect()->to('admin/solutions');
    }

    public function sectors(){
        $model = new SectorModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
           return  redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Sectors List';
        $data['detail'] = $model->asObject()->findAll();

        // pagination
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->orderBy('id','asc')->paginate($data['perPage']);
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

        $data['total'] = $model->countAllResults();

        $data['data'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        $data['pages'] = round($data['total']/$data['perPage']);
        $data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];

        $data['config_logo'] = $this->config_logo;
        echo view('admin/product/sectors',$data);
    }
      
    public function add_sector($id=false)
    {
        $model = new SectorModel();
     
        if(!empty($id)) {
            $data['page_title'] = ' Edit Sector';
            $data['form_action'] ='admin/add_sector/'.$id;
            $row = $model->asObject()->where(array('id'=>$id))->first();
            $data['name'] =  $row->name;   
            $data['image'] = $row->image;
            $data['status'] = $row->status; 
        }else{
            $data['page_title'] = ' Add Sector';
            $data['form_action'] ='admin/add_sector';
            $data['name'] =  '';    
            $data['image'] =  ''; 
            $data['status'] =  ''; 
        }

        // FIXED: Switched to is('post') validation layer mechanics
        if ($this->request->is('post')) {
            $rules = [
                'name' =>'required'
            ];     
                
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
            } else{
                $save= array();
                $save['name'] =     $this->request->getVar('name');
                $save['status'] =     $this->request->getVar('status');

                $file = $this->request->getFile('image');
                if(!empty($_FILES['image']['name'])){
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/images/', $file_name)){
                            $save['image'] = 'uploads/images/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                if ($id) {
                    $save['id'] =  $id;
                    $save['modify_date'] = date('Y-m-d H:i:s');
                    $result=  $model->update(array('id'=>$id),$save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record Update successfully');
                        return redirect()->to('admin/add_sector/'.$id);
                    }else{
                        $this->session->setFlashdata('error','Record not update');
                        return redirect()->to('admin/add_sector/'.$id);
                    }
                }else{
                    $save['create_date'] = date('Y-m-d H:i:s');
                    $save['modify_date'] = date('Y-m-d H:i:s');
                    $result=  $model->insert($save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record insert successfully');
                        return redirect()->to('admin/sectors');
                    }else{
                        $this->session->setFlashdata('error','Record not insert');
                        return redirect()->to('admin/add_sector');
                    }
                }
            }
        }
        return view('admin/product/add_sector',$data);
    }

    public function delete_sectors(){
        $model = new SectorModel();
        if ($this->request->getVar()) {
            $id = $this->request->getVar('selected');
          
            if ($id) {
                foreach ($id as $key => $value) {
                    $model->delete(array('id'=>$value));
                }     
                $this->session->setFlashdata('success','Record Delete successfully'); 
            }else{
                $this->session->setFlashdata('error','');
            }
        }
        return redirect()->to('admin/sectors');
    }

    public function services(){
        $model = new ServiceModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
           return  redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Service List';

        $query = array();
        $like = array();
        if(!empty($_GET['type'])){
            $query['type'] = $_GET['type'];
        }

        if(!empty($_GET['name'])){
            $like['name'] = $_GET['name']; 
        }

        // pagination
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->where($query)->like($like)->orderBy('id','asc')->paginate($data['perPage']);
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

        $data['total'] = $model->where($query)->like($like)->countAllResults();

        $data['data'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        $data['pages'] = round($data['total']/$data['perPage']);
        $data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];

        $data['config_logo'] = $this->config_logo;
        echo view('admin/product/services',$data);
    }
      
    public function add_service($id=false)
    {
        $model = new ServiceModel();
        $IndustryModel = new IndustryModel(); 
        $data['inudstryList'] = $IndustryModel->asObject()->select('id,name')->where('status',1)->findAll(); 
     
        if(!empty($id)) {
            $data['page_title'] = ' Edit Service';
            $data['form_action'] ='admin/add_service/'.$id;
            $row = $model->asObject()->where(array('id'=>$id))->first();
          
            $data['name'] =  $row->name;   
            $data['shortDescription'] = $row->shortDescription;
            $data['description'] = $row->description;
            $data['fullDescription'] = $row->fullDescription;
            $data['featureHeading'] = $row->featureHeading;
            $data['metaTitle'] = $row->metaTitle;
            $data['metaKeyword'] = $row->metaKeyword; 
            $data['metaDescription'] = $row->metaDescription;
            $data['status'] = $row->status; 
            $data['feature'] = $row->feature;
            $data['slug'] = $row->slug; 
            $data['image'] = $row->image;
            $data['thumbnail'] = $row->thumbnail; 
            $data['productTitle'] = $row->productTitle; 
            $data['productDescription'] = $row->productDescription; 
            $data['feeTitle'] = $row->feeTitle; 
            $data['feeDescription'] = $row->feeDescription; 
            $data['securityTitle'] = $row->securityTitle; 
            $data['securityDescription'] = $row->securityDescription; 
            $data['processTitle'] =  $row->processTitle; 
            $data['processDescription'] =  $row->processDescription; 
            $data['offering'] = $row->offering;
            if(!empty(json_decode($row->industries))){
                $data['industries'] =  json_decode($row->industries); 
            }else{
                $data['industries'] =  [];
            }

            $data['sortOrder'] = $row->sortOrder;

            $data['featureList'] = $this->AdminModel->all_fetch('service_feature',array('service_id'=>$row->id)); 
         
            $data['feeList'] = array();
        }else{
            $data['page_title'] = ' Add Service';
            $data['form_action'] ='admin/add_service';
            $data['name'] =  '';     
            $data['shortDescription'] =  ''; 
            $data['description'] =  ''; 
            $data['featureHeading'] =  ''; 
            $data['metaTitle'] =  ''; 
            $data['metaKeyword'] =  '';  
            $data['metaDescription'] =  ''; 
            $data['status'] =  ''; 
            $data['feature'] =  ''; 
            $data['slug'] =  '';  
            $data['image'] = '';
            $data['thumbnail'] = '';
            $data['productTitle'] =  '';
            $data['productDescription'] = '';
            $data['feeTitle'] = '';
            $data['feeDescription'] = '';
            $data['securityTitle'] = '';
            $data['securityDescription'] =  '';
            $data['processTitle'] =  '';
            $data['processDescription'] =  '';
            $data['offering'] ='';
            $data['sortOrder'] = '';
            $data['industries'] = array();
            $data['fullDescription'] ='';
            $data['featureList'] = array();
            $data['feeList'] = array();
        }

        // FIXED: Switched to is('post') modern framework request handler
        if ($this->request->is('post')) {
            $rules = [
                'name' =>'required'
            ];     
                
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
            } else{
                $save= array();
                $save['info']['name'] = $this->request->getVar('name');
                $save['info']['shortDescription'] = $this->request->getVar('shortDescription');
                $save['info']['description'] = $this->request->getVar('description');
                $save['info']['featureHeading'] = $this->request->getVar('featureHeading');
                $save['info']['metaTitle'] = $this->request->getVar('metaTitle');
                $save['info']['metaKeyword'] = $this->request->getVar('metaKeyword');
                $save['info']['metaDescription'] = $this->request->getVar('metaDescription');
                $save['info']['status'] = $this->request->getVar('status');
                $save['info']['feature'] = $this->request->getVar('feature');
                $save['info']['productTitle'] = $this->request->getVar('productTitle');
                $save['info']['productDescription'] = $this->request->getVar('productDescription');
                $save['info']['feeTitle'] = $this->request->getVar('feeTitle');
                $save['info']['feeDescription'] = $this->request->getVar('feeDescription');
                $save['info']['securityTitle'] = $this->request->getVar('securityTitle');
                $save['info']['securityDescription'] = $this->request->getVar('securityDescription');
                $save['info']['processTitle'] = $this->request->getVar('processTitle');
                $save['info']['processDescription'] = $this->request->getVar('processDescription');
                $save['info']['offering'] = $this->request->getVar('offering');
                $save['info']['industries'] = json_encode($this->request->getVar('industries'));
                $save['info']['sortOrder'] = $this->request->getVar('sortOrder');
                $save['info']['fullDescription'] = $this->request->getVar('fullDescription');

                if (!empty($this->request->getVar('slug'))) {
                   $save['info']['slug'] = sfu($this->request->getVar('slug'));
                }else{
                   $save['info']['slug'] = sfu($this->request->getVar('name'));
                }

                if(!empty($_FILES['thumbnail']['name'])){
                    $file = $this->request->getFile('thumbnail');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['thumbnail'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                if(!empty($_FILES['image']['name'])){
                    $file = $this->request->getFile('image');
                    if($file->isValid() && !$file->hasMoved()){
                        $file_name = $file->getRandomName();
                        if($file->move('uploads/product/', $file_name)){
                            $save['info']['image'] =  'uploads/product/'.$file_name;
                        }
                    }else{
                        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                        exit;
                    }
                }

                $uploadImgData = array();
                if ($this->request->getFileMultiple('images')) {
                    foreach($this->request->getFileMultiple('images') as $key => $file)
                    {  
                        if($file->isValid() && !$file->hasMoved()){
                            $file_name = $file->getRandomName();
                            if($file->move('uploads/product/', $file_name)){
                                $uploadImgData[$key] = 'uploads/product/'.$file_name;
                            }     
                        }
                    }
                }
                            
                $save['images'] = $uploadImgData;
                $save['old_image'] = $this->request->getVar('old_image');

                $save['title'] = $this->request->getVar('title'); 
                $save['featureDescription'] = $this->request->getVar('featureDescription'); 
                $save['feature_sort_order'] = $this->request->getVar('feature_sort_order'); 

                $save['area'] = $this->request->getVar('area'); 
                $save['price'] = $this->request->getVar('price'); 
                $save['arrival'] = $this->request->getVar('arrival'); 

                if ($id) {
                    $save['id'] = $id;
                    $result = $model->save_service($save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record Update successfully');
                        return redirect()->to('admin/add_service/'.$id);
                    }else{
                        $this->session->setFlashdata('error','Error in Update ');
                        return redirect()->to('admin/add_service/'.$id);
                    }
                }else{
                    $save['id'] = '';
                    $result = $model->save_service($save);
                    if ($result) {
                        $this->session->setFlashdata('success','Record Insert successfully');
                        return redirect()->to('admin/services');
                    }else{
                        $this->session->setFlashdata('success','Record not inserted');
                        return redirect()->to('admin/add_service');
                    }
                }
            }
        }
        return view('admin/product/add_service',$data);
    }

    public function delete_services(){
        $model = new ServiceModel();
        if ($this->request->getVar()) {
            $id = $this->request->getVar('selected');
          
            if ($id) {
                foreach ($id as $key => $value) {
                    $model->delete(array('id'=>$value));
                    $this->AdminModel->deleteData('service_feature',array('service_id'=>$value));
                }     
                $this->session->setFlashdata('success','Record Delete successfully'); 
            }else{
                $this->session->setFlashdata('error','');
            }
        }
        return redirect()->to('admin/services');
    }
}