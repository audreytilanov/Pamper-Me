<?php

namespace App\Controllers;

use App\Models\AnakModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class DataAnak extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new AnakModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->findAll();
        // var_dump($data[0]["id_orangtua"]);
       
        $res = [
            'data' => $data
            // 'nama_anak' => '',
        ];

        return view('pages/dataAnak', $res);
    }
    
    public function tambah()
    {
        return view('pages/createDataAnak');
    }

    public function save(){
        helper(['form']);
        $session = session();
         
        // if($this->validate($rules)){
        // dd($this->request->getVar('tanggal_lahir'));

        $model = new AnakModel();
        // dd($this->request->getFile('link_foto'));
        if(!empty($this->request->getFile('link_foto'))){
            $link_foto = $this->request->getFile('link_foto');
            if ($link_foto->isValid() && ! $link_foto->hasMoved()) {
                // Get file name and extension
                $name = $link_foto->getName();
                $ext = $link_foto->getClientExtension();
    
                // Get random file name
                $newName = $link_foto->getRandomName(); 
    
                // Store file in public/uploads/ folder
                $link_foto->move('/uploads', $newName);
    
                // File path to display preview
                // $filepath = base_url()."/uploads/".$newName;
            }
    
            $data = [
                'id_orangtua'     => $session->get('user_id_orangtua'),
                'nama_anak'     => $this->request->getVar('nama_anak'),
                'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
                'status_aktif' => 1,
                'link_foto' =>  $newName,
                'link_barcode' => hash ( "sha256", uniqid().$session->get('user_id_orangtua'). $this->request->getVar('nama_anak'))
            ];
            $model->save($data);
        }else{
            $data = [
                'id_orangtua'     => $session->get('user_id_orangtua'),
                'nama_anak'     => $this->request->getVar('nama_anak'),
                'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
                'status_aktif' => 1,
                'link_barcode' => hash ( "sha256", uniqid().$session->get('user_id_orangtua'). $this->request->getVar('nama_anak'))
            ];
            $model->save($data);
        }
        
        return redirect()->to('/user/data-anak');
        // }
    }

    public function edit($id)
    {
        $model = new AnakModel();
        $data = $model->where('id_anak', $id)->first();
        return view('pages/editDataAnak', $data);
    }

    public function update($id){
        $data = new AnakModel();
        $detailData = $data->find($id);
        if(!empty($this->request->getFile('link_foto'))){
            if(!empty($detailData['link_foto'])){
                unlink("../public/uploads/".$detailData['link_foto']);
            }
            $link_foto = $this->request->getFile('link_foto');
            if ($link_foto->isValid() && ! $link_foto->hasMoved()) {
                // Get file name and extension
                $name = $link_foto->getName();
                $ext = $link_foto->getClientExtension();
 
                // Get random file name
                $newName = $link_foto->getRandomName(); 
 
                // Store file in public/uploads/ folder
                $link_foto->move('../public/uploads', $newName);
 
                // File path to display preview
                // $filepath = base_url()."/uploads/".$newName;
            }
            $data->update($id, [
                'nama_anak'     => $this->request->getVar('nama_anak'),
                'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
                'link_foto' =>  $newName,

            ]);
        }else{
            $data->update($id, [
                'nama_anak'     => $this->request->getVar('nama_anak'),
                'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
            ]);
    
        }
        
        return redirect()->to('/user/data-anak')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function delete($id){
        helper(['form']);
        $postModel = new AnakModel();
        $detailData = $postModel->find($id);
        unlink("../public/uploads/".$detailData['link_foto']);

        $post = $postModel->find($id);
        $postModel->delete($id);

        return redirect()->to('/user/data-anak')->with('success', 'Data Berhasil Dihapus');
    }

}