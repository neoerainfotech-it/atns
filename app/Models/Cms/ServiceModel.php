<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'services';
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





function save_service($data){
      $array = array();

      $query = $this->db->table('services');

      if ($data['id']) {
        $query->where('id',$data['id'])->update($data['info']);
        $service_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $service_id = $this->db->insertID();
      }

      $query1 = $this->db->table('service_feature');
      $query1->where('service_id',$service_id)->delete();

      if (!empty($data['title'])) {
          $num = count($data['title']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();
        $array['service_id']= $service_id;
        if (!empty($data['images'][$i])) {
        $array['image'] = $data['images'][$i];
        }else{
        $array['image'] = @$data['old_image'][$i];
        }

        $array['title'] = $data['title'][$i];
        $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['feature_sort_order'][$i];
          $array['slug'] = sfu($data['title'][$i]); 
          $result =  $query1->insert($array); 
            
           }
        
        }

      // $query2 = $this->db->table('solution_fee');
      // $query2->where('service_id',$service_id)->delete();

      // if (!empty($data['area'])) {
      //     $num = count($data['area']);
        
      //   for ($i=0; $i < $num ; $i++) { 
      //     $array = array();
      //   $array['service_id']= $service_id;
      //    $array['area'] = $data['area'][$i];
      //    $array['price'] = $data['price'][$i];
      //    $array['arrival'] = $data['arrival'][$i];
          
      //     $result =  $query2->insert($array); 
            
      //      }
        
      //   }
    
    return $service_id;
    
  }






}
