<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    // The exact table name from your database schema file
    protected $table            = 'cyb_blogs'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Allows using ->column syntax safely
    protected $useSoftDeletes   = false;

    // Registers all fields that the controller is allowed to insert/update
    protected $allowedFields    = [
        'title', 
        'slug', 
        'category', 
        'description', 
        'author', 
        'thumbnail', 
        'image', 
        'feature', 
        'shortDescription', 
        'video', 
        'whitepaper_download', 
        'product', 
        'service', 
        'industry', 
        'challenge', 
        'solution', 
        'benefit', 
        'location', 
        'type', 
        'link', 
        'upcoming', 
        'upcomingDate', 
        'eventTime', 
        'metaTitle', 
        'metaKeyword', 
        'publish', 
        'metaDescription', 
        'status', 
        'sort_order',

        // ==========================================================================
        // MANDATORY WHITELIST: NEW DYNAMIC FRONTEND REGISTRATION ENGINE FIELDS
        // ==========================================================================
        'field_name_placeholder',
        'field_name_required',
        'field_company_placeholder',
        'field_company_required',
        'field_title_placeholder',
        'field_title_required',
        'field_email_placeholder',
        'field_email_corporate_only',
        'field_phone_placeholder',
        'field_phone_required',
        'field_expect_placeholder',
        'field_expect_required',
        'field_erp_options'
    ];

    // Dates logging configurations
    protected $useTimestamps = false;
    protected $createdField  = 'create_date';
    protected $updatedField  = 'modify_date';
}