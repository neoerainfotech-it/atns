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
use App\Models\Cms\ServiceModel;



class Industry extends BaseController
{
    
    public function __construct()
	{

	    $settingModel = new SettingModel();
        $default_img = $settingModel->asObject()->where(array('key'=>'config_logo'))->first();
        $this->config_logo = $default_img->value; 
             
	}





function industry(){
		error_reporting(0);
	$model = new IndustryModel();
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	  $data['page_title'] = 'All Industry List';

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
		$data['detail'] = $model->asObject()->select('industries.*')->where($query)->like($like)->orderBy('id','asc')->paginate($data['perPage']);
		$data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

		$data['total'] = $model->where($query)->like($like)->countAllResults();

		$data['data'] = $model->paginate($data['perPage']);
		$data['pager'] = $model->pager;

		$data['pages'] = round($data['total']/$data['perPage']);
		$data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];
	// end
		$data['config_logo'] = $this->config_logo;
	  echo view('admin/cms/industry',$data);
	}
	  
	 
	
	function add_industry($id=false)
	 {
	 	error_reporting(0);
		$model = new IndustryModel();
		 $ServiceModel = new ServiceModel();
		

        $data['categoryList'] = array();
        
        
        $data['serviceList'] = $ServiceModel->asObject()->select('id,name')->where(array('status'=>1))->findAll();

	 
	  if(!empty($id)) {
		
		$data['page_title'] = ' Edit Industry';
		$data['form_action'] ='admin/add_industry/'.$id;
		$row = $model->asObject()->where(array('id'=>$id))->first();
	
		$data['name'] =  $row->name; 
		$data['shortDescription'] =  $row->shortDescription;    
		$data['description'] =  $row->description;   
		$data['image'] = $row->image; 
			$data['thumbnail'] = $row->thumbnail; 
		$data['sortOrder'] = $row->sortOrder; 
		$data['status'] = $row->status; 
		$data['slug'] = $row->slug; 
       $data['banner_title'] = $row->banner_title; 

		$data['metaTitle'] = $row->metaTitle; 
		$data['metaKeyword'] = $row->metaKeyword; 
		$data['metaDescription'] = $row->metaDescription; 
		$data['keyImage'] = $row->keyImage; 
        	$data['icon'] = $row->icon; 
		$data['solution_title'] = $row->solution_title; 
		$data['solutionDescription'] = $row->solutionDescription;
		
		
	
			$data['sol_title'] = $row->sol_title;
			$data['solDescription'] = $row->solDescription;
			$data['case_title'] = $row->case_title;
			$data['caseDescription'] = $row->caseDescription;
			if(!empty(json_decode($row->services))){
			    		$data['services'] = json_decode($row->services);
			}else{
			    		$data['services'] = [];
			}
	
		
		
		$data['featureList'] = $this->AdminModel->all_fetch('industry_feature',array('industry_id'=>$row->id));
		
		$data['processList'] = $this->AdminModel->all_fetch('industry_process',array('industry_id'=>$row->id));
		$data['solutionList'] = $this->AdminModel->all_fetch('industry_solution',array('industry_id'=>$row->id));
		
		

		}else{
		
		$data['page_title'] = ' Add Industry';
		$data['form_action'] ='admin/add_industry';

		$data['name'] = '';  
		$data['shortDescription'] = '';    
		$data['description'] = '';     
		$data['image'] = ''; 
		$data['sortOrder'] = ''; 
		$data['status'] = ''; 
		$data['slug'] = ''; 
		$data['category'] = ''; 
        $data['thumbnail'] =  ''; 
		$data['metaTitle'] = ''; 
		$data['metaKeyword'] = '';  
		$data['metaDescription'] = ''; 
		$data['solution_title'] =''; 
		$data['solutionDescription'] = '';  
		$data['banner_title'] =  ''; 
		$data['keyImage'] = ''; 
			$data['icon'] = '';
			
				$data['sol_title'] = '';
			$data['solDescription'] = '';
			$data['case_title'] = '';
			$data['caseDescription'] ='';
		
		
			
			
        $data['featureList'] = array();
       	$data['processList'] = array();
       	$data['solutionList'] =array();
       	$data['services'] = array();
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


		$save['info']['slug'] =  sfu($this->request->getVar('name')); 
		$save['info']['metaTitle'] =  $this->request->getVar('metaTitle'); 
		$save['info']['metaKeyword'] =  $this->request->getVar('metaKeyword'); 
		$save['info']['metaDescription'] =  $this->request->getVar('metaDescription'); 
    	$save['info']['solution_title'] =  $this->request->getVar('solution_title'); 
    	$save['info']['solutionDescription'] =  $this->request->getVar('solutionDescription'); 
	$save['info']['banner_title'] =  $this->request->getVar('banner_title'); 


	$save['info']['sol_title'] =  $this->request->getVar('sol_title'); 
	$save['info']['solDescription'] =  $this->request->getVar('solDescription'); 
	$save['info']['case_title'] =  $this->request->getVar('case_title'); 
	$save['info']['caseDescription'] =  $this->request->getVar('caseDescription'); 

	$save['info']['services'] =  json_encode($this->request->getVar('services')); 





	    // $save['category'] =  $this->request->getVar('category'); 	



        $file = $this->request->getFile('keyImage');
		  if(!empty($_FILES['keyImage']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['info']['keyImage'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }
		 
		 
		 
		 $file = $this->request->getFile('icon');
		  if(!empty($_FILES['icon']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['info']['icon'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }
		 
		 
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


	     $file = $this->request->getFile('thumbnail');
		  if(!empty($_FILES['thumbnail']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['info']['thumbnail'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }


     
        // faq        
        $save['featureTitle'] =  $this->request->getVar('featureTitle');
        $save['featureDescription'] = $this->request->getVar('featureDescription');
        $save['feature_sort_order'] = $this->request->getVar('feature_sort_order');
    
        // process
        
         $featureImagesData = array();
          if ($this->request->getFileMultiple('images')) {
          foreach($this->request->getFileMultiple('images') as $key => $file)
            {  
             if($file->isValid() && !$file->hasMoved()){
             $file_name = $file->getRandomName();
             if($file->move('uploads/product/', $file_name)){
                $featureImagesData[$key] = 'uploads/product/'.$file_name;
             }   
            }
            }
            }
                    
        $save['images'] = $featureImagesData;
        $save['old_image'] = $this->request->getVar('old_image');
        $save['feeTitle'] = $this->request->getVar('feeTitle');
        $save['feeDescription'] = $this->request->getVar('feeDescription');
        $save['fee_sort_order'] = $this->request->getVar('fee_sort_order');

    
    // solution


  
         $solImagesData = array();
          if ($this->request->getFileMultiple('solutionImages')) {
          foreach($this->request->getFileMultiple('solutionImages') as $key => $file)
            {  
             if($file->isValid() && !$file->hasMoved()){
             $file_name = $file->getRandomName();
             if($file->move('uploads/product/', $file_name)){
                $solImagesData[$key] = 'uploads/product/'.$file_name;
             }   
            }
            }
            }
                    
        $save['solutionImages'] = $solImagesData;
        $save['old_solutionImages'] = $this->request->getVar('old_solutionImages');
        $save['solutionTitle'] = $this->request->getVar('solutionTitle');
        $save['solutionDescription1'] = $this->request->getVar('solutionDescription1');
        $save['solution_sort_order'] = $this->request->getVar('solution_sort_order');



		  if ($id) {
		  	  $save['id'] = $id;
			  $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $model->save_industry($save);
			  if ($result) {
			  $this->session->setFlashdata('success','Record Update successfully');
			  return redirect()->to('admin/add_industry/'.$id);
			  }else{
			  $this->session->setFlashdata('error','Record not update');
			  return redirect()->to('admin/add_industry/'.$id);
			  }
		  }else{
	
			 $save['create_date'] = date('Y-m-d H:i:s');
			 $save['modify_date'] = date('Y-m-d H:i:s');
			 $result=  $model->save_industry($save);
			  if ($result) {
			 
			  $this->session->setFlashdata('success','Record insert successfully');
			  return redirect()->to('admin/industry');
			  }else{
			  $this->session->setFlashdata('error','Record not insert');
			  return redirect()->to('admin/add_industry');
			  }
	
		  }
	
	   }
	 }
	return view('admin/cms/add_industry',$data);

	}
	

	function delete_industry(){
	  if ($this->request->getVar()) {
	  	$model = new IndustryModel();
		  $id = $this->request->getVar('selected');
		 if ($id) {
			foreach($id as $value){
				$model->delete(array('id'=>$value));				
			   }
		   $this->session->setFlashdata('success','Record Delete successfully');
		 }else{
		  $this->session->setFlashdata('error','');
		 }
		}
	  return redirect()->to('admin/industry');
	}






}

?>