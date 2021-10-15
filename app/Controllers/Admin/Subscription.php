<?php

namespace App\Controllers\Admin;

// Load Models
use App\Models\Admin_model;
use App\Models\Subscription_model;

use App\Controllers\BaseController;

class Subscription extends BaseController{
    public function __construct(){
        $this->form_validation = \Config\Services::validation();
    }

    public function index(){
        // Proteksi
        if(session()->get('admin_user') == "") {
            session()->setFlashdata('error', 'Anda belum login');
            return redirect()->to(base_url('admin/login'));
        }
        // End proteksi

        $modelAdmin = new Admin_model();
        $modelSubscription = new Subscription_model();
        $data = [
            'title'         => 'Subsription List',
            'subscription'  => TRUE,
            'list_subsribe' => $modelSubscription->listing(),
            'user'          => $modelAdmin->check_user(session()->get('admin_user')),
        ];
        return view('admin/subscription/index', $data);
    }

    public function edit($id){
        // Proteksi
        if(session()->get('admin_user') == "") {
            session()->setFlashdata('error', 'Anda belum login');
            return redirect()->to(base_url('admin/login'));
        }
        // End proteksi

        $modelAdmin = new Admin_model();
        $modelSubscription = new Subscription_model();

        $method = $this->request->getMethod();
        if($method == "post"){
            $data = [
                'email' => filter_var($this->request->getVar('email'), FILTER_SANITIZE_EMAIL),
            ];

            if($this->form_validation->run($data, 'subscribe')){
                $modelSubscription->update($id, $data);
                session()->setFlashdata('success', 'Email Updated');
                return redirect()->to(base_url('admin/subscription'));
            }else{
                session()->setFlashdata('errors', $this->form_validation->getErrors());
                return redirect()->to(base_url('admin/subscription/edit/'.$id));
            }
        } else {
            $data = [
                'title'         => 'Edit Subsription List',
                'subscription'  => TRUE,
                'list_subsribe' => $modelSubscription->listing(),
                'user'          => $modelAdmin->check_user(session()->get('admin_user')),
                'subsriber'      => $modelSubscription->detail($id),
            ];
            return view('admin/subscription/edit', $data);
        }
    }

    public function delete($id){
        // Proteksi
        if(session()->get('admin_user') == "") {
            session()->setFlashdata('error', 'Anda belum login');
            return redirect()->to(base_url('admin/login'));
        }
        // End proteksi

        $modelSubscription = new Subscription_model();
        $modelSubscription->delete($id);
        session()->setFlashdata('success', 'Email Deleted');
        return redirect()->to(base_url('admin/subscription'));
    }
}