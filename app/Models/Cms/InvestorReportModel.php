<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class InvestorReportModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'investor_reports';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','description','image','projectId','sortOrder','project_equipment_id','project_category_id','project_equipment_id','status'];

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


    
function save_investor_reports($data){
      $array = array();

      $query = $this->db->table('investor_reports');

      if (!empty($data['id'])) {

        $query->where('id',$data['id'])->update($data['info']);
        $projectId = $data['id'];
     
      }else{

        $query->insert($data['info']);
        $projectId = $this->db->insertID();
      }

      $query1 = $this->db->table('investor_report_list');
      
   
      if (!empty($data['equipmentTitle'])) {
          $num = count($data['equipmentTitle']);
        
        for ($i=0; $i < $num ; $i++) { 
        $array = array();
        $array['investor_report_id']= $projectId;
        $array['title'] = $data['equipmentTitle'][$i];
        $array['sort_order'] = $data['equipmentSortOrder'][$i];

        if (!empty($data['featureImages'][$i])) {
           $array['image'] = $data['featureImages'][$i];
        }else{
             $array['image'] = @$data['feature_old_image'][$i];
        }
        
        if(!empty($data['equipment_old_id'][$i]))
            {
                $result =  $query1->update($array,array('id'=>$data['equipment_old_id'][$i])); 
            }else{
              $result =  $query1->insert($array);   
            }
        

            
           }
        
        }
    
    return $projectId;
    
  }







}
