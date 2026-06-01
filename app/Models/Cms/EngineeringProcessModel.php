<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class EngineeringProcessModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'engineering_process';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','description','sortOrder','status','infra_id'];

    // Dates
    protected $useTimestamps = true;
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
    
    
    function save_images($data){
 
      $id = $data['info']['id'];    

      $query1 = $this->db->table('engineering_images');
      $query1->where('engg_id',$id)->delete();
     
      if (!empty($data['gallery_sort_order'])) {
          $num = count($data['gallery_sort_order']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array =   array();
        $array['engg_id']= $id;  
        if (!empty($data['images'][$i])) {
         $array['image'] = $data['images'][$i];
        }else{
          $array['image'] = $data['old_image'][$i];
        }

         $array['sort_order'] = $data['gallery_sort_order'][$i];
         $result =  $query1->insert($array); 
            
      }
        
    }

    return $result;
    
  }


    
    
    

}
?>