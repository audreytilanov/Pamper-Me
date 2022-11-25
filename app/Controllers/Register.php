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
                'id_orangtua' => hash ( "sha256", $this->request->getVar('nama_orangtua') ),
                'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
                'email'    => $this->request->getVar('email'),
                'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status_aktif' => 1
            ];
            $model->save($data);
            $userkey = '85fcf56b4387';
            $passkey = '28d6e0822ba452db2096d1f5';
            $telepon = $data['no_whatsapp'];
            $message = 'Terima kasih telah mendaftar di Pamper Me. Silahkann klik link berikut untuk memverifikasi akun anda : https://baligroupbooking.com/login/verifikasi/'. $data['id_orangtua'];
            $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
            $curlHandle = curl_init();
            curl_setopt($curlHandle, CURLOPT_URL, $url);
            curl_setopt($curlHandle, CURLOPT_HEADER, 0);
            curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
            curl_setopt($curlHandle, CURLOPT_POST, 1);
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
                'userkey' => $userkey,
                'passkey' => $passkey,
                'to' => $telepon,
                'message' => $message
            ));
            $results = json_decode(curl_exec($curlHandle), true);
            curl_close($curlHandle);
            $data['validation'] = $this->validator;
            return view('register/verifikasi', $data);
    }
}