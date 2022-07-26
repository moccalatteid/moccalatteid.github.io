<?php

namespace App\Models;

use CodeIgniter\Model;

class FileUploadModel extends Model
{
   protected $table            = 'file_upload';
   protected $primaryKey       = 'id_upload';
   protected $useTimeStamps    = true;
   protected $allowedFields    = ['file_kuisioner_pkl', 'file_saran_pkl', 'file_nilai_pkl', 'file_laporan_pkl', 'id_status', 'id_dospem'];

   public function getFile($id_dospem = false)
   {
      if ($id_dospem == false) {
         return $this->findAll();
      }
      return $this->where(['id_dospem' => $id_dospem])->first();
   }

   public function getDospem($id_dospem)
   {
      $builder = $this->db->table('dospem');
      $builder->select('*');
      $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
      $query = $builder->orderBy('pembimbing', 'ASC')->get()->getRowArray();

      return $query;
   }

   public function getFileUpload($id_dospem)
   {
      $builder = $this->db->table('file_upload');
      $builder->select('*');
      $builder->join('dospem', 'file_upload.id_dospem = dospem.id_dospem', 'inner');
      $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
      $builder->join('status', 'file_upload.id_status = status.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
      $builder->orderBy('id_upload', 'ASC');
      $query = $builder->get()->getResultArray();

      return $query;
   }
}
