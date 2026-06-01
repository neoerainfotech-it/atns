<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class IndustryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'industries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','shortDescription','description','sortOrder','status','image','create_date','modify_date','slug','category'];

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


    

function save_industry($data){
      $array = array();

      $query = $this->db->table('industries');

      if (!empty($data['id'])) {
        $query->where('id',$data['id'])->update($data['info']);
        $industry_id = $data['id'];
      }else{
        $query->insert($data['info']);
        $industry_id = $this->db->insertID();
      }

      $query1 = $this->db->table('industry_feature');
      $query1->where('industry_id',$industry_id)->delete();

      if (!empty($data['featureTitle'])) {
          $num = count($data['featureTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
          $array = array();
        $array['industry_id']= $industry_id;
        // if (!empty($data['images'][$i])) {
        // $array['image'] = $data['images'][$i];
        // }else{
        // $array['image'] = @$data['old_image'][$i];
        // }
        $array['slug'] = sfu($data['featureTitle'][$i]);
        $array['title'] = $data['featureTitle'][$i];
        $array['description'] = $data['featureDescription'][$i];
        $array['sort_order'] = $data['feature_sort_order'][$i];
          
          $result =  $query1->insert($array); 
            
           }
        
        }

       $query2 = $this->db->table('industry_process');
       $query2->where('industry_id',$industry_id)->delete();

       if (!empty($data['feeTitle'])) {
           $num = count($data['feeTitle']);
        
         for ($i=0; $i < $num ; $i++) { 
           $array = array();
          $array['industry_id']= $industry_id;
          
          if (!empty($data['images'][$i])) {
           $array['image'] = $data['images'][$i];
            }else{
            $array['image'] = @$data['old_image'][$i];
          }
        
          $array['title'] = $data['feeTitle'][$i];
          $array['description'] = $data['feeDescription'][$i];
          $array['sort_order'] = $data['fee_sort_order'][$i];
           $result =  $query2->insert($array); 
            
            }
        
         }
         
    $query3 = $this->db->table('industry_solution');
       $query3->where('industry_id',$industry_id)->delete();

       if (!empty($data['solutionTitle'])) {
           $num = count($data['solutionTitle']);
        
         for ($i=0; $i < $num ; $i++) { 
           $array = array();
          $array['industry_id']= $industry_id;
          
          if (!empty($data['solutionImages'][$i])) {
           $array['image'] = $data['solutionImages'][$i];
            }else{
            $array['image'] = @$data['old_solutionImages'][$i];
          }
        
          $array['title'] = $data['solutionTitle'][$i];
          $array['description'] = $data['solutionDescription1'][$i];
          $array['sort_order'] = $data['solution_sort_order'][$i];
           $result =  $query3->insert($array); 
            
            }
        
         }
    
    return $industry_id;
    
  }

}
