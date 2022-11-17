<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class CabangModel extends Model{
    protected $table = 'tb_cabang';
    protected $primaryKey = 'id_cabang';
    
    protected $allowedFields = [
        'nama_cabang',
        'alamat',
        'status_aktif',
    ];
}