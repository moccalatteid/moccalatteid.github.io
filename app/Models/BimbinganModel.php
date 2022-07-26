<?php

namespace App\Models;

use CodeIgniter\Model;

use \Mpdf\Mpdf;

class BimbinganModel extends Model
{

	protected $table                = 'bimbingan';
	protected $primaryKey           = 'id_bimbingan';
	protected $allowedFields        = ['uraian', 'rekomendasi', 'keterangan', 'tanggal', 'id_status', 'id_dospem'];
	protected $useTimestamps        = true;
	protected $db;

	public function __construct()
	{
		$this->db = db_connect();
	}

	public function getBim($id_dospem = false)
	{
		if ($id_dospem == false) {
			return $this->findAll();
		}
		return $this->where(['id_dospem' => $id_dospem])->first();
	}

	public function getBimbingan($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->join('status', 'bimbingan.id_status = status.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
		$builder->orderBy('id_bimbingan', 'ASC');
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getBimbinganAdmin($id_dospem)
	{

		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->join('status', 'bimbingan.id_status = status.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
		$builder->orderBy('id_bimbingan', 'ASC');
		$query = $builder->get()->getResultArray();

		return $query;
	}
	public function getBimbinganAdmin2($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
		$builder->join('status', 'bimbingan.id_status = status.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
		$builder->orderBy('id_bimbingan', 'ASC');
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function getBimbinganDosen($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->where(['id_dospem' => $id_dospem]);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function getDospem($id_dospem)
	{
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
		$query = $builder->orderBy('pembimbing', 'ASC')->get()->getRowArray();

		return $query;
	}

	public function editBimbingan($id_bimbingan)
	{
		$builder = $this->db->table('bimbingan');
		$builder->select('*');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['id_bimbingan' => $id_bimbingan]);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function totalBimbingan($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->like('id_dospem', $id_dospem);
		$query = $builder->countAllResults();

		return $query;
	}

	public function totalBimbinganAcc($id_dospem)
	{
		$builder = $this->db->table('bimbingan');
		$builder->like('id_dospem', $id_dospem);
		$builder->like('id_status',  2);
		$query = $builder->countAllResults();

		return $query;
	}

	public function totalBimbinganWaiting()
	{
		$builder = $this->db->table('bimbingan');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->where(['dospem.id_dosen' => session()->get('id_dosen')]);
		$builder->like('id_status',  1);
		$query = $builder->countAllResults();

		return $query;
	}

	public function totalBimbinganWaiting2()
	{
		$builder = $this->db->table('bimbingan');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['dospem.id_dosen' => session()->get('id_dosen')]);
		$builder->like('id_status',  1);
		$builder->orderBy('tanggal', 'DESC');
		$builder->limit(3);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function totalBimbinganWaiting3()
	{
		$builder = $this->db->table('bimbingan');
		$builder->join('dospem', 'bimbingan.id_dospem = dospem.id_dospem', 'inner');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['dospem.id_dosen' => session()->get('id_dosen')]);
		$builder->like('id_status',  1);
		$builder->orderBy('tanggal', 'ASC');
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function hari_indo($hari)
	{
		switch ($hari) {
			case 'Sun':
				$hari_indo = "Minggu";
				break;

			case 'Mon':
				$hari_indo = "Senin";
				break;

			case 'Tue':
				$hari_indo = "Selasa";
				break;

			case 'Wed':
				$hari_indo = "Rabu";
				break;

			case 'Thu':
				$hari_indo = "Kamis";
				break;

			case 'Fri':
				$hari_indo = "Jumat";
				break;

			case 'Sat':
				$hari_indo = "Sabtu";
				break;

			default:
				$hari_indo = "Tidak ada";
				break;
		}

		return $hari_indo;
	}

	public function bulan_indo($bulan_angka)
	{
		$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);

		return $bulan[$bulan_angka];
	}
}
