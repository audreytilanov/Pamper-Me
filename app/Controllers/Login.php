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
        if(!empty($data)){
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
                    return redirect()->to('/');
                }else{
                    $session->setFlashdata('msg', 'Password yang dimasukkan salah!');
                    return redirect()->to('/login');
                }
            }elseif($data['status_pendaftaran'] == 0){
                return view('register/verifikasi');
            }
            else{
                $session->setFlashdata('msg', 'Email Tidak Ditemukan');
                return redirect()->to('/login');
            }
        }
        else{
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
        $detailData = $data->find($id);
        // dd($this->request->getFile('link_foto'));
        if(!empty($this->request->getFile('link_foto'))){
            if(!empty($detailData['link_foto'])){
                unlink("images/".$detailData['link_foto']);
            }
            $link_foto = $this->request->getFile('link_foto');
            if ($link_foto->isValid() && ! $link_foto->hasMoved()) {
                // Get file name and extension
                $name = $link_foto->getName();
                $ext = $link_foto->getClientExtension();
 
                // Get random file name
                $newName = $link_foto->getRandomName(); 
 
                // Store file in public/uploads/ folder
                $link_foto->move('images', $newName);
 
                // File path to display preview
                // $filepath = base_url()."/uploads/".$newName;
            }
            $data->update($id, [
                'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
                'email'    => $this->request->getVar('email'),
                'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'link_foto' => $newName

            ]);
        }else{
            $data->update($id, [
                'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
                'email'    => $this->request->getVar('email'),
                'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ]);
    
        }

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

    public function verifikasiWhatsapp($id){
        $modelUpdate = new OrangtuaModel();
        $data = $modelUpdate->where('id_orangtua', $id)->first();

        $modelUpdate->update($data['id_reg'], [
            'status_pendaftaran'     => 1,
        ]);

        return redirect()->to('/login')->with('success', 'AKun Berhasil Diverifikasi');;
    }
}