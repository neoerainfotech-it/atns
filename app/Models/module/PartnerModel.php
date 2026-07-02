<?php

namespace App\Models\Module;

use CodeIgniter\Model;

class PartnerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cyb_partners';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // whitelisted fields matching the global configurations pipeline
    protected $allowedFields    = [
        'name', 
        'image', 
        'description', 
        'status', 
        'sort_order', 
        'create_date', 
        'modify_date', 
        'tag_id', 
        'type',
        'banner_badge_1', 
        'banner_badge_2', 
        'banner_title', 
        'banner_description',
        'banner_image_primary', 
        'banner_image_secondary',
        'trusted_verticals_text', 
        'inline_sectors_list',
        'cta_label_1', 
        'cta_url_1', 
        'cta_label_2', 
        'cta_url_2',
        'ecosystem_badge', 
        'ecosystem_title', 
        'ecosystem_description',
        'tech_value_title', 
        'tech_value_description',
        
        // Dynamic Repeater field layer mapping structural cards arrays
        'section_6_cards',

        'vertical_title_1', 
        'vertical_mfg_nodes',
        'vertical_title_2', 
        'vertical_retail_nodes',
        'vertical_title_3', 
        'vertical_textile_nodes',
        'vertical_title_4', 
        'vertical_fnb_nodes',
        'alliances_badge', 
        'alliances_title', 
        'alliances_description',
        'pillar_label_1', 
        'pillar_desc_1', 
        'pillar_label_2', 
        'pillar_desc_2',
        'pillar_label_3', 
        'pillar_desc_3', 
        'pillar_label_4', 
        'pillar_desc_4',
        'pillar_label_5', 
        'pillar_desc_5', 
        'pillar_label_6', 
        'pillar_desc_6',
        'ms_center_title', 
        'ms_center_subtitle', 
        'ms_center_description',
        'ms_bullet_t1', 
        'ms_bullet_d1', 
        'ms_bullet_t2', 
        'ms_bullet_d2',
        'ms_bullet_t3', 
        'ms_bullet_d3', 
        'ms_bullet_t4', 
        'ms_bullet_d4',
        'stat_val_1', 
        'stat_lbl_1', 
        'stat_val_2', 
        'stat_lbl_2',
        'stat_val_3', 
        'stat_lbl_3', 
        'stat_val_4', 
        'stat_lbl_4',
        'accelerators_badge', 
        'accelerators_title', 
        'accelerators_description',
        'sol_title_1', 
        'sol_desc_1', 
        'sol_title_2', 
        'sol_desc_2',
        'sol_title_3', 
        'sol_desc_3', 
        'sol_title_4', 
        'sol_desc_4'
    ];

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