<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','metaTitle','metaKeyword','metaDescription','parent','slug','status','sortOrder','shortDescription','description','image','bottomImage','industry','layout'];

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






    
function save_standard($data){
        $array = array();

        $query = $this->db->table('category_standard');
   
        $category_id = $data['id']; 
        $query->where('category_id',$category_id)->delete();

      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['category_id']= $category_id;
        $array['title'] = $data['featureTitle'][$i];
        $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
          
          $result =  $query->insert($array); 
            
           }
        
        }

    
    
    return $category_id;
    
  }





}
