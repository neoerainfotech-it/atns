<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
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


    
function save_product($data){
      $array = array();

      $query = $this->db->table('products');

      if ($data['id']) {
        $query->where('id',$data['id'])->update($data['info']);
        $product_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $product_id = $this->db->insertID();
      }

      $query1 = $this->db->table('product_feature');
      $query1->where('product_id',$product_id)->delete();

   

      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['product_id']= $product_id;
        if (!empty($data['featureImages'][$i])) {
        $array['image'] = $data['featureImages'][$i];
        }else{
        $array['image'] = @$data['feature_old_image'][$i];
        }

        $array['title'] = $data['featureTitle'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
         $array['description'] = $data['featureDescription'][$i];
          $array['youtube'] = $data['featureYoutube'][$i]; 
          $result =  $query1->insert($array); 
            
           }
        
        }

      $query2 = $this->db->table('product_capabilities');
      $query2->where('product_id',$product_id)->delete();

      if (!empty($data['capabilitiesTitle'])) {
          $num = count($data['capabilitiesTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['product_id']= $product_id;
        $array['title'] = $data['capabilitiesTitle'][$i];
        $array['description'] = $data['capabilitiesDescription'][$i];
        $array['sort_order'] = $data['capabilitiesSortOrder'][$i];
          
         $result =  $query2->insert($array); 

        
        }
      }

      $query3 = $this->db->table('product_images');
      $query3->where('product_id',$product_id)->delete();

      if (!empty($data['imageSortOrder'])) {
          $num = count($data['imageSortOrder']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
     
        $array['product_id']= $product_id;
        if (!empty($data['images'][$i])) {
      
        $array['image'] = $data['images'][$i];
        }else{
        $array['image'] = @$data['old_image'][$i];
        }

        $array['sort_order'] = $data['imageSortOrder'][$i];
          
          $result =  $query3->insert($array); 
            
           }
        
        }
    
    return $product_id;
    
  }







}
