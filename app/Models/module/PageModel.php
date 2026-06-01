<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','slug','image','shortDescription','description','metaTitle','metaDescription','metaKeyword','bannerTitle','status','sort_order','bannerDescription','faqList','create_date','modify_date','type'];

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


function save_page($data){
      $array = array();

      $query = $this->db->table('pages');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $page_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $page_id = $this->db->insertID();
      }

      $query1 = $this->db->table('page_image');
      $query1->where('page_id',$page_id)->delete();

      if (!empty($data['imagesSortOrder'])) {
        $num = count($data['imagesSortOrder']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array(); 
        $array['page_id']= $page_id;
        if (!empty($data['images'][$i])) {
        $array['image'] = $data['images'][$i];
        }else{
        $array['image'] = @$data['old_image'][$i];
        }

        $array['sortOrder'] = $data['imagesSortOrder'][$i];
   
          $result =  $query1->insert($array); 
            
          }        
      }


      $query2 = $this->db->table('page_counter');
      $query2->where('page_id',$page_id)->delete();

      if (!empty($data['counterTitle'])) {
        $num = count($data['counterTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();
        $array['page_id']= $page_id;
        $array['title'] = $data['counterTitle'][$i];
        $array['value'] = $data['counterDescription'][$i];
        $array['symbol'] = $data['counterSymbol'][$i];
        $result =  $query2->insert($array); 
            
          }
        
        }
    
    return $page_id;
    
  }



    
function save_banner($data){
      $array = array();

      $query = $this->db->table('banner');

      if ($data['id']) {
        $query->where('id',$data['id'])->update($data['info']);
        $banner_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $banner_id = $this->db->insertID();
      }

      $query1 = $this->db->table('banner_image');
      $query1->where('banner_id',$banner_id)->delete();

   

      if (!empty($data['title'])) {
          $num = count($data['title']);
        
        for ($i=0; $i < $num ; $i++) { 
           $array = array();
        $array['banner_id']= $banner_id;
        if (!empty($data['image'][$i])) {
        $array['image'] = $data['image'][$i];
        }else{
        $array['image'] = @$data['old_image'][$i];
        }

        $array['title'] = $data['title'][$i];
        $array['link'] = $data['link'][$i];
         $array['description'] = $data['sliderDescription'][$i];
        $array['sort_order'] = $data['sort_order'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }
    
    return $result;
    
  }



}
