<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class ProjectCategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'project_category';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','description','image','slug','sortOrder','metaTitle','metaKeyword','metaDescription','status'];

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


    
function save_project_category($data){
      $array = array();

      $query = $this->db->table('project_category');

      if (!empty($data['id'])) {

        $query->where('id',$data['id'])->update($data['info']);
        $projectId = $data['id'];
     
      }else{

        $query->insert($data['info']);
        $projectId = $this->db->insertID();
      }

      $query1 = $this->db->table('project_feature');
      $query1->where('project_category_id',$projectId)->delete();

   
      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['project_category_id']= $projectId;
        $array['title'] = $data['featureTitle'][$i];
        $array['sort_order'] = $data['featureSortOrder'][$i];
        $array['description'] = $data['featureDescription'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

      $query2 = $this->db->table('project_equipment');
 
      if (!empty($data['equipmentTitle'])) {
          $num = count($data['equipmentTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['project_category_id']= $projectId;
        $array['title'] = $data['equipmentTitle'][$i];
        $array['slug'] = $data['equipmentSlug'][$i]?sfu($data['equipmentSlug'][$i]):sfu($data['equipmentTitle'][$i]);
        $array['sort_order'] = $data['equipmentSortOrder'][$i];

       if (!empty($data['featureImages'][$i])) {
        $array['image'] = $data['featureImages'][$i];
        }else{
        $array['image'] = @$data['feature_old_image'][$i];
        }
        
        if(!empty($data['equipment_old_id'][$i])){
                 $result =  $query2->update($array,array('id'=>$data['equipment_old_id'][$i])); 
        }else{
                 $result =  $query2->insert($array); 
        }

        
        }
      }
    
    return $projectId;
    
  }







}
