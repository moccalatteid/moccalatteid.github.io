<?php

namespace App\Models;

use CodeIgniter\Model;

class DospemModel extends Model
{
    protected $table = 'dospem';
    protected $primaryKey    = 'id_dospem';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_mhs', 'id_dosen', 'pembimbing'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
}
