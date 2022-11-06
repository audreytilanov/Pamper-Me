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
                    'no_whatsapp'    => $data['no_whatsapp'],
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
        $session = session();
        $model = new OrangtuaModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->first();
        // var_dump($data);
        // $data = $session->get('user_name');
        return view('pages/dashboard', $data);
    }

    public function dashboardEdit(){
        $session = session();
        $model = new OrangtuaModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->first();
        return view('pages/dashboardEdit', $data);
    }

    public function update($id){
        $data = new OrangtuaModel();
        $data->update($id, [
            'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
            'email'    => $this->request->getVar('email'),
            'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
        ]);

        return redirect()->to('/user/dashboard')->with('success', 'Data Berhasil Diperbaharui');
    }
}