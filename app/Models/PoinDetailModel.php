<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PoinDetailModel extends Model{
    protected $table = 'tb_point_detail';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_reservasi',
        'id_anak',
        'point_masuk',
        'point_keluar',
    ];
}