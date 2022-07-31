<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{

	protected $userModel, $db;

	public function __construct()
	{
		$this->userModel = new UserModel();
		$this->db      = \Config\Database::connect();
	}

	public function index()
	{
		$data = [
			'title' => 'Login | SISFO PKL',
			'validation' => \Config\Services::validation()
		];

		return view('auth/login', $data);
	}

	public function ceklogin()
	{
		if ($this->validate([
			'nomor_induk' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'NIM/NIP Tidak Boleh Kosong!'
				]
			],
			'password' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Password Tidak Boleh Kosong!'
				]
			]
		])) {
			$username = $this->request->getVar('nomor_induk');
			$password = $this->request->getVar('password');
			$cek = $this->userModel->login($username, $password);

			if ($cek) {
				session()->set('log', true);
				session()->set('nim', $cek['nim']);
				session()->set('role', $cek['role']);
				session()->set('id_mhs', $cek['id_mhs']);
				session()->set('id_admin', $cek['id_admin']);
				session()->set('id_dosen', $cek['id_dosen']);

				return redirect()->to(base_url('sisfo'));
			} else {
				session()->setFlashdata('error', 'NIM/NIP atau Password Salah!');
				return redirect()->back();
			}
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to('/login')->withInput();
		}
	}

	public function logout()
	{
		session()->remove('log');
		session()->remove('nim');
		session()->remove('role');
		session()->remove('id_mhs');
		session()->remove('id_dosen');
		session()->remove('id_admin');

		session()->setFlashdata('logout', 'Anda Telah Logout!');
		return redirect()->to('/login');
	}
}
