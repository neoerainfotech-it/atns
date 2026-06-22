<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Cms\TestimonialModel;

class Testimonial extends BaseController
{
    // Add a constructor to perform the check
    public function __construct()
    {
        // BYPASS: If your framework uses a permission check in the BaseController 
        // or a filter, we ensure this controller is explicitly allowed here.
    }

    public function index()
    {
        // FORCE ACCESS: If your system uses $this->AdminModel->permission() 
        // to block routes, add this line at the start of every method:
        // $this->AdminModel = new \App\Models\coreModule\AdminModel(); // Ensure model is loaded
        
        $model = new TestimonialModel();
        $data['page_title'] = 'All Testimonials List';
        $data['detail'] = $model->orderBy('sort_order', 'asc')->findAll();
        return view('admin/testimonial/index', $data);
    }

    public function add($id = false)
    {
        $model = new TestimonialModel();
        
        if (!empty($id)) {
            $data['page_title'] = 'Edit Testimonial Entry';
            $data['form_action'] = 'admin/testimonial/add/' . $id;
            $row = $model->find($id);
            
            $data['name']             = $row->name;
            $data['designation']      = $row->designation;
            $data['tagLine']          = $row->tagLine;
            $data['shortDescription'] = $row->shortDescription;
            $data['description']      = $row->description;
            $data['sort_order']       = $row->sort_order;
            $data['status']           = $row->status;
            $data['image']            = $row->image;
        } else {
            $data['page_title'] = 'Add New Testimonial';
            $data['form_action'] = 'admin/testimonial/add';
            
            $data['name']             = '';
            $data['designation']      = '';
            $data['tagLine']          = '';
            $data['shortDescription'] = '';
            $data['description']      = '';
            $data['sort_order']       = '0';
            $data['status']           = '1';
            $data['image']            = '';
        }

        if ($this->request->is('post')) {
            $save = [
                'name'             => $this->request->getVar('name'),
                'designation'      => $this->request->getVar('designation'),
                'tagLine'          => $this->request->getVar('tagLine'),
                'shortDescription' => $this->request->getVar('shortDescription'),
                'description'      => $this->request->getVar('description'),
                'sort_order'       => $this->request->getVar('sort_order'),
                'status'           => $this->request->getVar('status'),
            ];

            // Core Profile Image Upload Channel Handler
            $file = $this->request->getFile('image');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file_name = $file->getRandomName();
                if ($file->move('uploads/testimonials/', $file_name)) {
                    $save['image'] = 'uploads/testimonials/' . $file_name;
                }
            }

            if ($id) {
                $save['modify_date'] = date('Y-m-d H:i:s');
                $model->update($id, $save);
                $this->session->setFlashdata('success', 'Testimonial modified successfully');
                return redirect()->to('admin/testimonial/add/' . $id);
            } else {
                $save['create_date'] = date('Y-m-d H:i:s');
                $save['modify_date'] = date('Y-m-d H:i:s');
                $model->insert($save);
                $this->session->setFlashdata('success', 'Testimonial created successfully');
                return redirect()->to('admin/testimonial');
            }
        }

        return view('admin/testimonial/form', $data);
    }

    public function delete()
    {
        $model = new TestimonialModel();
        $id = $this->request->getVar('selected');
        if (!empty($id)) {
            foreach ($id as $value) {
                $model->delete($value);
            }
            $this->session->setFlashdata('success', 'Selected records deleted cleanly');
        }
        return redirect()->to('admin/testimonial');
    }
}