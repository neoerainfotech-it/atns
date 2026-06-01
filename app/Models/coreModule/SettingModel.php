<?php

namespace App\Models\coreModule;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setting';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['code','key','value'];

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



    function save_setting($data = array()){
        if ($data) {
        $query = $this->db->table('setting');   
        $code ='config';
        $array = array();
        $query->where('code',$code)->delete();
        foreach ($data as $key => $value) {
          $array['code'] = $code;
          $array['key'] = $key;
          if (is_array($value)) {
          $array['value'] = json_encode($value);
          }else{
          $array['value'] = $value;
          }
          
          $query->insert($array);
           }
          }
         return true;
    }







    
}
