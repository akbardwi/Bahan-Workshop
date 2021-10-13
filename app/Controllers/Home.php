<?php

namespace App\Controllers;

// Load Models
use App\Models\Subscription_model;

class Home extends BaseController{
    public function __construct(){
        $this->form_validation = \Config\Services::validation();
    }

    public function index(){
        return view('index');
    }

    public function subscribe(){
        $data = [
            'email' => filter_var($this->request->getVar('email'), FILTER_SANITIZE_EMAIL)
        ];

        if($this->form_validation->run($data, 'subscribe')){
            $model = new Subscription_model();
            $check_email = $model->check_email($data['email']);
            if($check_email){
                session()->setFlashdata('error', 'Email sudah terdaftar');
                return redirect()->to(base_url('/'));
            }else{
                $model->insert($data);
                session()->setFlashdata('success', 'Terima kasih telah berlangganan');
                return redirect()->to(base_url('/'));
            }
        }else{
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            return redirect()->to(base_url('/'));
        }
    }
}
