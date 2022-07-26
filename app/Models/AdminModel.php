<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{

	protected $table                = 'admin';
	protected $primaryKey           = 'id';

	// Dates
	protected $useTimestamps        = true;

	protected $db;

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function search($keyword)
	{
		$builder = $this->table('dosen');
		$builder->like('nama', $keyword);
		return $builder;
	}

	public function getMahasiswaAdmin()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner');
		$builder->where(['id_admin' => session()->get('id_admin')]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getMahasiswaAdminThn($tahun)
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner');
		$builder->join('mahasiswa', 'mahasiswa.jurusan = admin.jurusan', 'inner');
		$builder->where(['id_admin' => session()->get('id_admin')]);
		$builder->where(['tahun_akademik' => $tahun]);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getDetailMahasiswaAdmin($slug = false)
	{
		$builder = $this->db->table('mahasiswa');
		$builder->select('*');
		$builder->where(['slug' => $slug]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getDetailDosenAdmin($slug = false)
	{
		$builder = $this->db->table('dosen');
		$builder->select('*');
		$builder->where(['slug' => $slug]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getMahasiswaDospem1()
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['pembimbing', 1]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getMahasiswaDospem2()
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['pembimbing', 2]);
		$query = $builder->get()->getRowArray();
		return $query;
	}

	public function getMahasiswaPemb($slug)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['mahasiswa.slug' => $slug]);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getMahasiswaPemb2($id_dospem)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();
		return $query;
	}

	public function getMahasiswaPemb3($id_dospem)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();
		return $query;
	}

	public function getMahasiswaPemb4($slug, $tahun)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['dosen.slug' => $slug]);
		$builder->where(['mahasiswa.tahun_akademik' => $tahun]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getDetailDospemAdmin($id_dospem)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->where(['id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getBim($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['bimbingan.id_dospem' => $id_dospem]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getBim2($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['bimbingan.id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();
		return $query;
	}

	public function getDosenAdmin()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner');
		$builder->join('dosen', 'admin.jurusan = dosen.jurusan', 'inner');
		$builder->where(['id_admin' => session()->get('id_admin')]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getDosen()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner');
		$builder->join('dosen', 'admin.jurusan = dosen.jurusan', 'inner');
		$builder->where(['id_admin' => session()->get('id_admin')]);
		$query = $builder->get()->getRowArray();
		return $query;
	}

	public function getTahun()
	{
		$builder = $this->db->table('mahasiswa');
		$builder->select('tahun_akademik');
		$builder->groupBy("tahun_akademik");
		$builder->orderBy("tahun_akademik", "ASC");
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getTahun2($tahun)
	{
		$builder = $this->db->table('mahasiswa');
		$builder->select('tahun_akademik');
		$builder->groupBy("tahun_akademik");
		$builder->orderBy("tahun_akademik", "ASC");
		$query = $builder->get()->getRow($tahun);
		return $query;
	}

	public function filterMhs($tahun)
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner');
		$builder->join('mahasiswa', 'mahasiswa.jurusan = admin.jurusan', 'inner');
		$builder->where(['id_admin' => session()->get('id_admin')]);
		$builder->where(['tahun' => $tahun]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getDaily($id_dospem)
	{
		$builder = $this->db->table('dailyreport');
		$builder->select('*');
		$builder->join('dospem', 'dailyreport.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['dailyreport.id_dospem' => $id_dospem]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getFile($id_dospem)
	{
		$builder = $this->db->table('file_upload');
		$builder->select('*');
		$builder->join('dospem', 'file_upload.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['file_upload.id_dospem' => $id_dospem]);
		$query = $builder->get()->getResultArray();
		return $query;
	}

	public function getFiles($id_dospem)
	{
		$builder = $this->db->table('file_upload');
		$builder->select('*');
		$builder->join('dospem', 'file_upload.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['file_upload.id_dospem' => $id_dospem]);
		$query = $builder->get()->getRowArray();
		return $query;
	}
}
