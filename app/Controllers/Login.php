<?php

namespace App\Controllers;

use App\Models\OrangtuaModel;

class Login extends BaseController
{
    public function index()
    {
        return view('register/login');
    }

    public function authLogin()
    {
        $session = session();
        $model = new OrangtuaModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['id_reg'],
                    'user_id_orangtua'       => $data['id_orangtua'],
                    'user_name'     => $data['nama_orangtua'],
                    'user_email'    => $data['email'],
                    'status_pendaftaran' => $data['status_pendaftaran'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/user/dashboard');
            }else{
                $session->setFlashdata('msg', 'Password yang dimasukkan salah!');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Email Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function dashboard(){
        return view('pages/dashboard');
    }
}