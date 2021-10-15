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
}