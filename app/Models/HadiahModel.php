<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class HadiahModel extends Model{
    protected $table = 'tb_hadiah';
    protected $primaryKey = 'id_hadiah';
    
    protected $allowedFields = [
        'nama_hadiah',
        'stok',
        'catatan',
        'point_hadiah',
    ];
}