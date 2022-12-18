<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use App\Models\OrangtuaModel;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\ReservasiModel;
use App\Models\ReservasiDetailModel;

class Checkout extends BaseController
{
    public function index()
    {
        $session = session();
        $model = new ReservasiModel();
        $modelDetail = new ReservasiDetailModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'checkout')->first();
        // var_dump($data[0]["id_orangtua"]);
        if(!empty($data)){
            $detail = $modelDetail->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi.id_orangtua', $session->get('user_id_orangtua'))
            ->where('tb_reservasi.id_reservasi', $data['id_reservasi'])->findAll();
            $res = [
                'data' => $detail,
                'list' => $detail
            ];
            return view('pages/checkout/checkout', $res);
        }
        // return view('pages/checkout/checkout', $res);
    }

    public function metodeBayar()
    {
        helper(['form']);
    
         // Set your Merchant Server Key
         \Midtrans\Config::$serverKey = 'SB-Mid-server-3wPaoPW6wHCsFdiUicIvhpVf';
         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
         \Midtrans\Config::$isProduction = false;
         // Set sanitization on (default)
         \Midtrans\Config::$isSanitized = true;
         // Set 3DS transaction for credit card to true
         \Midtrans\Config::$is3ds = true;

        $session = session();
        $model = new ReservasiModel();
        $modelDetail = new ReservasiDetailModel();
        $modelOrangtua = new OrangtuaModel();
        $data = $model->where('id_orangtua', $session->get('user_id_orangtua'))->where('status', 'checkout')->first();

        $dataUser = $modelOrangtua->where('id_orangtua', $session->get('user_id_orangtua'))->first();
         // Populate items

        // dd($this->request->getVar('diskon'));
        if(!empty($this->request->getVar('diskon'))){
            $diskonModel = new DiskonModel();
            $diskon = $diskonModel->where('kode_diskon', $this->request->getVar('diskon'))->first();
            if(!empty($diskon)){
                $model->update($data['id_reservasi'], [
                    'id_diskon'     => $diskon['id_diskon'],
                    'nominal_diskon'    => $diskon['nominal'],
                ]);
            }
        }

        if(!empty($data)){
            $detail = $modelDetail->join('tb_reservasi', 'tb_reservasi.id_reservasi = tb_reservasi_detail.id_reservasi')
            ->join('tb_jadwal_produk', 'tb_jadwal_produk.id_jadwal_produk = tb_reservasi_detail.id_jadwal_produk')
            ->join('tb_produk', 'tb_produk.id_produk = tb_reservasi_detail.id_produk')
            ->join('tb_cabang', 'tb_cabang.id_cabang = tb_produk.id_cabang')
            ->join('tb_anak', 'tb_anak.id_anak = tb_reservasi_detail.id_anak')
            ->join('tb_kategori_layanan', 'tb_kategori_layanan.id_kategori_layanan = tb_produk.id_kategori_layanan')
            ->where('tb_reservasi.id_reservasi', $data['id_reservasi'])->findAll();
            dd($detail);
            $itemTransaksi = [];
            $totalHarga = 0;
            $resData = $model->find($data['id_reservasi']);

            if(!empty($resData)){
                $diskonModel = new DiskonModel();
                $diskon = $diskonModel->where('id_diskon', $resData['id_diskon'])->first();
            }
            foreach($detail as $datas){
                $itemTransaksi[] = [
                    'id'       => $datas['id'],
                    'price'    => $datas['harga'],
                    'quantity' => 1,
                    'name'     => $datas['nama_produk']
                ];
                $totalHarga += $datas['harga'];

                
            }
            if(!empty($diskon)){
                if($diskon['tipe_diskon'] == 1){
                    $diskonTotal = $diskon['nominal'];
                    $totalHargaAkhir = $totalHarga - $diskonTotal;

                }elseif($diskon['tipe_diskon'] == 2){
                    $diskonTotal = $totalHarga * ($diskon['nominal']/100);
                    $totalHargaAkhir = $totalHarga - $diskonTotal;
                }else{
                    $totalHargaAkhir = $totalHarga;
                }
            }else{
                $totalHargaAkhir = $totalHarga;
            }
            if(!empty($diskonTotal)){
                $itemTransaksi[] = [
                    'id'       => $datas['id'],
                    'price'    => -$diskonTotal,
                    'quantity' => 1,
                    'name'     => 'diskon'
                ];
            }
            
            $customer_details = array(
                'first_name'       => $dataUser['nama_orangtua'],
                'email'            => $dataUser['email'],
                'phone'            => $dataUser['no_whatsapp'],
            );
    
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $totalHargaAkhir,
                ),
                'item_details'        => $itemTransaksi,
                'customer_details'    => $customer_details
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            $res = [
                'data' => $detail,
                'list' => $detail,
                'reservasi' => $data,
                'snap' => $snapToken
            ];
            return view('pages/checkout/metodeBayar', $res);            
        }else{
            return redirect()->to('/user/checkout');
        }
    }

    public function setPayment(){
        helper(['form']);
        $id = $this->request->getVar('id_reservasi');
        $data = new ReservasiModel();
        $resData = $data->find($id);
        helper(['text']);
        $total_biaya = 0;
        if(!empty($resData)){
            $diskonModel = new DiskonModel();
            $diskon = $diskonModel->where('id_diskon', $resData['id_diskon'])->first();
            if(!empty($diskon)){
                if($diskon['tipe_diskon'] == 1){
                    $total_biaya = $this->request->getVar('total_biaya') - $diskon['nominal'];
                }elseif($diskon['tipe_diskon'] == 2){
                    $diskonTotal = $this->request->getVar('total_biaya') * ($diskon['nominal']/100);
                    $total_biaya = $this->request->getVar('total_biaya') - $diskonTotal;
                }
            }
        }
        $random = random_string('alnum', 10);
        $data->update($id, [
            'subtotal_biaya'     => $this->request->getVar('subtotal_biaya'),
            'total_biaya'    => $this->request->getVar('total_biaya'),
            'metode_pembayaran'    => $this->request->getVar('metode_pembayaran'),
            'status_pembayaran'    => $this->request->getVar('status_pembayaran'),
            'id_transaksi_pembayaran'    => $this->request->getVar('id_transaksi_pembayaran'),
            'status'    => "payment",
            'order_id'    => $this->request->getVar('order_id'),
            'pdf_url'    => $this->request->getVar('pdf_url'),
            'transaction_time'    => $this->request->getVar('transaction_time'),
            'va_number_cc'    => $this->request->getVar('va_number_cc'),
            'bank'    => $this->request->getVar('bank'),
            'no_receipt'    => $random,
        ]);

        return redirect()->to('/user/my-order')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function bayar()
    {
        return view('pages/checkout/bayar');
    }

    public function detail()
    {
        return view('pages/checkout/detail');
    }
}

