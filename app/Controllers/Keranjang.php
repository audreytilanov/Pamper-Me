<?php

namespace App\Controllers;

use App\Models\AnakModel;
use App\Models\ReservasiDetailModel;
use App\Models\ReservasiModel;

class Keranjang extends BaseController
{
    public function index()
    {
        $session = session();

        $model = new AnakModel();
        $anaks = $model->where('id_orangtua', $session->get('user_id_orangtua'))->first();
        if(!empty($anaks)){
            $model = new ReservasiModel();
            $modelDetail = new ReservasiDetailModel();
            $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'draft')->first();
            $dataNP = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'not paid')->first();
            // var_dump($data[0]["id_orangtua"]);
            if(!empty($data)){
                $detail = $modelDetail->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
                ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
                ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
                ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
                ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
                ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
                ->where('tb_reservasi_detail.id_reservasi', $data['id_reservasi'])->findAll();
                $res = [
                    'data' => $detail,
                    'list' => $detail
                ];
                // dd($detail);
                
                return view('pages/keranjang/keranjang', $res);
            }elseif(!empty($dataNP)){
                return redirect()->to('/user/checkout');
            }
            return redirect()->to('/user/lihat-antrian')->with('success', 'Data Berhasil Diperbaharui');
        }else{
            return redirect()->to('/user/data-anak')->with('success', 'Data Berhasil Diperbaharui');
        }
        

        
    }

    public function checkout($id){
        $session = session();
        $data = new ReservasiModel();

        $data->update($id, [
            'status'    => 'not paid',
        ]);

        return redirect()->to('/user/checkout')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function delete($id) {
        // dd($id);
        $postModel = new ReservasiDetailModel();
        $post = $postModel->find($id);
        $postModel->delete($id);

        return redirect()->to('/user/keranjang')->with('success', 'Data Berhasil Diperbaharui');

    }

}