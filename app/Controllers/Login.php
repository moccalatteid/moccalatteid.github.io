<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use \App\Models\KelasModel;
use \App\Models\MahasiswaModel;


class Login extends BaseController
{

	protected $userModel, $kelasModel, $mhsModel, $db;

	public function __construct()
	{
		$this->userModel = new UserModel();
		$this->kelasModel = new KelasModel();
		$this->mhsModel = new MahasiswaModel();
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

	public function registerMhs()
	{
		$data = [
			'title' 	 => 'Register Mahasiswa | SISFO PKL',
			'kelas'      => $this->kelasModel->findAll(),
			'validation' => \Config\Services::validation()
		];

		return view('auth/register-mhs', $data);
	}

	public function saveMhs()
	{
		// validation
		if (!$this->validate([
			'nama' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Nama Tidak Boleh Kosong!'
				]
			],
			'nim' => [
				'rules'  => 'required|is_unique[mahasiswa.nim]|integer',
				'errors' => [
					'required'  => 'NIM Tidak Boleh Kosong!',
					'is_unique' => 'NIM Sudah Terdaftar!',
					'integer'   => 'NIM Harus Berupa Inputan Angka!'
				]
			],
			'email' => [
				'rules'  => 'required|valid_email',
				'errors' => [
					'required'    => 'Email Tidak Boleh Kosong!',
					'valid_email' => 'Email Tidak Valid!'
				]
			],
			'password' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required'   => 'Password Tidak Boleh Kosong!',
					'min_length' => 'Password Minimal 5 Karakter!'
				]
			],
			'kelas' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Kelas Tidak Boleh Kosong!'
				]
			],
			'gambar' => [
				'rules'  => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran File Terlalu Besar!',
					'is_image' => 'Harus format gambar (jpg, jpeg, png)',
					'mime_in'  => 'Harus format gambar (jpg, jpeg, png)'
				]
			],
			'tahun_akademik' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tahun Akademik Tidak Boleh Kosong!'
				]
			],
			'tempat_lahir' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tempat Lahir Tidak Boleh Kosong!'
				]
			],
			'tanggal_lahir' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tanggal Lahir Tidak Boleh Kosong!'
				]
			],
			'no_hp' => [
				'rules'  => 'required|integer',
				'errors' => [
					'required' => 'Nomor HP Tidak Boleh Kosong!',
					'integer'  => 'NIM Harus Berupa Inputan Angka!'
				]
			],
			'alamat' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Alamat Tidak Boleh Kosong!'
				]
			],
			'tempat_pkl' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Tempat PKL Tidak Boleh Kosong!'
				]
			],
		])) {
			// jika tidak valid
			session()->setFlashdata('gagal', 'Gagal Register Mahasiswa!');
			return redirect()->back()->withInput();
		}

		//ambil gambar
		$fileGambar = $this->request->getFile('gambar');

		if ($fileGambar->getError() == 4) {
			$namaGambar = 'default.jpg';
		} else {
			$namaGambar = $fileGambar->getRandomName();

			// pindahkan gambar
			$fileGambar->move('img/mahasiswa', $namaGambar);
		}

		$slug = url_title($this->request->getVar('nama'), '-', true);

		$format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal_lahir')));
		// pecah tanggal menjadi array
		$pecah = explode('-', $format_indo);
		$tgl = $pecah[0];
		$bulan = $pecah[1];
		$tahun = $pecah[2];
		$tanggal =  $tgl . '-' . $bulan . '-' . $tahun;

		$mhs = [
			'nama_mhs'       => $this->request->getVar('nama'),
			'slug'           => $slug,
			'nim'            => $this->request->getVar('nim'),
			'jurusan'        => $this->request->getVar('jurusan'),
			'kelas'          => $this->request->getVar('kelas'),
			'gambar_mhs'     => $namaGambar,
			'tahun_akademik' => $this->request->getVar('tahun_akademik'),
			'tempat_lahir'   => $this->request->getVar('tempat_lahir'),
			'tgl_lahir'      => $tanggal,
			'email'          => $this->request->getVar('email'),
			'no_hp'          => $this->request->getVar('no_hp'),
			'alamat'         => $this->request->getVar('alamat'),
			'tempat_pkl'     => $this->request->getVar('tempat_pkl'),
		];
		$this->mhsModel->insert($mhs);

		$id_mhs = $this->userModel->insertID();
		$user = [
			'nim'      => $this->request->getVar('nim'),
			'password' => $this->request->getVar('password'),
			'role'     => $this->request->getVar('role'),
			'id_mhs'   => $id_mhs
		];
		$this->userModel->insert($user);

		session()->setFlashdata('pesan', 'Berhasil Register Mahasiswa!');
		return redirect()->to('/login');
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
