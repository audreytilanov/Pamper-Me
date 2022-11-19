<?php

namespace App\Controllers;

use App\Models\ReservasiDetailModel;
use App\Models\ReservasiModel;

class Keranjang extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new ReservasiModel();
        $modelDetail = new ReservasiDetailModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'draft')->first();
        // var_dump($data[0]["id_orangtua"]);
        if(!empty($data)){
            $detail = $modelDetail->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->where('tb_reservasi_detail.id_reservasi', $data['id_reservasi'])->findAll();
            $res = [
                'data' => $detail,
                'list' => $detail
            ];
            
    
            return view('pages/keranjang/keranjang', $res);
        }

        return redirect()->to('/user/checkout')->with('success', 'Data Berhasil Diperbaharui');
        
    }

    public function checkout($id){
        $session = session();
        $data = new ReservasiModel();

        $data->update($id, [
            'status'    => 'not paid',
        ]);

        return redirect()->to('/user/checkout')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function delete($id = null) {
        $postModel = new ReservasiDetailModel();
        $post = $postModel->find($id);
        $postModel->delete($id);
        unlink('uploads/avatar/' . $post['image']);
        return $this->response->setJSON([
            'error' => false,
            'message' => 'Successfully deleted post!'
        ]);
    }

}