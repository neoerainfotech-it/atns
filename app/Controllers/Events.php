<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Events extends BaseController
{
    /**
     * Render the Frontend Webinar/Event Detail Landing Page
     * URL Route: atnatechnologies.com/event/[url-slug]
     */
    public function detail($slug)
    {
        $db = \Config\Database::connect();

        // 1. Fetch the primary webinar record from 'cyb_blogs' table matching the unique URL slug
        $detail = $db->table('cyb_blogs')
                     ->where('slug', $slug)
                     ->where('status', 1)
                     ->get()
                     ->getRow();

        // Fallback: If no slug matches, attempt to search by ID just in case an old link is hit
        if (!$detail && is_numeric($slug)) {
            $detail = $db->table('cyb_blogs')
                         ->where('id', $slug)
                         ->where('status', 1)
                         ->get()
                         ->getRow();
        }

        // If no record exists matching the parameters, throw a native CodeIgniter 404 Exception
        if (!$detail) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("The requested webinar or event could not be found.");
        }

        // 2. Fetch up to 3 related events for the bottom layout carousel matrix row component
        $relatedPost = $db->table('cyb_blogs')
                          ->where('type', $detail->type)
                          ->where('id !=', $detail->id)
                          ->where('status', 1)
                          ->orderBy('id', 'DESC')
                          ->limit(3)
                          ->get()
                          ->getResult();

        // 3. Compile datasets into the exact variables expected by your frontend layout
        $data = [
            'detail'      => $detail,
            'relatedPost' => $relatedPost,
            'config_logo' => 'uploads/logo/logo.png' // Global fallback logo path if an event thumbnail is missing
        ];

        // Safely loads and renders your view: app/Views/frontend/event_detail.php
        return view('frontend/event_detail', $data);
    }
}