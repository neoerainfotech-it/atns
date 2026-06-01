<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class CmsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



function save_home_heading($data){
      $array = array();

      $query = $this->db->table('home_heading');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $home_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $home_id = $this->db->insertID();
      }

      $query1 = $this->db->table('home_feature');
      $query1->where('home_id',$home_id)->delete();


      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['home_id']= $home_id;     
       if (!empty($data['featureImage'][$i])) {
        $array['image'] = $data['featureImage'][$i];
        }else{
        $array['image'] = @$data['old_feature_image'][$i];
        }
        if (!empty($data['featureImage2'][$i])) {
        $array['image2'] = $data['featureImage2'][$i];
        }else{
        $array['image2'] = @$data['old_feature_image2'][$i];
        }
        
        $array['title'] = $data['featureTitle'][$i];
        $array['description'] = $data['featureValue'][$i];
        $array['symbol'] = $data['featureSymbol'][$i];
         $array['sort_order'] = $data['feature_sort_order'][$i]; 
          
          
          
          $result =  $query1->insert($array); 
            
           }
        
        }

    //   $query2 = $this->db->table('home_gallery');
    //   $query2->where('home_id',$home_id)->delete();


    //   if (!empty($data['gallerySortOrder'])) {
    //       $num = count($data['gallerySortOrder']);
        
    //     for ($i=0; $i < $num ; $i++) { 
    //         $array =   array();
    //     $array['home_id']= $home_id;
    //     if (!empty($data['images'][$i])) {
    //     $array['image'] = $data['images'][$i];
    //     }else{
    //     $array['image'] = @$data['old_image'][$i];
    //     }

    //     $array['sort_order'] = $data['gallerySortOrder'][$i];
       
          
    //       $result =  $query2->insert($array); 
            
    //       }
        
    //     }


    
    return $home_id;
    
  }


function save_about_heading($data){
      $array = array();

      $query = $this->db->table('about_heading');

    if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $home_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $home_id = $this->db->insertID();
      }

      $query1 = $this->db->table('visions');
      $query1->where('home_id',$home_id)->delete();
      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['home_id']= $home_id;    
          if (!empty($data['featureImages'][$i])) {
         $array['image'] = $data['featureImages'][$i];
        }else{
          $array['image'] = $data['old_why_image'][$i];
        }
        $array['title'] = $data['featureTitle'][$i];
         $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }



      $query1 = $this->db->table('whyus');
      $query1->where('home_id',$home_id)->delete();
      if (!empty($data['whyTitle'])) {
          $num = count($data['whyTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['home_id']= $home_id;  
    
        $array['title'] = $data['whyTitle'][$i];
         $array['description'] = $data['whyDescription'][$i];
        $array['sort_order'] = $data['whySortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

    return $home_id;
    
  }


/////////////////////




function save_service_heading($data){
      $array = array();

      $query = $this->db->table('service_heading');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $heading_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $heading_id = $this->db->insertID();
      }

      $query1 = $this->db->table('area_feature');
      $query1->where('heading_id',$heading_id)->delete();

   

      if (!empty($data['featureSortOrder'])) {
          $num = count($data['featureSortOrder']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['heading_id']= $heading_id;
        if (!empty($data['featureImages'][$i])) {
        $array['image'] = $data['featureImages'][$i];
        }else{
        $array['image'] = @$data['old_feature_image'][$i];
        }
        $array['description'] = $data['featureDescription'][$i];
        $array['title'] = $data['featureTitle'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

      $query2 = $this->db->table('service_area');
      $query2->where('heading_id',$heading_id)->delete();


      if (!empty($data['areaTitle'])) {
          $num = count($data['areaTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
         $array =   array();
        $array['heading_id']= $heading_id;
       
        $array['title'] = $data['areaTitle'][$i];
        // $array['description'] = $data['areaDescription'][$i];
        $array['sort_order'] = $data['areaSortOrder'][$i];
        if (!empty($data['areaImages'][$i])) {
        $array['image'] = $data['areaImages'][$i];
        }else{
        $array['image'] = @$data['old_area_image'][$i];
        }

          
          $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $heading_id;
    
  }
///////////////////////////////




function save_technology($data){
      $array = array();

      $query = $this->db->table('our_technology');

      if ($data['id']) {
        $query->where('id',$data['id'])->update($data['info']);
        $heading_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $heading_id = $this->db->insertID();
      }

      $query1 = $this->db->table('technology_feature');
      $query1->where('heading_id',$heading_id)->delete();

   

      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['heading_id']= $heading_id;
        if (!empty($data['featureImages'][$i])) {
        $array['image'] = $data['featureImages'][$i];
        }else{
        $array['image'] = @$data['old_feature_image'][$i];
        }

        $array['title'] = $data['featureTitle'][$i];
        $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

      $query2 = $this->db->table('technology_conclution');
      $query2->where('heading_id',$heading_id)->delete();


      if (!empty($data['conclusionTitle'])) {
          $num = count($data['conclusionTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
         $array =   array();
        $array['heading_id']= $heading_id;
       
        $array['title'] = $data['conclusionTitle'][$i];
        $array['wired'] = $data['wired'][$i];
        $array['wireless'] = $data['wireless'][$i];
       
          
          $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $heading_id;
    
  }

  //////////////////////////////////


  

function save_electronic($data){
      $array = array();

      $query = $this->db->table('electronic_heading');

      if ($data['id']) {
        $query->where('id',$data['id'])->update($data['info']);
        $heading_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $heading_id = $this->db->insertID();
      }

      $query1 = $this->db->table('electronic_benafits');
      $query1->where('heading_id',$heading_id)->delete();

   

      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
            $array =   array();
        $array['heading_id']= $heading_id;
        $array['title'] = $data['featureTitle'][$i];
        $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

      $query2 = $this->db->table('electronic_collection');
      $query2->where('heading_id',$heading_id)->delete();


      if (!empty($data['collectionTitle'])) {
          $num = count($data['collectionTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
         $array =   array();
        $array['heading_id']= $heading_id;
       
        $array['title'] = $data['collectionTitle'][$i];
        $array['description'] = $data['collectionDescription'][$i];
          
          $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $heading_id;
    
  }

  ///////////////////////


function save_infrastructure($data){
      $array = array();

      $query = $this->db->table('infrastructure');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $infra_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $infra_id = $this->db->insertID();
      }

      $query1 = $this->db->table('infrastructure_faq');
      $query1->where('infra_id',$infra_id)->delete();

   

      if (!empty($data['question'])) {
          $num = count($data['question']);
        
        for ($i=0; $i < $num ; $i++) { 
             $array = array();
        $array['infra_id']= $infra_id;
        $array['title'] = $data['question'][$i];
        $array['description'] = $data['answer'][$i];
        $array['sort_order'] = $data['sort_order'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }


       $query2 = $this->db->table('infrastructure_image');
       $query2->where('infra_id',$infra_id)->delete();


        if (!empty($data['gallery_sort_order'])) {
          $num = count($data['gallery_sort_order']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();

       if (!empty($data['images'][$i])) {
        $array['image'] = $data['images'][$i];
        }else{
        $array['image'] = @$data['old_image'][$i];
        }

        $array['infra_id']= $infra_id;
        $array['sort_order'] = $data['gallery_sort_order'][$i];

        $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $infra_id;
    
  }
////////////////////


  

function save_sustainability($data){
      $array = array();

      $query = $this->db->table('sustainability');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $sustainability_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $sustainability_id = $this->db->insertID();
      }

      $query1 = $this->db->table('sustainability_commit');
      $query1->where('sustainability_id',$sustainability_id)->delete();

   

      if (!empty($data['commitSortOrder'])) {
          $num = count($data['commitSortOrder']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();
          $array['sustainability_id']= $sustainability_id;

         if (!empty($data['commitImage'][$i])) {
          $array['image'] = $data['commitImage'][$i];
          }else{
          $array['image'] = @$data['old_commit_image'][$i];
          }
          $array['sort_order'] = $data['commitSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }


       $query2 = $this->db->table('sustainability_pillar');
       $query2->where('sustainability_id',$sustainability_id)->delete();


        if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();

       if (!empty($data['featureImages'][$i])) {
        $array['image'] = $data['featureImages'][$i];
        }else{
        $array['image'] = @$data['old_feature_image'][$i];
        }

        $array['sustainability_id']= $sustainability_id;
        $array['title'] = $data['featureTitle'][$i];
         $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
        $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $sustainability_id;
    
  }

function save_cx_heading($data){
      $array = array();

      $query = $this->db->table('cx_heading');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $cx_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $cx_id = $this->db->insertID();
      }

      $query1 = $this->db->table('cx_feature');
      $query1->where('cx_id',$cx_id)->delete();

   

      if (!empty($data['featureSortOrder'])) {
          $num = count($data['featureSortOrder']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();
          $array['cx_id']= $cx_id;
         if (!empty($data['featureImages'][$i])) {
          $array['image'] = $data['featureImages'][$i];
          }else{
          $array['image'] = @$data['old_feature_image'][$i];
          }
          $array['title'] = $data['featureTitle'][$i];
          $array['description'] = $data['featureDescription'][$i];
          $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }


       $query2 = $this->db->table('cx_faq');
       $query2->where('cx_id',$cx_id)->delete();


        if (!empty($data['faqTitle'])) {
          $num = count($data['faqTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();

        $array['cx_id']= $cx_id;
        $array['title'] = $data['faqTitle'][$i];
         $array['description'] = $data['faqDescription'][$i];
        $array['sort_order'] = $data['faqSortOrder'][$i];
        $result =  $query2->insert($array); 
            
           }
        
        }
    
    return $cx_id;
    
  }
  
    
  function get_global_presence_list(){
    
        $query = $this->db->table('global_presence as gp');
        $query->select('gp.*');
        return  $query->get()->getResult();
       
    }
  
  
  
  
  function save_cx_feature($data){
      $array = array();

      $query = $this->db->table('cx_feature_tab');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $cx_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $cx_id = $this->db->insertID();
      }

    //   $query1 = $this->db->table('cx_feature');
    //   $query1->where('cx_id',$cx_id)->delete();

   

    //   if (!empty($data['featureSortOrder'])) {
    //       $num = count($data['featureSortOrder']);
        
    //     for ($i=0; $i < $num ; $i++) { 
    //       $array = array();
    //       $array['cx_id']= $cx_id;
    //      if (!empty($data['featureImages'][$i])) {
    //       $array['image'] = $data['featureImages'][$i];
    //       }else{
    //       $array['image'] = @$data['old_feature_image'][$i];
    //       }
    //       $array['title'] = $data['featureTitle'][$i];
    //       $array['description'] = $data['featureDescription'][$i];
    //       $array['sort_order'] = $data['featureSortOrder'][$i];
          
    //       $result =  $query1->insert($array); 
            
    //       }
        
    //     }


    //   $query2 = $this->db->table('cx_faq');
    //   $query2->where('cx_id',$cx_id)->delete();


    //     if (!empty($data['faqTitle'])) {
    //       $num = count($data['faqTitle']);
        
    //     for ($i=0; $i < $num ; $i++) { 
    //       $array = array();

    //     $array['cx_id']= $cx_id;
    //     $array['title'] = $data['faqTitle'][$i];
    //      $array['description'] = $data['faqDescription'][$i];
    //     $array['sort_order'] = $data['faqSortOrder'][$i];
    //     $result =  $query2->insert($array); 
            
    //       }
        
    //     }
    
    return $cx_id;
    
  }
  
  
  

}
