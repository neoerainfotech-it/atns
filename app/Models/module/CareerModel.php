<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class CareerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'careers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','location','slug','experience','salary','description','status','jobType','department','create_date','modify_date','sort_order','metaTitle','metaKeyword','metaDescription','image','responsibility','jobFunction','role','desireSkill','skill','grade','qualification','jobId'];

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
    
        
     public function get_enquiry_detail($id){
        if(!empty($id)){
                $query = $this->db->table('career_enquiry ce');
                $query->select('ce.*,cr.title as career_name');
                $query->join('careers cr','ce.job_id=cr.id');
                $query->where('ce.id',$id);
               return  $query->get()->getRow();
        }else{
            return array(); 
        }
    }
    
    
    
            

    
    
}
