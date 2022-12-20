<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PenukaranHadiahModel extends Model{
    protected $table = 'tb_penukaran_hadiah';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'id_anak',
        'id_hadiah',
        'point',
        'tanggal_penukaran',
        'id_operator',
        'qty_hadiah',
    ];
}