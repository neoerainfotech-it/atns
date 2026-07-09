<?php

namespace App\Controllers\admin; // Clean lowercase namespace setup

use App\Controllers\BaseController;

class WebinarController extends BaseController
{
    /**
     * STEP 1: View All Created Webinar Events (Main Landing Dashboard Panel)
     * Displays a clean summary row listing of events with total lead counts.
     */
    public function events()
    {
        $db = \Config\Database::connect();
        
        // Fetch only records from blogs table that are classified as webinar events
        $events = $db->table('cyb_blogs')
                     ->where('type', 'webinar')
                     ->orderBy('id', 'DESC')
                     ->get()
                     ->getResult();

        // Count how many total registrations exist for each event dynamically
        foreach ($events as $event) {
            $event->total_leads = $db->table('cyb_webinar_registration')
                                     ->where('event_id', $event->id)
                                     ->countAllResults();
        }

        $data = [
            'page_title' => 'Webinar Management Dashboard',
            'events'     => $events
        ];

        return view('admin/module/webinar_events_list', $data);
    }

    /**
     * STEP 2: View Registration Leads for ONE Specific Event Only (Drilled down list)
     * Triggered natively when clicking "View Registrations" on an event row.
     */
    public function registrations($eventId = null)
    {
        if (empty($eventId)) {
            return redirect()->to(base_url('admin/webinar-events'))->with('error', 'Please select a valid event context.');
        }

        $db = \Config\Database::connect();
        
        // Fetch the event details to display its title dynamically in the layout header
        $eventInfo = $db->table('cyb_blogs')->where('id', $eventId)->get()->getRow();
        if (!$eventInfo) {
            return redirect()->to(base_url('admin/webinar-events'))->with('error', 'Target event execution context not found.');
        }

        $builder = $db->table('cyb_webinar_registration')->where('event_id', $eventId); 

        // Handle optional attendee search name query inside this isolated event page layout
        $searchName = $this->request->getGet('name');
        if (!empty($searchName)) {
            $builder->like('name', $searchName);
        }

        // Framework Manual Pagination Configuration Engine
        $perPage = 10; 
        $page = $this->request->getGet('page') ? (int)$this->request->getGet('page') : 1;
        $totalBuilder = clone $builder;
        $total = $totalBuilder->countAllResults(false);
        $offset = ($page - 1) * $perPage;
        
        $detail = $builder->limit($perPage, $offset)->orderBy('id', 'DESC')->get()->getResult();
        $pager = \Config\Services::pager();

        $data = [
            'page_title'  => 'Leads for: ' . $eventInfo->title,
            'event_id'    => $eventId,
            'detail'      => $detail,
            'pager'       => $pager,
            'page'        => $page,
            'perPage'     => $perPage,
            'total'       => $total,
            'offset'      => $offset,
            'pages'       => ceil($total / $perPage)
        ];

        return view('admin/module/webinar_registrations', $data);
    }

    /**
     * STEP 3: Export Function Isolated and Grouped Safely by Event Context 
     */
    public function export()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('cyb_webinar_registration');

        // Filter output context based on current event page
        $eventId = $this->request->getPost('event_id');
        if (!empty($eventId)) {
            $builder->where('event_id', $eventId);
        }

        // Apply filters if checkboxes are checked
        $selectedIds = $this->request->getPost('selected');
        if (!empty($selectedIds)) {
            $builder->whereIn('id', $selectedIds);
        }

        $records = $builder->orderBy('id', 'DESC')->get()->getResult();
        if (empty($records)) {
            return redirect()->back()->with('error', 'No registration entries available for export.');
        }

        $fileName = "Webinar_Leads_Export_" . date('Ymd_His') . ".csv";

        // Stream binary download headers out to user browser natively
        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public");
        
        $output = fopen("php://output", "w");
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF)); // Excel UTF-8 BOM Lang Fix

        // Output column row array mapping
        fputcsv($output, ['ID', 'Event Title', 'Attendee Name', 'Email', 'Phone', 'Company', 'Designation', 'ERP System', 'Registration Date']);

        foreach ($records as $row) {
            fputcsv($output, [
                $row->id,
                $row->event_title ?? 'Unified Webinar',
                $row->name,
                $row->email,
                $row->phone ?? '',
                $row->company_name ?? '',
                $row->title ?? '',
                $row->erp_system ?? '',
                $row->create_date ?? ''
            ]);
        }

        fclose($output);
        exit; // Safe termination block
    }

    /**
     * 4. Edit Webinar Event Page Content & Form Configurations (CMS Tab Editor)
     */
    public function edit_webinar($id)
    {
        $db = \Config\Database::connect();
        
        $webinar = $db->table('cyb_blogs')->where('id', $id)->get()->getRow();

        if (!$webinar) {
            return redirect()->to(base_url('admin/blogs'))->with('error', 'Webinar Event item not found!');
        }

        $blogCategoryList = $db->table('cyb_about_heading')->get()->getResult(); 

        $data = [
            'page_title'       => 'Edit Webinar Page: ' . ($webinar->title ?? 'Event'),
            'form_action'      => base_url('admin/update_webinar/' . $id),
            
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
            
            'product'          => $webinar->product ?? '',
            'service'          => $webinar->service ?? '',
            'industry'         => $webinar->industry ?? '',
            'challenge'        => $webinar->challenge ?? '',
            'solution'         => $webinar->solution ?? '',
            'benefit'          => $webinar->benefit ?? '',

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

            'blogCategoryList' => $blogCategoryList, 
            'typeList'         => ['webinar' => 'Webinar Event', 'blog' => 'Standard Blog Post'],
            'productList'      => [],
            'serviceList'      => [],
            'industryList'     => []
        ];

        return view('admin/module/webinar_registrations_edit', $data);
    }

    /**
     * 5. Handle the Save/POST request to update the record in the database
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

            'feature'           => $this->request->getPost('feature') ?? 0,
            'upcoming'          => $this->request->getPost('upcoming') ?? 0,
            'status'            => $this->request->getPost('status') ?? 0,

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