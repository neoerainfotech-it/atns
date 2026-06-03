<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
// Note: Replace with the actual namespace path of your existing database model if named differently
use App\Models\BlogModel; 

class Blogs extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        // Instantiates the model to handle database communications
        $this->blogModel = new BlogModel();
    }

    /**
     * Display the Admin Listing Panel Grid Page
     */
    public function index()
    {
        $data['page_title'] = "Manage Webinars & Blogs";
        
        // Fetches all rows from your table
        $data['blogs'] = $this->blogModel->orderBy('id', 'DESC')->findAll();
        
        return view('admin/blogs/list', $data); 
    }

    /**
     * Render the Add New Record Page Interface
     */
    public function add()
    {
        $data['page_title'] = "Add New Webinar / Event";
        $data['form_action'] = base_url('admin/blogs/save');

        // Set default blank fallbacks to avoid undefined variable notices in the view template
        $fields = [
            'title', 'shortDescription', 'description', 'metaTitle', 'metaKeyword', 'metaDescription',
            'category', 'type', 'location', 'link', 'publish', 'upcomingDate', 'eventTime', 'slug',
            'status', 'product', 'service', 'industry', 'challenge', 'solution', 'benefit', 'image', 'thumbnail', 'whitepaper_download',
            'field_name_placeholder', 'field_name_required', 'field_company_placeholder', 'field_company_required',
            'field_title_placeholder', 'field_title_required', 'field_email_placeholder', 'field_email_corporate_only',
            'field_phone_placeholder', 'field_phone_required', 'field_expect_placeholder', 'field_expect_required',
            'field_erp_options', 'form_title', 'form_description', 'form_country_default', 'form_message_default', 'form_corporate_filter', 'form_focus_bullets'
        ];

        foreach ($fields as $field) {
            $data[$field] = '';
        }

        // Set explicit default selections matching layout screenshot defaults
        $data['feature'] = 0;
        $data['upcoming'] = 0;
        $data['status'] = 1;
        $data['field_name_required'] = 1;
        $data['field_company_required'] = 1;
        $data['field_title_required'] = 1;
        $data['field_email_corporate_only'] = 1;
        $data['field_phone_required'] = 1;
        $data['field_expect_required'] = 1;
        $data['field_erp_options'] = "Microsoft Dynamics 365\nSAP\nOracle\nTally\nQuickBooks\nExcel / Manual Spreadsheets";

        // Mock lookup data frames arrays required by select filters inside the view
        $data['blogCategoryList'] = $this->getMockCategories();
        $data['typeList'] = ['webinar' => 'Webinar Event', 'blog' => 'Standard Blog Post'];
        $data['productList'] = []; 
        $data['serviceList'] = [];
        $data['industryList'] = [];

        return view('admin/blogs/form', $data);
    }

    /**
     * Fetch Record Data and Load the Multi-Tab Edit Form Panel View
     */
    public function edit($id)
    {
        $record = $this->blogModel->find($id);

        if (!$record) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Requested webinar record does not exist.');
        }

        $data['page_title'] = "Edit Webinar Component: " . esc($record->title);
        $data['form_action'] = base_url('admin/blogs/save/' . $id);

        // Map every column value from database entity row array directly into the layout data block keys
        foreach ($record as $key => $value) {
            $data[$key] = $value;
        }

        // Load lookup datasets required to populate your dashboard dropdown element modules
        $data['blogCategoryList'] = $this->getMockCategories();
        $data['typeList'] = ['webinar' => 'Webinar Event', 'blog' => 'Standard Blog Post'];
        $data['productList'] = []; 
        $data['serviceList'] = [];
        $data['industryList'] = [];

        return view('admin/blogs/form', $data);
    }

    /**
     * Process, Validate, and Save Form Request Data to your Database Engine
     */
    public function save($id = null)
    {
        // Define robust server-side validation rules parameters architecture
        $rules = [
            'title'     => 'required|min_length[3]',
            'metaTitle' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please correct all marked error constraints before saving.');
        }

        // 1. Build Data Array from Form POST Data (mapping standard layout descriptors)
        $dbData = [
            'title'             => $this->request->getPost('title'),
            'shortDescription'  => $this->request->getPost('shortDescription'),
            'description'       => $this->request->getPost('description'),
            'metaTitle'         => $this->request->getPost('metaTitle'),
            'metaKeyword'       => $this->request->getPost('metaKeyword'),
            'metaDescription'   => $this->request->getPost('metaDescription'),
            'category'          => $this->request->getPost('category'),
            'type'              => $this->request->getPost('type'),
            'location'          => $this->request->getPost('location'),
            'link'              => $this->request->getPost('link'),
            'publish'           => $this->request->getPost('publish') ? $this->request->getPost('publish') : null,
            'upcomingDate'      => $this->request->getPost('upcomingDate'),
            'eventTime'         => $this->request->getPost('eventTime') ? $this->request->getPost('eventTime') : null,
            'slug'              => $this->request->getPost('slug') ? url_title($this->request->getPost('slug'), '-', true) : url_title($this->request->getPost('title'), '-', true),
            'product'           => $this->request->getPost('product'),
            'service'           => $this->request->getPost('service'),
            'industry'          => $this->request->getPost('industry'),
            'challenge'         => $this->request->getPost('challenge'),
            'solution'          => $this->request->getPost('solution'),
            'benefit'           => $this->request->getPost('benefit'),

            // Form Switch fields mapping fallbacks
            'feature'           => $this->request->getPost('feature') ?? 0,
            'upcoming'          => $this->request->getPost('upcoming') ?? 0,
            'status'            => $this->request->getPost('status') ?? 0,

            // ==========================================================================
            // CONNECTING THE TAB 4: FRONTEND REGISTRATION REGULATORY VARIABLES KEYS
            // ==========================================================================
            'field_name_placeholder'     => $this->request->getPost('field_name_placeholder'),
            'field_name_required'        => $this->request->getPost('field_name_required') ?? 0,
            
            'field_company_placeholder'  => $this->request->getPost('field_company_placeholder'),
            'field_company_required'     => $this->request->getPost('field_company_required') ?? 0,
            
            'field_title_placeholder'    => $this->request->getPost('field_title_placeholder'),
            'field_title_required'       => $this->request->getPost('field_title_required') ?? 0,
            
            'field_email_placeholder'    => $this->request->getPost('field_email_placeholder'),
            'field_email_corporate_only' => $this->request->getPost('field_email_corporate_only') ?? 0,
            
            'field_phone_placeholder'    => $this->request->getPost('field_phone_placeholder'),
            'field_phone_required'       => $this->request->getPost('field_phone_required') ?? 0,
            
            'field_expect_placeholder'   => $this->request->getPost('field_expect_placeholder'),
            'field_expect_required'      => $this->request->getPost('field_expect_required') ?? 0,
            
            'field_erp_options'          => $this->request->getPost('field_erp_options'),
        ];

        // 2. Process Binary File Upload Assets Frameworks
        $uploadFields = ['image', 'thumbnail', 'whitepaper_download'];
        foreach ($uploadFields as $fieldKey) {
            $file = $this->request->getFile($fieldKey);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                
                // Generates encryption obfuscated file strings names securely
                $newRandomName = $file->getRandomName();
                
                // Moves binary data stream into your web root assets folder
                $file->move(ROOTPATH . 'public/uploads/webinars/', $newRandomName);
                
                // Record local resource routing URL strings inside DB map array
                $dbData[$fieldKey] = 'uploads/webinars/' . $newRandomName;
            }
        }

        // 3. Database Execution Logic
        if ($id) {
            $this->blogModel->update($id, $dbData);
            return redirect()->to(base_url('admin/blogs'))->with('success', 'Changes updated successfully.');
        } else {
            $this->blogModel->save($dbData);
            return redirect()->to(base_url('admin/blogs'))->with('success', 'New webinar element generated successfully.');
        }
    }

    /**
     * Helper list generator loop for system categories
     */
    private function getMockCategories()
    {
        // Fetches from your database logic if active, falls back cleanly onto an array objects
        return [
            (object)['id' => 1, 'name' => 'Technology close ups'],
            (object)['id' => 2, 'name' => 'Financial Consolidation Workspace'],
            (object)['id' => 3, 'name' => 'Power BI System Analytics']
        ];
    }
}