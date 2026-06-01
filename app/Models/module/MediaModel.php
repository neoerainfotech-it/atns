<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class MediaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','slug','audio','link','alt_tag2','alt_tag','category','description','description2','image','thumbnail','type','tags','publish','status','sort_order','create_date','modify_date','metaTitle','metaKeyword','metaDescription','shortDescription','feature','scope','location','author','trending','whitepaper_download','video','upcoming','industry','client','spotlight','readingTime','product','service','industry','challenge','solution','benefit','upcomingDate','eventTime'];

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















}
