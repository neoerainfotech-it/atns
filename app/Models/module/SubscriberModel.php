<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class SubscriberModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subscribers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','firstName','lastName','solution','phone','country','type','zipcode','email','message','address','create_date','industry'];

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
    
    
    
    
    //       function get_project_images($id,$limit=false,$offset=false){
    //      $query = $this->db->table('project_gallery as pg');
    //     $query->select('pgi.*');
    //     $query->join('project_gallery_image pgi','pg.id=pgi.gallery_id','left');
    //     $query->where('pg.status',1);
    //       $query->where('pgi.status',1);
    //     $query->where('pg.project_id',$id);
    //     $query->orderBy('pg.sort_order','asc');
    //     if(!empty($limit)){
    //         $query->limit($limit,$offset);
    //     }
    //     return $query->get()->getResult();
    // }
    
    
    
    
    
    
}
