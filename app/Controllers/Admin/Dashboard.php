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
        $model = new Admin_model();
        $data = [
            'title' => 'Dashboard',
            'user'  => $model->check_user(session()->get('username')),
        ];
        return view('admin/dashboard', $data);
    }
}