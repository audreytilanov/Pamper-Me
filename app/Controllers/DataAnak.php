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
            $data = [
                'id_orangtua'     => $session->get('user_id_orangtua'),
                'nama_anak'     => $this->request->getVar('nama_anak'),
                'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
                'status_aktif' => 1,
                'link_barcode' => hash ( "sha256", uniqid().$session->get('user_id_orangtua'). $this->request->getVar('nama_anak'))
            ];
            $model->save($data);
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
        $data->update($id, [
            'nama_anak'     => $this->request->getVar('nama_anak'),
            'tanggal_lahir'    => $this->request->getVar('tanggal_lahir'),
            'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
        ]);

        return redirect()->to('/user/data-anak')->with('success', 'Data Berhasil Diperbaharui');
    }

}