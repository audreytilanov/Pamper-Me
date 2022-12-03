<?php

namespace App\Controllers;

use App\Models\AnakModel;
use DateTime;
use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\KategoriLayananModel;
use App\Models\OrangtuaModel;
use App\Models\ReservasiModel;

class AdminReservasi extends BaseController
{
    public function reservasiIndex(){
        $model = new ReservasiModel();
        $data = $model->findAll();

        $page = "reservasi";
        $res = [
            'data' => $data,
            'page' => $page,
        ];
        // dd($res);

        return view('pages/admin/reservasi/index', $res);
    }

    public function reservasiAddIndex(){
        $modelKategori = new KategoriLayananModel();
        $dataKategori = $modelKategori->findAll();

        $modelCabang = new CabangModel();
        $dataCabang = $modelCabang->findAll();

        $modelProduk = new ProdukModel();
        $dataProduk = $modelProduk->findAll();

        $modelOrtu = new OrangtuaModel();
        $dataOrtu = $modelOrtu->findAll();

        $page = "reservasi";
        $res = [
            'page' => $page,
            'dataKategori' => $dataKategori,
            'dataCabang' => $dataCabang,
            'dataOrtu' => $dataOrtu,
            'dataProduk' => $dataProduk,
        ];
        return view('pages/admin/reservasi/add', $res);
        
    }

    public function reservasiCariOrtu(){
        helper(['form']);

        $modelOrtu = new OrangtuaModel();
        $dataOrtu = $modelOrtu->where('id_reg', $this->request->getVar('id_reg'))->first();

        $modelAnak = new AnakModel();
        $dataAnak = $modelAnak->where('id_orangtua', $dataOrtu['id_orangtua'])->first();

        if(empty($dataAnak)){
            return redirect()->to('/admin/orangtua/');
        }

        $model = new ReservasiModel();
        $data = [
            'tanggal' => date('Y-m-d H:i:s'),
            'id_orangtua' => $dataOrtu['id_orangtua'],
            'metode_transaksi' => "offline",
        ];

        $model->save($data);

        $lastID = $model->insertID();
        return redirect()->to('/admin/reservasi/cari/'. $lastID);
    }

    public function reservasiLast($id){
        // $modelKategori = new KategoriLayananModel();
        // $dataKategori = $modelKategori->findAll();

        // $modelCabang = new CabangModel();
        // $dataCabang = $modelCabang->findAll();

        $modelReservasi = new ReservasiModel();
        $dataReservasi = $modelReservasi->where('id_reservasi', $id)->first();

        $modelAnak = new AnakModel();
        $dataAnak = $modelAnak->where('id_orangtua', $dataReservasi['id_orangtua'])->findAll();

        $modelOrtu = new OrangtuaModel();
        $dataOrtu = $modelOrtu->where('id_orangtua', $dataReservasi['id_orangtua'])->first();

        $page = "reservasi";
        $res = [
            'page' => $page,
            // 'dataKategori' => $dataKategori,
            // 'dataCabang' => $dataCabang,
            'dataAnak' => $dataAnak,
            'dataOrtu' => $dataOrtu,
        ];
        return view('pages/admin/reservasi/add', $res);
        
    }

    public function produkTambah(){
        $produk = $this->request->getVar('id_produk');
        $produkModel = new ProdukModel();
        $produkData = $produkModel->find($produk);
        dd($produkData);
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