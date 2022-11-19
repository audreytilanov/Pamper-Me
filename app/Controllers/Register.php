<?php

namespace App\Controllers;

use App\Models\OrangtuaModel;

class Register extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('register/register', $data);
    }

    public function verifikasi()
    {
        return view('register/verifikasi');
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            // 'id_orangtua',
            'nama_orangtua' => 'required|min_length[3]',
            'email'         => 'required|min_length[6]|valid_email|is_unique[tb_orangtua.email]',
            'no_whatsapp'   => 'required|min_length[8]|max_length[14]|is_unique[tb_orangtua.no_whatsapp]',
            'password'      => 'required|min_length[6]'
        ];
         
        // if($this->validate($rules)){
            $model = new OrangtuaModel();
            $data = [
                'id_orangtua' => password_hash($this->request->getVar('nama_orangtua'), PASSWORD_DEFAULT),
                'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
                'email'    => $this->request->getVar('email'),
                'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status_aktif' => 1
            ];
            $model->save($data);
            return redirect()->to('/login');
        // }else{
            $data['validation'] = $this->validator;
            return view('register/register', $data);
        // }
    }
}