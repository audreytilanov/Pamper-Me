<?php

namespace App\Controllers;

use DateTime;
use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\KategoriLayananModel;

class AdminReservasi extends BaseController
{
public function reservasiIndex(){
        $model = new ProdukModel();
        $data = $model->join('tb_kategori_layanan', 'tb_produk.id_kategori_layanan = tb_kategori_layanan.id_kategori_layanan', 'inner')
        ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang', 'inner')
        ->findAll();

        $modelKategori = new KategoriLayananModel();
        $dataKategori = $modelKategori->findAll();

        $modelCabang = new CabangModel();
        $dataCabang = $modelCabang->findAll();
        // var_dump($data[0]["id_orangtua"]);
        $page = "produk";
        $res = [
            'data' => $data,
            'dataKategori' => $dataKategori,
            'dataCabang' => $dataCabang,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        // dd($res);

        return view('pages/admin/produk/index', $res);
    }

    public function reservasiTambah(){
        helper(['form']);

        $model = new ProdukModel();
        $data = [
            'id_kategori_layanan'     => $this->request->getVar('id_kategori_layanan'),
            'nama_produk'     => $this->request->getVar('nama_produk'),
            'deskripsi_produk'    => $this->request->getVar('deskripsi_produk'),
            'durasi'    => $this->request->getVar('durasi'),
            'id_cabang'    => $this->request->getVar('id_cabang'),
            'harga'    => $this->request->getVar('harga'),
            'link_gambar'    => $this->request->getVar('link_gambar'),
            'status_aktif' => 1
        ];
        $model->save($data);
        return redirect()->to('/admin/produk/');
    }

    public function reservasiEdit($id){
        $model = new ProdukModel();
        $page = "produk";

        $modelKategori = new KategoriLayananModel();
        $dataKategori = $modelKategori->findAll();

        $modelCabang = new CabangModel();
        $dataCabang = $modelCabang->findAll();

        $data = $model->where('id_produk', $id)->first();
        $res = [
            'data' => $data,
            'dataKategori' => $dataKategori,
            'dataCabang' => $dataCabang,
            'page' => $page,
            // 'nama_anak' => '',
        ];
        return view('pages/admin/produk/edit', $res);
    }

    public function reservasiUpdate($id){
        helper(['form']);
        $datas = new ProdukModel();
        $datas->update($id, [
            'id_kategori_layanan'     => $this->request->getVar('id_kategori_layanan'),
            'nama_produk'     => $this->request->getVar('nama_produk'),
            'deskripsi_produk'    => $this->request->getVar('deskripsi_produk'),
            'durasi'    => $this->request->getVar('durasi'),
            'id_cabang'    => $this->request->getVar('id_cabang'),
            'harga'    => $this->request->getVar('harga'),
            'link_gambar'    => $this->request->getVar('link_gambar'),
            'status_aktif' => $this->request->getVar('status_aktif')
        ]);

        return redirect()->to('/admin/produk/')->with('success', 'Data Berhasil Diperbaharui');
    }
}