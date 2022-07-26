<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'user';
	protected $allowedFields        = ['nim', 'password', 'role', 'id_mhs', 'id_dosen', 'id_admin'];
	protected $useTimestamps        = true;

	public function login($username, $password)
	{
		return $this->db->table('user')->where([
			'nim'      => $username,
			'password' => $password,
		])->get()->getRowArray();
	}

	public function joinUser()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('mahasiswa', 'mahasiswa.id = user.id_mhs', 'inner')->where(['id_mhs' => session()->get('id_mhs')]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function joinAdmin()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('admin', 'admin.id = user.id_admin', 'inner')->where(['id_admin' => session()->get('id_admin')]);
		$query = $builder->get()->getRowArray();

		return $query;
	}

	public function joinDosen()
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->join('dosen', 'dosen.id = user.id_dosen', 'inner')->where(['id_dosen' => session()->get('id_dosen')]);
		$query = $builder->get()->getRowArray();

		return $query;
	}
}
