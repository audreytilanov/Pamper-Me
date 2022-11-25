<?php

namespace App\Controllers;

use Aws\S3\S3Client;
use CodeIgniter\Files\File;
use App\Models\OrangtuaModel;
use Aws\S3\Exception\S3Exception;
use PDO;

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
        if($data['status_pendaftaran'] == 1){
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
        }elseif($data['status_pendaftaran'] == 0){
            $modelUpdate = new OrangtuaModel();

            $userkey = '85fcf56b4387';
            $passkey = '28d6e0822ba452db2096d1f5';
            $telepon = $data['no_whatsapp'];
            $message = 'Hi John Doe, have a nice day.';
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
            dd($results);
            if(!empty($results['status'])){
                $modelUpdate->update($data['id_orangtua'], [
                    'status_pendaftaran'     => $results['status'],
                ]);
            }
            curl_close($curlHandle);
            return redirect()->to('/user/dashboard');
        }else{
            $session->setFlashdata('msg', 'Email Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function dashboard(){
        $session = session();
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => 'uploaded[userfile]'
                . '|is_image[userfile]'
                . '|mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[userfile,1000]'
                . '|max_dims[userfile,1024,768]',
            ],
        ];
        // if (! $this->validate($validationRule)) {
        //     $data = ['errors' => $this->validator->getErrors()];

        //     return view('upload_form', $data);
        // }

        // $img = $this->request->getFile('userfile');
        // if (! $img->hasMoved()) {
        //     $filepath = WRITEPATH . 'uploads/' . $img->store();

        //     $data = ['uploaded_flleinfo' => new File($filepath)];

        //     // Inisiasi helper S3
        //     $s3Client = new S3Client([
        //         'version' => 'latest',
        //         'region' => '',
        //         'url' => '',
        //         'use_path_style_endpoint' => true,
        //         'endpoint' => 'https://s3.jagoanstorage.com',
        //         'credentials' => [
        //             'key' => '{{access_key}}',
        //             'secret' => '{{secret_key}}'
        //         ]
        //     ]);

        //     $bucket = '{{nama_bucket_yang_kamu_buat}}';
        //     $key = basename($filepath);

        //     try {
        //         // Proses upload ke object storage dengan permission file public
        //         $result = $s3Client->upload($bucket,$key,fopen($filepath, 'r'),'public-read');
        //         $data = ['result' => $result->toArray()];
        //         return view('upload_success', $data);
        //     } catch (S3Exception $e) {
        //         $data = ['errors' => $e->getMessage()];
        //     }

        // }
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

    public function logout(){
        $session = session();
        // $ses_data = [
        //     'user_id'       => $data['id_reg'],
        //     'user_id_orangtua'       => $data['id_orangtua'],
        //     'user_name'     => $data['nama_orangtua'],
        //     'user_email'    => $data['email'],
        //     'no_whatsapp'    => $data['no_whatsapp'],
        //     'status_pendaftaran' => $data['status_pendaftaran'],
        //     'logged_in'     => TRUE
        // ];
        $session->remove('user_id');
		$session->remove('user_id_orangtua');
		$session->remove('user_name');
		$session->remove('user_email');
		$session->remove('no_whatsapp');
		$session->remove('status_pendaftaran');
		$session->remove('logged_in');
        $session->stop();
        return redirect()->to('/login');
    }
}