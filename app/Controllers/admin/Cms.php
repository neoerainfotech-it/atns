<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\coreModule\SettingModel;
use App\Models\Cms\CmsModel;
use App\Models\Cms\CollectionModel;
use App\Models\Cms\IndustryModel;
use App\Models\Cms\GalleryCategoryModel;
use App\Models\Cms\GalleryModel;
use App\Models\Cms\InfrastructureModel;
use App\Models\Cms\AddressModel;
use App\Models\Cms\ParterTagModel;
use App\Models\Cms\CsrModel;
use App\Models\Cms\EventCategoryModel;
use App\Models\Cms\EventsModel;

class Cms extends BaseController
{
    protected $config_logo;

    public function __construct()
    {
        $settingModel = new SettingModel();
        $default_img = $settingModel->asObject()->where(['key' => 'config_logo'])->first();
        $this->config_logo = $default_img ? $default_img->value : ''; 
    }

    public function home_heading()
    {
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if (empty($permission)) {
            return redirect()->to('admin/permission-denied');
        }
        $data['page_title'] = 'Home Heading';
        $data['detail'] = $this->AdminModel->all_fetch('home_heading', null);
        return view('admin/cms/home_heading', $data);
    }

    public function add_home_heading($id = false)
    {
        $model = new CmsModel();
        
        if (!empty($id)) {
            $data['page_title'] = 'Edit Heading';
            $data['form_action'] = 'admin/add_home_heading/' . $id;
            $row = $this->AdminModel->fs('home_heading', ['id' => $id]);

            $data['title'] = $row->title; 
            $data['description'] = $row->description; 
            $data['solutionTitle'] = $row->solutionTitle; 
            $data['image'] = $row->image;  
            $data['solutionDescription'] = $row->solutionDescription;  
            $data['keyTitle'] = $row->keyTitle;
            $data['whyTitle'] = $row->whyTitle;
            $data['customerTitle'] = $row->customerTitle;  
            $data['cultureDescription'] = $row->cultureDescription;
            $data['partnerTitle'] = $row->partnerTitle;
            $data['successTitle'] = $row->successTitle;
            $data['successDescription'] = $row->successDescription;
            $data['successImage'] = $row->successImage;
            $data['blogTitle'] = $row->blogTitle;
            $data['visionDescription'] = $row->visionDescription;
            $data['workTitle'] = $row->workTitle;
            $data['workDescription'] = $row->workDescription;
            $data['workImage'] = $row->workImage;
            $data['newsTitle'] = $row->newsTitle;
            $data['newsDescription'] = $row->newsDescription;
            $data['link'] = $row->link;
            $data['image1'] = $row->image1;
            
            $data['featureList'] = $this->AdminModel->all_fetch('home_feature', ['home_id' => $row->id]);
        } else {
            $data['page_title'] = 'Add Heading';
            $data['form_action'] = 'admin/add_home_heading';

            $data['title'] = '';  
            $data['description'] = ''; 
            $data['solutionTitle'] = ''; 
            $data['image'] = '';  
            $data['solutionDescription'] = '';   
            $data['keyTitle'] = ''; 
            $data['whyTitle'] = '';  
            $data['customerTitle'] = '';  
            $data['cultureDescription'] = ''; 
            $data['partnerTitle'] = '';  
            $data['successTitle'] = '';  
            $data['successDescription'] = '';  
            $data['successImage'] = ''; 
            $data['blogTitle'] = ''; 
            $data['visionDescription'] = ''; 
            $data['workTitle'] = ''; 
            $data['workDescription'] = ''; 
            $data['workImage'] = ''; 
            $data['newsTitle'] = ''; 
            $data['newsDescription'] = ''; 
            $data['link'] = ''; 
            $data['image1'] = ''; 
            $data['featureList'] = [];
        }

        // FIXED: Modernized request type verification to prevent CodeIgniter 4.7 warnings
        if ($this->request->is('post')) {
            $rules = [
                'title' => 'permit_empty|trim'
            ];
        
            if ($this->validate($rules) == false) {
                $data['validation'] = $this->validator;
            } else {
                $save = [];
                $save['info']['title'] = $this->request->getVar('title');
                $save['info']['description'] = $this->request->getVar('description');
                $save['info']['partnerTitle'] = $this->request->getVar('partnerTitle');
                $save['info']['solutionTitle'] = $this->request->getVar('solutionTitle');
                $save['info']['solutionDescription'] = $this->request->getVar('solutionDescription');
                $save['info']['cultureDescription'] = $this->request->getVar('cultureDescription');
                $save['info']['keyTitle'] = $this->request->getVar('keyTitle');
                $save['info']['whyTitle'] = $this->request->getVar('whyTitle');
                $save['info']['customerTitle'] = $this->request->getVar('customerTitle');
                $save['info']['successTitle'] = $this->request->getVar('successTitle');
                $save['info']['successDescription'] = $this->request->getVar('successDescription');
                $save['info']['blogTitle'] = $this->request->getVar('blogTitle');
                $save['info']['visionDescription'] = $this->request->getVar('visionDescription');
                $save['info']['workTitle'] = $this->request->getVar('workTitle');
                $save['info']['workDescription'] = $this->request->getVar('workDescription');
                $save['info']['newsTitle'] = $this->request->getVar('newsTitle');
                $save['info']['newsDescription'] = $this->request->getVar('newsDescription');
                $save['info']['link'] = $this->request->getVar('link');
            
                // File Uploader Processors
                $fileFields = ['workImage', 'image1', 'image', 'successImage'];
                foreach ($fileFields as $field) {
                    $file = $this->request->getFile($field);
                    if ($file && $file->isValid() && !$file->hasMoved()) {
                        $file_name = $file->getRandomName();
                        if ($file->move('uploads/images/', $file_name)) {
                            $save['info'][$field] = 'uploads/images/' . $file_name;
                        }
                    }
                }
            
                // Dynamic Feature Arrays Processors
                $featureImagesData = [];
                $files = $this->request->getFileMultiple('featureImage');
                if ($files) {
                    foreach ($files as $key => $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file_name = $file->getRandomName();
                            if ($file->move('uploads/product/', $file_name)) {
                                $featureImagesData[$key] = 'uploads/product/' . $file_name;
                            }   
                        }
                    }
                }
                        
                $save['featureImage'] = $featureImagesData;
                $save['old_feature_image'] = $this->request->getVar('old_feature_image');
                $save['featureTitle'] = $this->request->getVar('featureTitle');
                $save['featureValue'] = $this->request->getVar('featureValue');
                $save['featureSymbol'] = $this->request->getVar('featureSymbol');
                $save['feature_sort_order'] = $this->request->getVar('feature_sort_order');

                if ($id) {
                    $save['id'] = $id;
                    $save['info']['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->save_home_heading($save);
                    if ($result) {
                        $this->session->setFlashdata('success', 'Record Updated successfully');
                        return redirect()->to('admin/add_home_heading/' . $id);
                    } else {
                        $this->session->setFlashdata('error', 'Record not updated');
                        return redirect()->to('admin/add_home_heading/' . $id);
                    }
                } else {
                    $save['info']['create_date'] = date('Y-m-d H:i:s');
                    $save['info']['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->save_home_heading($save);
                    if ($result) {
                        $this->session->setFlashdata('success', 'Record inserted successfully');
                        return redirect()->to('admin/home_heading');
                    } else {
                        $this->session->setFlashdata('error', 'Record not inserted');
                        return redirect()->to('admin/add_home_heading');
                    }
                }
            }
        }
        return view('admin/cms/add_home_heading', $data);
    }

    public function delete_home_heading()
    {
        if ($this->request->getVar('selected')) {
            $id = $this->request->getVar('selected');
            foreach ($id as $value) {
                $this->AdminModel->deleteData('home_heading', ['id' => $value]);
                $this->AdminModel->deleteData('home_feature', ['home_id' => $value]);
                $this->AdminModel->deleteData('home_gallery', ['home_id' => $value]);
            }
            $this->session->setFlashdata('success', 'Record Deleted successfully');
        }
        return redirect()->to('admin/home_heading');
    }

    /* About Section Configurations */
    public function about_heading()
    {
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if (empty($permission)) {
            return redirect()->to('admin/permission-denied');
        }
        $data['page_title'] = 'About Heading';
        $data['detail'] = $this->AdminModel->all_fetch('about_heading', null);
        return view('admin/cms/about_heading', $data);
    }
        
    public function add_about_heading($id = false)
    {
        $model = new CmsModel();

        if (!empty($id)) {
            $data['page_title'] = 'Edit Heading';
            $data['form_action'] = 'admin/add_about_heading/' . $id;
            $row = $this->AdminModel->fs('about_heading', ['id' => $id]);
        
            $data['title'] = $row->title; 
            $data['description'] = $row->description;     
            $data['description2'] = $row->description2;   
            $data['image'] = $row->image; 
            $data['wtitle'] = $row->wtitle; 
            $data['wdescription'] = $row->wdescription;  
            $data['mTitle'] = $row->mTitle;
            $data['jfTitle'] = $row->jfTitle;
            $data['jfDescription'] = $row->jfDescription;
            $data['jDescription2'] = $row->jDescription2;
            $data['image1'] = $row->image1;
            $data['patentTitle'] = $row->patentTitle;
            $data['patentDescription'] = $row->patentDescription;
            $data['companyTitle'] = $row->companyTitle;
            $data['companyDescription'] = $row->companyDescription;
            $data['image2'] = $row->image2;
            $data['letTitle'] = $row->letTitle;
            $data['letDescription'] = $row->letDescription;
            
            $data['visionList'] = $this->AdminModel->all_fetch('visions', ['home_id' => $row->id]);
            $data['whyusList'] = $this->AdminModel->all_fetch('whyus', ['home_id' => $row->id]);
        } else {
            $data['page_title'] = 'Add Heading';
            $data['form_action'] = 'admin/add_about_heading';

            $data['title'] = ''; $data['description'] = ''; $data['description2'] = '';     
            $data['image'] = ''; $data['wtitle'] = ''; $data['wdescription'] = '';  
            $data['mTitle'] = ''; $data['jfTitle'] = ''; $data['jfDescription'] = ''; 
            $data['jtitle'] = ''; $data['jDescription2'] = ''; $data['image1'] = ''; 
            $data['patentTitle'] = ''; $data['patentDescription'] = ''; 
            $data['companyTitle'] = ''; $data['companyDescription'] = ''; 
            $data['image2'] = ''; $data['letTitle'] = ''; $data['letDescription'] = ''; 
            
            $data['visionList'] = [];
            $data['whyusList'] = [];
        }

        if ($this->request->is('post')) {
            $rules = ['description' => 'permit_empty|trim'];
            
            if ($this->validate($rules) == false) {
                $data['validation'] = $this->validator;
            } else {
                $save = [];
                $save['info']['description'] = $this->request->getVar('description');
                $save['info']['title'] = $this->request->getVar('title');
                $save['info']['description2'] = $this->request->getVar('description2');
                $save['info']['wtitle'] = $this->request->getVar('wtitle');
                $save['info']['wdescription'] = $this->request->getVar('wdescription');
                $save['info']['mTitle'] = $this->request->getVar('mTitle');
                $save['info']['jfTitle'] = $this->request->getVar('jfTitle');
                $save['info']['jfDescription'] = $this->request->getVar('jfDescription');
                $save['info']['jDescription2'] = $this->request->getVar('jDescription2');
                $save['info']['patentTitle'] = $this->request->getVar('patentTitle');
                $save['info']['patentDescription'] = $this->request->getVar('patentDescription');
                $save['info']['companyTitle'] = $this->request->getVar('companyTitle');
                $save['info']['companyDescription'] = $this->request->getVar('companyDescription');
                $save['info']['letTitle'] = $this->request->getVar('letTitle');
                $save['info']['letDescription'] = $this->request->getVar('letDescription');

                $fileFields = ['image1', 'image2', 'image'];
                foreach ($fileFields as $field) {
                    $file = $this->request->getFile($field);
                    if ($file && $file->isValid() && !$file->hasMoved()) {
                        $file_name = $file->getRandomName();
                        if ($file->move('uploads/images/', $file_name)) {
                            $save['info'][$field] = 'uploads/images/' . $file_name;
                        }
                    }
                }

                $save['featureTitle'] = $this->request->getVar('featureTitle');
                $save['featureDescription'] = $this->request->getVar('featureDescription');
                $save['featureSortOrder'] = $this->request->getVar('featureSortOrder');

                $whyImagesData = [];
                $whyFiles = $this->request->getFileMultiple('whyimage');
                if ($whyFiles) {
                    foreach ($whyFiles as $key => $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file_name = $file->getRandomName();
                            if ($file->move('uploads/product/', $file_name)) {
                                $whyImagesData[$key] = 'uploads/product/' . $file_name;
                            }    
                        }
                    }
                }
                                
                $save['featureImages'] = $whyImagesData;
                $save['old_why_image'] = $this->request->getVar('old_why_image');
                $save['whyTitle'] = $this->request->getVar('whyTitle');
                $save['whyDescription'] = $this->request->getVar('whyDescription');
                $save['whySortOrder'] = $this->request->getVar('whySortOrder');

                if ($id) {
                    $save['id'] = $id;
                    $save['info']['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->save_about_heading($save);
                    if ($result) {
                        $this->session->setFlashdata('success', 'Record Updated successfully');
                        return redirect()->to('admin/add_about_heading/' . $id);
                    } else {
                        $this->session->setFlashdata('error', 'Record not updated');
                        return redirect()->to('admin/add_about_heading/' . $id);
                    }
                } else {
                    $save['info']['create_date'] = date('Y-m-d H:i:s');
                    $save['info']['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->save_about_heading($save);
                    if ($result) {
                        $this->session->setFlashdata('success', 'Record inserted successfully');
                        return redirect()->to('admin/about_heading');
                    } else {
                        $this->session->setFlashdata('error', 'Record not inserted');
                        return redirect()->to('admin/add_about_heading');
                    }
                }
            }
        }
        return view('admin/cms/add_about_heading', $data);
    }

    public function delete_about_heading()
    {
        if ($this->request->getVar('selected')) {
            $id = $this->request->getVar('selected');
            foreach ($id as $value) {
                $this->AdminModel->deleteData('about_heading', ['id' => $value]);
                $this->AdminModel->deleteData('whyus', ['home_id' => $value]);
                $this->AdminModel->deleteData('visions', ['home_id' => $value]);
            }
            $this->session->setFlashdata('success', 'Record Deleted successfully');
        }
        return redirect()->to('admin/about_heading');
    }

    /* Collection Handler Configurations */
    public function collection()
    {
        $model = new CollectionModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if (empty($permission)) {
            return redirect()->to('admin/permission-denied');
        } 
        
        $data['page_title'] = 'All Collection List';
        $data['perPage'] = 10;
        $data['detail'] = $model->asObject()->orderBy('id', 'asc')->paginate($data['perPage']);
        $data['pager'] = $model->pager;
        $data['config_logo'] = $this->config_logo;
        return view('admin/cms/collection', $data);
    }

    public function add_collection($id = false)
    {
        $model = new CollectionModel();
     
        if (!empty($id)) {
            $data['page_title'] = 'Edit collection';
            $data['form_action'] = 'admin/add_collection/' . $id;
            $row = $model->asObject()->where(['id' => $id])->first();
            $data['city'] = $row->city;   
            $data['state'] = $row->state;
            $data['address1'] = $row->address1;
            $data['address2'] = $row->address2;
            $data['address3'] = $row->address3;
            $data['partnerName'] = $row->partnerName; 
            $data['branchManagerName'] = $row->branchManagerName; 
            $data['contact'] = $row->contact; 
            $data['branchExits'] = $row->branchExits; 
        } else {
            $data['page_title'] = 'Add collection';
            $data['form_action'] = 'admin/add_collection';
            $data['city'] = ''; $data['state'] = ''; $data['address1'] = ''; 
            $data['address2'] = ''; $data['address3'] = ''; $data['partnerName'] = ''; 
            $data['branchManagerName'] = ''; $data['contact'] = ''; $data['branchExits'] = ''; 
        }

        if ($this->request->is('post')) {
            $rules = ['city' => 'required'];        
            if ($this->validate($rules) == false) {
                $data['validation'] = $this->validator;
            } else {
                $save = [
                    'city'              => $this->request->getVar('city'),
                    'state'             => $this->request->getVar('state'),
                    'address1'          => $this->request->getVar('address1'),
                    'address2'          => $this->request->getVar('address2'),
                    'address3'          => $this->request->getVar('address3'),
                    'partnerName'       => $this->request->getVar('partnerName'),
                    'branchManagerName' => $this->request->getVar('branchManagerName'),
                    'contact'           => $this->request->getVar('contact'),
                    'branchExits'       => $this->request->getVar('branchExits')
                ];

                if ($id) {
                    $save['id'] = $id;
                    $save['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->update($id, $save);
                    $this->session->setFlashdata($result ? 'success' : 'error', $result ? 'Record Updated successfully' : 'Record not updated');
                    return redirect()->to('admin/add_collection/' . $id);
                } else {
                    $save['create_date'] = date('Y-m-d H:i:s');
                    $save['modify_date'] = date('Y-m-d H:i:s');
                    $result = $model->insert($save);
                    $this->session->setFlashdata($result ? 'success' : 'error', $result ? 'Record inserted successfully' : 'Record not inserted');
                    return redirect()->to('admin/collection');
                }
            }
        }
        return view('admin/cms/add_collection', $data);
    }

    public function delete_collection()
    {
        $model = new CollectionModel();
        if ($this->request->getVar('selected')) {
            $id = $this->request->getVar('selected');
            foreach ($id as $value) {
                $model->delete($value);
            }      
            $this->session->setFlashdata('success', 'Record Deleted successfully'); 
        }
        return redirect()->to('admin/collection');
    }
}