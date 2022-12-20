<?php

namespace App\Controllers;

use App\Models\ReservasiDetailModel;
use App\Models\ReservasiModel;

class MyOrder extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new ReservasiModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'payment')->orderBy('id_reservasi', 'DESC')->findAll();

        $res = [
            'data' => $data,
        ];

        return view('pages/myOrder/myOrder', $res);
    }

    public function detailOrder($id)
    {
        $session = session();
        $model = new ReservasiDetailModel();
        $modelRes = new ReservasiModel();

        $dataRes = $modelRes->where('id_orangtua',$session->get('user_id_orangtua'))->where('id_reservasi', $id)->first();

        if(!empty($dataRes)){
            $data = $model->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi_detail.id_reservasi', $id)->findAll();

            $res = [
                'data' => $data,
                'dataRes' => $dataRes,
            ];

            // dd($data);

            return view('pages/myOrder/detailLunas', $res);

        }
        return redirect()->to('/user/my-order');
    }

    public function riwayatPemesanan()
    {
        $session = session();
        $modelRes = new ReservasiModel();

        $data = $modelRes->where('id_orangtua',$session->get('user_id_orangtua'))->findAll();

        $res = [
            'data' => $data
        ];

        // dd($data);

        return view('pages/myOrder/riwayatPemesanan', $res);
    }

}