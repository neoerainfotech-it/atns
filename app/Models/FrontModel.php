<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProductFrontModel;

class FrontModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'fronts';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
    
    
    function get_all_blogs($array = array(),$limit = false, $offset=false,$order='asc',$type='BLOGS',$popular=false){
        
        if(!empty($array['category'])){
  
            $query = $this->db->table('blog_category');
            $row = $query->select('*')->where('link',$array['category'])->get()->getRow();
            $category_id = $row->id;
        }
        
        
        $query = $this->db->table('blogs as bg');
        $query->select('bg.*,bc.name as blog_category');
        $query->join('blog_category bc','bg.category_id=bc.id','left');
        $query->where('bg.status',1);
        $query->where('type',$type);
        if(!empty($popular)){
            $query->where('popular',$popular);
        }
        
       if(!empty($array['category'])){
        $query->where('bg.category_id',$category_id);  
       }
       
         if(!empty($array['name'])){
        $query->like('bg.title',$array['name'],'left');  
       }
       
       if(!empty($limit)){
           $offset = $offset==1?0:$offset;
           $query->limit($limit,$offset);   
       }
        $query->orderBy('bg.id',$order);
       
   
        return  $query->get()->getResult();
        
    }
    
    function blogDetail($slug=false){
       
        $query = $this->db->table('blogs as bg');
        $query->select('bg.*,bc.name as blog_category');
        $query->join('blog_category bc','bg.category_id=bc.id','left');
        $query->where('bg.status',1);
        $query->where('bg.link',$slug);
       
       return  $query->get()->getRow();
       
    }
    
    
  


    
    function get_project_list($category_id = false){
        $query = $this->db->table('project as pr');
        $query->select('pr.*,ct.name as city_name,rg.name as region_name');
        $query->join('project_city ct','pr.city=ct.id','left');
        $query->join('project_region rg','pr.region=rg.id','left');
        $query->where('pr.status',1);
        
        if(!empty($category_id)){
           $query->where('pr.category',$category_id);  
        }else{
          $query->where('pr.show_home',1);   
        }
        
        $query->orderBy('pr.sort_order','asc');
        return $query->get()->getResult();
                
    }
    
    
    
    

    
    
    function get_project_search($data = array()){
        $id = array();
        // echo '<pre>';
        // print_r($data); exit;
        
        $query = $this->db->table('project as pr');
        $query->select('pr.*,ct.name as city_name,rg.name as region_name');
        $query->join('project_city ct','pr.city=ct.id','left');
        $query->join('project_region rg','pr.region=rg.id','left');
        $query->join('project_floor fr','pr.id=fr.project_id','left');
        $query->where('pr.status',1);
        
        // open when fornt commerical type is active
        // if(!empty($data['category'])){
        //     foreach($data['category'] as $value){
        //         $id[]= $value;
        //     }
        //   $query->whereIn('pr.category',$id);  
        // }
        
         if(!empty($data['city'])){
           
          $query->where('pr.city',$data['city']);  
        }
        
         if(!empty($data['region'])){
           
          $query->where('pr.region',$data['region']);  
        }
        
         if(!empty($data['bhk'])){
            foreach($data['bhk'] as $value){
                $bhkid[]= $value;
            }
          $query->whereIn('fr.bhk',$bhkid);  
        }
        
        $query->where('pr.status',1); 
        $query->groupBy('pr.id');
        $query->orderBy('pr.sort_order','asc');
        
        
        return $query->get()->getResult();
                
    }
    
    
    
    
    

        
    function get_project($id){
       $query = $this->db->table('project as pr');
        $query->select('pr.*,ct.name as city_name,rg.name as region_name');
        $query->join('project_city ct','pr.city=ct.id','left');
        $query->join('project_region rg','pr.region=rg.id','left');
        $query->where('pr.status',1);
        $query->where('pr.id',$id);
        return $query->get()->getRow();
    }
    
    
      function get_project_images($id,$limit=false,$offset=false){
         $query = $this->db->table('project_gallery as pg');
        $query->select('pgi.*');
        $query->join('project_gallery_image pgi','pg.id=pgi.gallery_id','left');
        $query->where('pg.status',1);
          $query->where('pgi.status',1);
        $query->where('pg.project_id',$id);
        $query->orderBy('pg.sort_order','asc');
        if(!empty($limit)){
            $query->limit($limit,$offset);
        }
        return $query->get()->getResult();
    }
    
    

    
    function get_slider($link){
       $query = $this->db->table('banner as bn');
        $query->select('bnm.*,bn.heading,bn.sub_heading,bn.description as banner_description');
        $query->join('banner_image bnm','bnm.banner_id=bn.id','left');
        $query->where('bn.slider_link',$link);
          $query->orderBy('bnm.sort_order','asc');
        return $query->get()->getResult();
    }
    
    function get_career_enquiry_detail($id){
       $query = $this->db->table('career_enquiry as ce');
        $query->select('ce.*,st.name as state_name,cnt.name as country_name,carr.title as job_name');
        $query->join('country cnt','ce.country=cnt.id','left');
        $query->join('state st','ce.state=st.id','left');
        $query->join('careers carr','ce.job_id=carr.id','left');
        $query->where('ce.id',$id);
        return $query->get()->getRow();
    }

///////////////////


     function get_sub_category($cat_id){
       $query = $this->db->table('categories as ct');
        $query->select('ct.*,sr.slug as service_slug');
        $query->join('services sr','ct.id=sr.category_id','left');
        $query->where('ct.parent',$cat_id);
          $query->orderBy('ct.sortOrder','asc');
        return $query->get()->getResult();
    }
    
    
    
    
    
    function get_report(){
        $query = $this->db->table('investor_reports as invr');
        $query->select('invr.id,fy.name as year_name');
        $query->join('financial_years fy','invr.year_id=fy.id','left');
      
        $query->where('invr.status',1);
  
        $query->orderBy('fy.sortOrder','asc');
         $query->groupBy('invr.year_id');
        return $query->get()->getResult();
                
    }
    
    
   function get_csr_report($category_id = false){
        $query = $this->db->table('csr_reports as csr');
        $query->select('csr.id,csrl.title,csrl.image,fy.name as year_name,nc.name as notice_name');
        $query->join('financial_years fy','csr.year_id=fy.id','left');
        
        $query->join('notice_category nc','csr.notice_category_id=nc.id','left');

        $query->join('csr_report_list csrl','csr.id=csrl.investor_report_id','left');
        $query->where('csr.category_id',$category_id);
           $query->where('csr.status',1);
        if ($category_id==1) {
           $query->orderBy('fy.sortOrder','asc');
           $query->groupBy('fy.id');
        }else{
            $query->orderBy('nc.sortOrder','asc');
            $query->groupBy('nc.id');
        }
                
        return $query->get()->getResult();
                
    }




function get_solutionList($keyword){
         $query = $this->db->table('solutions as sol');
        $query->select('sol.name,sol.slug');
         $query->like('sol.name',$keyword,'both');
        $query->where('sol.status',1);
        return $query->get()->getResult();
}



function get_solutionFeatureList($keyword){
         $query = $this->db->table('solution_feature as sf');
        $query->select('sf.title,sf.slug,sol.slug as solution_slug,sol.name');
         $query->like('sf.title',$keyword,'both');
        $query->join('solutions sol','sf.solution_id=sol.id','left');
         
        $query->where('sol.status',1);
        return $query->get()->getResult();
}




function get_serviceList($keyword){
         $query = $this->db->table('services as ser');
        $query->select('ser.name,ser.slug');
         $query->like('ser.name',$keyword,'both');
        $query->where('ser.status',1);
        return $query->get()->getResult();
}



function get_industryList($keyword){
         $query = $this->db->table('industries as ser');
        $query->select('ser.name,ser.slug');
         $query->like('ser.name',$keyword,'both');
        $query->where('ser.status',1);
        return $query->get()->getResult();
}

function get_careerList($keyword){
         $query = $this->db->table('careers as ser');
        $query->select('ser.title,ser.slug');
         $query->like('ser.title',$keyword,'both');
        $query->where('ser.status',1);
        return $query->get()->getResult();
}





function get_serviceFeatureList($keyword){
         $query = $this->db->table('service_feature as sf');
        $query->select('sf.title,sf.slug,sr.name,sr.slug as service_slug');
         $query->like('sf.title',$keyword,'both');
         $query->join('services sr','sf.service_id=sr.id','left');
         
        $query->where('sr.status',1);
        return $query->get()->getResult();
}



function get_pageList($keyword){
         $query = $this->db->table('front_menu as fm');
         $query->select('fm.name,fm.link');
         $query->like('fm.name',$keyword,'both');
         
        $query->where('fm.status',1);
        $query->where('fm.link !=',"");
        return $query->get()->getResult();
}


function get_blogList($keyword,$type){
         $query = $this->db->table('blogs as bg');
         $query->select('bg.title,bg.slug');
         $query->like('bg.title',$keyword,'both');
        $query->where('bg.status',1);
        $query->where('bg.type',$type);


        return $query->get()->getResult();
}


function get_blog_category(){
         $query = $this->db->table('blogs as bg');
         $query->select('bc.id,bc.name');
         $query->join('blog_category as bc','bg.category=bc.id');
        $query->where('bg.status',1);
        $query->where('bg.type','BLOG');
        $query->groupBy('bg.category');

        return $query->get()->getResult();
}
    
    
    
    
    
   function get_industry_list($ids = array()){
       if(!empty($ids)){
         $query = $this->db->table('industries');
         $query->select('id,name,thumbnail,slug,icon');
      
        $query->where('status',1);
        
        $query->whereIn('id',$ids);
       return $query->get()->getResult();
       }else{
           return array(); 
       }
           
           
       }
    
    
 function get_serviceList1($ids = array()){
        if(!empty($ids)){
        $query = $this->db->table('services as sr');
        $query->select('sr.*');
        $query->whereIn('sr.id',$ids);
        $query->orderBy('sr.sortOrder','asc');
        return $query->get()->getResult();
        }else{
            return array();
        }
    }
    
    
    
}
