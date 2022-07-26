<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_mhs', 'slug', 'nim', 'jurusan', 'kelas', 'gambar_mhs', 'tahun_akademik', 'tempat_lahir', 'tgl_lahir', 'email', 'no_hp', 'alamat', 'tempat_pkl'];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getMahasiswa($slug = false)
    {
        $builder = $this->db->table('mahasiswa');
        $builder->select('*');
        $builder->where(['slug' => $slug]);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getMhs($slug = false)
    {
        $builder = $this->db->table('mahasiswa');
        $builder->select('*');
        $builder->where(['slug' => $slug]);
        $query = $builder->get()->getRowArray();

        return $query;
    }

    public function getDospem()
    {
        $builder = $this->db->table('dospem');
        $builder->select('*');
        $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner')->where(['id_mhs' => session()->get('id_mhs')]);
        $query = $builder->orderBy('pembimbing', 'ASC')->get()->getResultArray();

        return $query;
    }

    public function getKelas()
    {
        $builder = $this->db->table('mahasiswa');
        $builder->join('kelas', 'kelas.id_kelas = mahasiswa.kelas');
        $query = $builder->get();
        return $query->getResult();
    }
}
