<?php

namespace App\Models\Cms;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table            = 'testimonials';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    
    // Explicitly mapping the accurate columns from your table schema
    protected $allowedFields    = [
        'name', 'image', 'type', 'description', 'shortDescription', 
        'designation', 'sort_order', 'url_link', 'status', 
        'create_date', 'image2', 'tagLine', 'modify_date'
    ];
}