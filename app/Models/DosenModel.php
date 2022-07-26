<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
	protected $table                = 'dosen';
	protected $allowedFields        = ['nama', 'slug', 'nip', 'jurusan', 'gambar', 'tempat_lahir', 'tgl_lahir', 'email', 'no_hp', 'alamat', 'mk_yang_diampu', 'bid_keahlian', 'topik_penelitian'];
	protected $useTimestamps        = true;

	public function search($keyword)
	{
		$builder = $this->table('dosen');
		$builder->like('nama', $keyword);

		return $builder;
	}

	public function getMahasiswaPemb($tahun)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['tahun_akademik' => $tahun]);
		$builder->where(['id_dosen' => session()->get('id_dosen')]);
		$builder->orderBy('pembimbing ASC');
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getTahunMhs()
	{
		$builder = $this->db->table('mahasiswa');
		$builder->select('tahun_akademik');
		$builder->groupBy("tahun_akademik");
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function detailBim($id_dospem)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['id_dosen' => session()->get('id_dosen')]);
		$builder->where(['id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();
		return $query;
	}
}
