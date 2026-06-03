<?php

namespace App\Controllers\admin; // Clean lowercase namespace setup

use App\Controllers\BaseController;

class WebinarController extends BaseController
{
    /**
     * 1. View all Customer Webinar Registration Enquiries (Leads List)
     */
    public function registrations()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('cyb_webinar_registration'); 

        // Search by attendee Name instead of webinar title
        $searchName = $this->request->getGet('name');
        if (!empty($searchName)) {
            $builder->like('name', $searchName);
        }

        $perPage = 10; 
        $page = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
        
        $totalBuilder = clone $builder;
        $total = $totalBuilder->countAllResults(false);

        $offset = ($page - 1) * $perPage;
        
        // Order by latest lead registration first
        $detail = $builder->limit($perPage, $offset)->orderBy('id', 'DESC')->get()->getResult();

        $pager = \Config\Services::pager();

        $data = [
            'page_title' => 'Webinar Enquiries',
            'detail'     => $detail,
            'pager'      => $pager,
            'page'       => $page,
            'perPage'    => $perPage,
            'total'      => $total,
            'offset'     => $offset,
            'pages'      => ceil($total / $perPage)
        ];

        return view('admin/module/webinar_registrations', $data);
    }

    /**
     * ADDED: 2. Processes Selected Checked Rows and Streams an Excel-Compatible CSV Document
     * This downloads the file instantly and keeps you on the same admin list page.
     */
    public function export()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('cyb_webinar_registration');

        // Collect form data selection checked item indices array
        $selectedIds = $this->request->getPost('selected');

        if (empty($selectedIds)) {
            // If no checkboxes are marked, automatically pull all records
            $records = $builder->orderBy('id', 'DESC')->get()->getResult();
        } else {
            // Extract elements matching only the selected checkboxes
            $records = $builder->whereIn('id', $selectedIds)->orderBy('id', 'DESC')->get()->getResult();
        }

        if (empty($records)) {
            return redirect()->back()->with('error', 'No registration entries available for export.');
        }

        $fileName = "Webinar_Registrations_" . date('Ymd_His') . ".csv";

        // Configure direct file system response download streams headers
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public");

        // Open direct output buffer stream
        $output = fopen("php://output", "w");

        // Add UTF-8 BOM so Excel opens local languages and special text characters correctly
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

        // Define spreadsheet header columns rows mapping
        fputcsv($output, [
            'ID', 
            'Attendee Name', 
            'Email Address', 
            'Phone Number', 
            'Company Name', 
            'Job Title', 
            'ERP System', 
            'Expectations', 
            'Registration Date'
        ]);

        // Loop over database rows and write directly into the CSV download stream
        foreach ($records as $row) {
            fputcsv($output, [
                $row->id,
                $row->name,
                $row->email,
                $row->phone ?? '',
                $row->company_name ?? '',
                $row->title ?? '',
                $row->erp_system ?? '',
                strip_tags($row->expectation ?? ''),
                $row->create_date ?? ''
            ]);
        }

        fclose($output);
        exit; // Halts standard rendering engine to push raw document streams safely
    }

    /**
     * 3. Edit Webinar Event Page Content & Form Configurations (CMS Tab Editor)
     */
    public function edit_webinar($id)
    {
        $db = \Config\Database::connect();
        
        // FIXED: Querying 'cyb_blogs' table to extract the Webinar Event configuration setup
        $webinar = $db->table('cyb_blogs')->where('id', $id)->get()->getRow();

        if (!$webinar) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Webinar Event item not found!');
        }

        // Fetch support lists to cleanly populate dashboard dropdowns
        $blogCategoryList = $db->table('cyb_about_heading')->get()->getResult(); // Example list source placeholder

        // Compile and map all row values directly into the view array
        $data = [
            'page_title'       => 'Edit Webinar Page: ' . ($webinar->title ?? 'Event'),
            'form_action'      => base_url('admin/update_webinar/' . $id),
            
            // Tab 1 & 2: General CMS Page Data Mapping
            'title'            => $webinar->title ?? '',
            'shortDescription' => $webinar->shortDescription ?? '',
            'description'      => $webinar->description ?? '',
            'metaTitle'        => $webinar->metaTitle ?? '',
            'metaKeyword'      => $webinar->metaKeyword ?? '',
            'metaDescription'  => $webinar->metaDescription ?? '',
            'category'         => $webinar->category ?? '',
            'type'             => $webinar->type ?? 'webinar',
            'image'            => $webinar->image ?? '',
            'thumbnail'        => $webinar->thumbnail ?? '',
            'whitepaper_download' => $webinar->whitepaper_download ?? '',
            'feature'          => $webinar->feature ?? 0,
            'upcoming'         => $webinar->upcoming ?? 0,
            'location'         => $webinar->location ?? '',
            'link'             => $webinar->link ?? '',
            'publish'          => $webinar->publish ?? '',
            'upcomingDate'     => $webinar->upcomingDate ?? '',
            'eventTime'        => $webinar->eventTime ?? '',
            'slug'             => $webinar->slug ?? '',
            'status'           => $webinar->status ?? 1,
            
            // Tab 3: Customer Success Variable Maps
            'product'          => $webinar->product ?? '',
            'service'          => $webinar->service ?? '',
            'industry'         => $webinar->industry ?? '',
            'challenge'        => $webinar->challenge ?? '',
            'solution'         => $webinar->solution ?? '',
            'benefit'          => $webinar->benefit ?? '',

            // ==========================================================================
            // TAB 4: NEW DYNAMIC REGISTRATION FORM CONFIGURATION FIELDS MAPPING
            // ==========================================================================
            'field_name_placeholder'     => $webinar->field_name_placeholder ?? 'First and last name',
            'field_name_required'        => $webinar->field_name_required ?? 1,
            
            'field_company_placeholder'  => $webinar->field_company_placeholder ?? 'Your organization name',
            'field_company_required'     => $webinar->field_company_required ?? 1,
            
            'field_title_placeholder'    => $webinar->field_title_placeholder ?? 'e.g., Chief Financial Officer',
            'field_title_required'       => $webinar->field_title_required ?? 1,
            
            'field_email_placeholder'    => $webinar->field_email_placeholder ?? 'name@company.com',
            'field_email_corporate_only' => $webinar->field_email_corporate_only ?? 1,
            
            'field_phone_placeholder'    => $webinar->field_phone_placeholder ?? '10-digit mobile number',
            'field_phone_required'       => $webinar->field_phone_required ?? 1,
            
            'field_expect_placeholder'   => $webinar->field_expect_placeholder ?? 'Briefly describe your objectives or challenges...',
            'field_expect_required'      => $webinar->field_expect_required ?? 1,
            
            'field_erp_options'          => $webinar->field_erp_options ?? "Microsoft Dynamics 365\nSAP\nOracle\nTally\nQuickBooks\nExcel / Manual Spreadsheets",

            // View Control List Arrays
            'blogCategoryList' => $blogCategoryList, 
            'typeList'         => ['webinar' => 'Webinar Event', 'blog' => 'Standard Blog Post'],
            'productList'      => [],
            'serviceList'      => [],
            'industryList'     => []
        ];

        return view('admin/module/webinar_registrations_edit', $data);
    }

    /**
     * 4. Handle the Save/POST request to update the record in the database
     */
    public function update_webinar($id)
    {
        $db = \Config\Database::connect();
        
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
            'slug'              => $this->request->getPost('slug'),
            'product'           => $this->request->getPost('product'),
            'service'           => $this->request->getPost('service'),
            'industry'          => $this->request->getPost('industry'),
            'challenge'         => $this->request->getPost('challenge'),
            'solution'          => $this->request->getPost('solution'),
            'benefit'           => $this->request->getPost('benefit'),

            // Checkboxes fallback maps
            'feature'           => $this->request->getPost('feature') ?? 0,
            'upcoming'          => $this->request->getPost('upcoming') ?? 0,
            'status'            => $this->request->getPost('status') ?? 0,

            // --- Save Tab 4 form values ---
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

        // Process file attachments updates
        $files = ['image', 'thumbnail', 'whitepaper_download'];
        foreach ($files as $f) {
            $fileObj = $this->request->getFile($f);
            if ($fileObj && $fileObj->isValid() && !$fileObj->hasMoved()) {
                $newName = $fileObj->getRandomName();
                $fileObj->move(ROOTPATH . 'public/uploads/', $newName);
                $dbData[$f] = 'uploads/' . $newName;
            }
        }

        $db->table('cyb_blogs')->where('id', $id)->update($dbData);

        return redirect()->to(base_url('admin/blogs'))->with('success', 'Webinar and Form variables saved successfully!');
    }
}