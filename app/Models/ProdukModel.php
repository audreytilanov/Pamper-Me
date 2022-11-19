<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ProdukModel extends Model{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    
    protected $allowedFields = [
        'id_kategori_layanan',
        'nama_produk',
        'deskripsi_produk',
        'durasi',
        'id_cabang',
        'status_aktif',
        'harga',
    ];
}