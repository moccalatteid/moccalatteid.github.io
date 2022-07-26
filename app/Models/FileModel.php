<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table            = 'file';
    protected $primaryKey       = 'id_file';
    protected $useTimeStamps    = true;
    protected $allowedFields    = ['nama_file_1', 'nama_file_2'];
}
