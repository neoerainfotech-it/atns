<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'enquiry';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','firstName','job','service','phone','country','type','zipcode','email','message','address','create_date','product'];

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
    
    
    
    
    
    
      function get_enquiry_detail($id){
       $query = $this->db->table('enquiry as eq');
        $query->select('eq.*,sr.name as service_name,cnt.name as country_name,pd.name as product_name');
        $query->join('country cnt','eq.country=cnt.id','left');
        $query->join('services sr','eq.service=sr.id','left');
        $query->join('products pd','eq.product=pd.id','left');
         $query->where('eq.id',$id);
        return $query->get()->getRow();
    }
    
    
    
    
    
}
