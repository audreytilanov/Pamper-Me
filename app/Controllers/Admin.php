<?php

namespace App\Controllers;

use DateTime;
use App\Models\AnakModel;
use App\Models\CabangModel;
use App\Models\ProdukModel;
use App\Models\OrangtuaModel;
use App\Models\JadwalProdukModel;
use App\Models\KategoriLayananModel;

class Admin extends BaseController
{
    // Masterdata Orangtua
    public function orangtuaIndex()
    {
        $model = new OrangtuaModel();
        $data = $model->findAll();
        // var_dump($data[0]["id_orangtua"]);
        $page = "orangtua";
        $res = [
            'data' => $data,
            'page' => $page,

            // 'nama_anak' => '',
        ];
        // dd($res);

        return view('pages/admin/orangtua/index', $res);
    }

    public function orangtuaTambah()
    {
        helper(['form']);
         
        // if($this->validate($rules)){
            $model = new OrangtuaModel();
            $data = [
                'id_orangtua' => hash ( "sha256", $this->request->getVar('nama_orangtua') ),
                'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
                'email'    => $this->request->getVar('email'),
                'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status_aktif' => 1
            ];
            $model->save($data);
            return redirect()->to('/admin/orangtua')->with('success', 'Data Berhasil Ditambah');
        // }else{
        // }
    }

    public function orangtuaEdit($id){
        $page = "orangtua";
        $model = new OrangtuaModel();
        $data = $model->where('id_reg', $id)->first();
        $data['page'] = $page;
        return view('pages/admin/orangtua/edit', $data);
    }

    public function orangtuaUpdate($id){
        $data = new OrangtuaModel();
        $data->update($id, [
            'nama_orangtua'     => $this->request->getVar('nama_orangtua'),
            'email'    => $this->request->getVar('email'),
            'no_whatsapp'    => $this->request->getVar('no_whatsapp'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status_aktif' => $this->request->getVar('status_aktif')
        ]);

        return redirect()->to('/admin/orangtua')->with('success', 'Data Berhasil Diperbaharui');
    }


    // Master Data Anak
    public function anakIndex($id)
    {
        $page = "orangtua";
        $model = new OrangtuaModel();
        $modelAnak = new AnakModel();

        $data = $model->where('id_reg', $id)->first();
        $anak = $modelAnak->where('id_orangtua', $data['id_orangtua'])->findAll();

        
        $res = [
            'ortu' => $data,
            'anak' => $anak,
            'page' => $page
        ];

        return view('pages/admin/anak/index', $res);
    }

    public function anakTambah(){
        helper(['form']);

        $ortuModel = new OrangtuaModel();
        $ortu = $ortuModel->where('id_orangtua', $this->request->getVar('id_orangtua'))->first();
         
        // if($this->validate($rules)){
        // dd($this->request->getVar('tanggal_lahir'));

        $model = new AnakModel();
        $data = [
            'id_orangtua'     => $this->request->getVar('id_orangtua'),
            'nama_anak'     => $this->request->getVar('nama_anak'),
            'tanggal_lahir'    => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
            'status_aktif' => 1
        ];
        $model->save($data);
        return redirect()->to('/admin/anak/'.$ortu['id_reg']);
    }

    public function anakEdit($id){
        $model = new AnakModel();
        $page = "orangtua";
        $data = $model->where('id_anak', $id)->first();
        $data['page'] = $page;
        return view('pages/admin/anak/edit', $data);
    }

    public function anakUpdate($id){
        helper(['form']);
        $session = session();

        $ortuModel = new OrangtuaModel();
        $ortu = $ortuModel->where('id_orangtua', $this->request->getVar('id_orangtua'))->first();

        $data = new AnakModel();
        $data->update($id, [
            'nama_anak'     => $this->request->getVar('nama_anak'),
            'tanggal_lahir'    => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
            'status_aktif' => $this->request->getVar('status_aktif')
        ]);

        return redirect()->to('/admin/anak/'.$ortu['id_reg'])->with('success', 'Data Berhasil Diperbaharui');
    }

    // Master Data Jadwal
    public function jadwalIndex()
    {
        $page = "jadwal";
        $model = new ProdukModel();
        $produk = $model->join('tb_cabang', 'tb_produk.id_cabang = tb_cabang.id_cabang', 'inner')
        ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan', 'inner')->groupBy('tb_produk.id_produk')->findAll();
        // dd($produk);
        // $data = $model->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')->groupBy('tb_produk.id_produk')->findAll();
        // dd($data);
        $res = [
            // 'data' => $data,
            'page' => $page,
            'produk' => $produk,
        ];

        return view('pages/admin/jadwal/index', $res);
    }

    public function jadwalDetail($id){
        $page = "jadwal";
        $model = new JadwalProdukModel();
        $data = $model->join('tb_produk', 'tb_produk.id_produk = tb_jadwal_produk.id_produk', 'inner')->where('tb_jadwal_produk.id_produk', $id)->findAll();

        $produkModel = new ProdukModel();
        $produk = $produkModel->where('id_produk', $id)->first();

        $res = [
            'data' => $data,
            'page' => $page,
            'produk' => $produk,
        ];

        return view('pages/admin/jadwal/detail', $res);
    }

    public function jadwalTambah(){
        helper(['form']);

        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        $convertToTime = strtotime($tanggal_awal);
        $convertToDate = date('Y-m-d',$convertToTime);
        $dateTimeAwal = new DateTime($convertToDate);

        $convertToTime2 = strtotime($tanggal_akhir);
        $convertToDate2 = date('Y-m-d',$convertToTime2);
        $dateTimeAkhir = new DateTime($convertToDate2);


        $difference = $dateTimeAwal->diff($dateTimeAkhir);


        for($i=0; $i<=$difference->d; $i++)
        {
            $model = new JadwalProdukModel();
            $data = [
                'id_produk'     => $this->request->getVar('id_produk'),
                'jam'     => $this->request->getVar('jam'),
                'ketersediaan'    => $this->request->getVar('ketersediaan'),
                'tanggal'    => $convertToDate,
                'status_aktif' => 1
            ];
            $model->save($data);    
            $repeat = strtotime("+1 day",strtotime($convertToDate));
            $convertToDate = date('Y-m-d',$repeat);
        }
        
        return redirect()->to('/admin/jadwal/detail/'.$this->request->getVar('id_produk'))->with('success', 'Data Berhasil Diperbaharui');
    }

    public function jadwalEdit($id){
        $page = "jadwal";
        $model = new JadwalProdukModel();
        $data = $model->where('id_jadwal_produk', $id)->first();
        $data['page'] = $page;
        return view('pages/admin/jadwal/edit', $data);
    }

    public function jadwalUpdate($id){
        helper(['form']);
        // $session = session();xxxsxzxc

        // $produkMOdel = new ProdukModel();
        // $produk = $produkMOdel->where('id_produk', $this->request->getVar('id_orangtua'))->first();

        $data = new JadwalProdukModel();
        $data->update($id, [
            'jam'     => $this->request->getVar('jam'),
            'ketersediaan'    => $this->request->getVar('ketersediaan'),
            'tanggal'    => $this->request->getVar('tanggal'),
        ]);

        return redirect()->to('/admin/jadwal/detail/'.$this->request->getVar('id_produk'))->with('success', 'Data Berhasil Diperbaharui');
    }

    public function jadwalDelete($id) {
        // dd($id);
        helper(['form']);
        $postModel = new JadwalProdukModel();
        $post = $postModel->find($id);
        $postModel->delete($id);

        return redirect()->to('/admin/jadwal/detail/'.$this->request->getVar('id_produk'))->with('success', 'Data Berhasil Diperbaharui');
    }

    public function produkIndex(){
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

    public function produkTambah(){
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

    public function produkEdit($id){
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

    public function produkUpdate($id){
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