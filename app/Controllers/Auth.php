<?php

namespace App\Controllers;

// Load Models
use App\Models\Admin_model;

class Auth extends BaseController{
    public function __construct(){
        $this->form_validation = \Config\Services::validation();
    }

    public function login(){
        $method = $this->request->getMethod(true);
        if($method == "POST"){
            $data = [
                'username' => filter_var($this->request->getVar('username'), FILTER_SANITIZE_EMAIL),
                'password' => filter_var($this->request->getVar('password'), FILTER_SANITIZE_STRING)
            ];

            if($this->form_validation->run($data, 'login_admin')){
                $model = new Admin_model();
                $check_user = $model->check_user($data['username']);
                if($check_user){
                    if(password_verify($data['password'], $check_user['password'])){
                        session()->set('admin_user', $check_user['username']);
                        return redirect()->to(base_url('admin/dashboard'));
                    }else{
                        session()->setFlashdata('error', 'Password salah');
                        return redirect()->to('admin/login');
                    }
                }else{
                    session()->setFlashdata('error', 'Username tidak ditemukan');
                    return redirect()->to('admin/login');
                }
            }else{
                session()->setFlashdata('errors', $this->form_validation->getErrors());
                return redirect()->to(base_url('admin/login'));
            }
        } else {
            return view('admin/login');
        }        
    }
}