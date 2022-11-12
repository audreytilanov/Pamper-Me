<?php

namespace App\Controllers;

use App\Models\AnakModel;

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
        // dd($res);

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
                'status_aktif' => 1
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