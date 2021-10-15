<?php

namespace App\Controllers\Admin;

// Load Models
use App\Models\Admin_model;

use App\Controllers\BaseController;

class Dashboard extends BaseController{
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
        $model = new Admin_model();
        $data = [
            'title'     => 'Dashboard',
            'dashboard' => True,
            'user'      => $model->check_user(session()->get('admin_user')),
        ];
        return view('admin/dashboard', $data);
    }
}