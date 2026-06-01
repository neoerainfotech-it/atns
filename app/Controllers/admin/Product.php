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
    public function __construct()
	{

	    $settingModel = new SettingModel();
        $default_img = $settingModel->asObject()->where(array('key'=>'config_logo'))->first();
        $this->config_logo = $default_img->value; 
             
	}



function category(){
	
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
	// end
	  $data['config_logo'] = $this->config_logo;
	  echo view('admin/product/category',$data);

}



	function add_category($id=false)
	 {
	 	 error_reporting(0);

		$model = new ProductCategoryModel();
		$data['categoryList'] = $model->asObject()->where('parent',0)->findAll();
		$data['layoutList']	=	array('only_sub_category'=>'Sub Category without industry Serve','with_subcategory'=>'Sub Category with industry Serve','only_product'=>'Only Product List');

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


		if($this->request->getMethod()=='post'){
		    
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


// feature
  //     $uploadImgData = array();
	 //  if ($this->request->getFileMultiple('featureImages')) {
		// foreach($this->request->getFileMultiple('featureImages') as $key => $file)
	 //   {  
		//    if($file->isValid() && !$file->hasMoved()){
		//    $file_name = $file->getRandomName();
		//    if($file->move('uploads/product/', $file_name)){
		// 	   $uploadImgData[$key] = 'uploads/product/'.$file_name;
		//    }	 
		//  }
	 //   }
  //    }
                 
        
	// $save['featureImages'] = $uploadImgData;
	// $save['feature_old_image'] = $this->request->getVar('feature_old_image');
	$save['featureTitle'] = $this->request->getVar('featureTitle'); 
	$save['featureDescription'] = $this->request->getVar('featureDescription'); 
	$save['featureSortOrder'] = $this->request->getVar('featureSortOrder'); 



		  if ($id) {
		  	  $save['id'] = $id;
			  // $save['modify_date'] = date('Y-m-d H:i:s');
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
	
			 // $save['create_date'] = date('Y-m-d H:i:s');
			 // $save['modify_date'] = date('Y-m-d H:i:s');
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
	

	function delete_category(){
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

/////////////////




function products(){
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
	// end


	  $data['config_logo'] = $this->config_logo;
	  echo view('admin/product/products',$data);

}
  

 
function add_product($id=false)
 {
 	$solutionModel = new SectorModel();
 
 	$categogryModel = new ProductCategoryModel();
	$data['categoryList'] = $categogryModel->asObject()->where('parent',0)->findAll();


 	$model = new ProductModel();

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
	$data['solution'] = $row->solution; 
	
    $data['keyTitle'] = $row->keyTitle; 
    $data['keyDescription'] = $row->keyDescription; 
    $data['caseTitle'] = $row->caseTitle; 
    $data['casetDescription'] = $row->casetDescription; 
    $data['industryTitle'] = $row->industryTitle; 
    $data['industryDescription'] = $row->industryDescription; 
    

	
	$data['industries'] = json_decode($row->industries); 

	$data['featureList'] = $this->AdminModel->all_fetch('product_feature',array('product_id'=>$row->id)); 
	$data['capabilitiesList'] = $this->AdminModel->all_fetch('product_capabilities',array('product_id'=>$row->id)); 
	$data['imagesList'] = $this->AdminModel->all_fetch('product_images',array('product_id'=>$row->id)); 

         
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
	$data['solution'] = '';
	
	$data['keyTitle'] = '';
    $data['keyDescription'] = '';
    $data['caseTitle'] = '';
    $data['casetDescription'] ='';
    $data['industryTitle'] ='';
    $data['industryDescription'] = '';
    

	
	
	
	$data['featureList'] = array();
	$data['capabilitiesList'] = array();
	$data['imagesList'] = array();
      	$data['industries'] = array();

    }


    if ($this->request->getMethod()=='post') {

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


	$save['info']['industries'] = json_encode($this->request->getVar('industries'));


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

// feature
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
// capabilities   

	$save['capabilitiesTitle'] = $this->request->getVar('capabilitiesTitle'); 
	$save['capabilitiesDescription'] = $this->request->getVar('capabilitiesDescription'); 
	$save['capabilitiesSortOrder'] = $this->request->getVar('capabilitiesSortOrder'); 

// gallery

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



    if ($id) {
    $save['id'] = $id;
    $result = $model->save_product($save);
      if ($result) {
        $this->session->setFlashdata('success','Record Update successfully');
        return redirect()->to('admin/add_product/'.$id);
      }else{
        $this->session->setFlashdata('error','Error in Update ');
        return redirect()->to('admin/add_product/'.$id);
      }
    }else{
     $save['id'] = '';
      $result = $model->save_product($save);
      if ($result) {
        $this->session->setFlashdata('success','Record Insert successfully');
        return redirect()->to('admin/products');
      }else{
        $this->session->setFlashdata('success','Record not inserted');
         return redirect()->to('admin/add_product');
      }
    }

  }

  }
 echo view('admin/product/add_product',$data);

}

function delete_products(){
	 $model = new ProductModel();
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$model->delete(array('id'=>$value));
     	$this->AdminModel->deleteData('product_feature',array('product_id'=>$value));
     	$this->AdminModel->deleteData('product_capabilities',array('product_id'=>$value));
     	$this->AdminModel->deleteData('product_images',array('product_id'=>$value));
     	}     
     	$this->session->setFlashdata('success','Record Delete successfully'); 
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/products');
}


///////////////////////////////////



function solutions(){

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
	// end


	  $data['config_logo'] = $this->config_logo;
	  echo view('admin/product/solutions',$data);

}
  

 
function add_solution($id=false)
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


    if ($this->request->getMethod()=='post') {

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
 echo view('admin/product/add_solution',$data);

}

function delete_solutions(){
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


////////////////////////////////////




  function sectors(){

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
	// end


	  $data['config_logo'] = $this->config_logo;
	  echo view('admin/product/sectors',$data);

}
  
 

function add_sector($id=false)
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


    if ($this->request->getMethod()=='post') {

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
 echo view('admin/product/add_sector',$data);

}

function delete_sectors(){
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

///////////////////////////////////



function services(){

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
	// end


	  $data['config_logo'] = $this->config_logo;
	  echo view('admin/product/services',$data);

}
  

 
function add_service($id=false)
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


    if ($this->request->getMethod()=='post') {

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

// print_r($save); exit;

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
 echo view('admin/product/add_service',$data);

}

function delete_services(){

	 $model = new ServiceModel();
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$model->delete(array('id'=>$value));
     	$this->AdminModel->deleteData('service_feature',array('service_id'=>$value));
     	// $this->AdminModel->deleteData('solution_fee',array('solution_id'=>$value));
     	}     
     	$this->session->setFlashdata('success','Record Delete successfully'); 
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/services');
}





}
