<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class KategoriLayananModel extends Model{
    protected $table = 'tb_kategori_layanan';
    protected $primaryKey = 'id_kategori_layanan';
    
    protected $allowedFields = [
        'nama_kategori',
        'status_aktif',
        'id_layanan',
    ];
}