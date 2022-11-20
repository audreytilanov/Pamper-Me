<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class LayananModel extends Model{
    protected $table = 'tb_layanan';
    protected $primaryKey = 'id_layanan';
    
    protected $allowedFields = [
        'nama_layanan',
        'deskripsi',
        'status_aktif',
    ];
}