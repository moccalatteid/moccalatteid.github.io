<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Task;
use \App\Models\MahasiswaModel;
use \App\Models\BimbinganModel;
use \App\Models\DosenModel;
use \App\Models\UserModel;

class Sita extends BaseController
{
	protected $mhsModel, $dosenModel, $userModel, $db, $builder, $bimbinganModel;

	public function __construct()
	{
		$this->mhsModel = new MahasiswaModel();
		$this->dosenModel = new DosenModel();
		$this->userModel = new UserModel();
		$this->bimbinganModel = new BimbinganModel();
		$this->db      = \Config\Database::connect();
	}

	public function index()
	{
		$data =
			[
				'title' => 'Profil | SISFO PKL',
				'user' => $this->userModel->joinUser(),
				'admin' => $this->userModel->joinAdmin(),
				'dosen' => $this->userModel->joinDosen(),
				'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
				'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			];
		return view('sita/home', $data);
	}

	public function notif()
	{
		$data = [
			'dosen' => $this->userModel->joinDosen(),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'showall' => $this->bimbinganModel->totalBimbinganWaiting3()
		];

		return view('sita/notif', $data);
	}

	// Mahasiswa

	public function detail($slug)
	{
		$data = [
			'title' => 'Detail Mahasiswa',
			'mahasiswa' => $this->mhsModel->getMahasiswa($slug)
		];

		// jika mahasiswa tidak ada di tabel

		if (empty($data['mahasiswa'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama mahasiswa ' . $slug . ' tidak ditemukkan');
		}

		return view('users/admin/data-mahasiswa/detail', $data);
	}

	public function create()
	{
		// session(); 
		$data = [
			'title' => 'Form Tambah Data Mahasiswa',
			'validation' => \Config\Services::validation()
		];

		return view('users/admin/data-mahasiswa/create', $data);
	}
	public function save()
	{


		// validation

		if (!$this->validate([

			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama tidak boleh kosong!'
				]
			],
			'nim' => [
				'rules' => 'required|is_unique[mahasiswa.nim]|integer',
				'errors' => [
					'required' => 'Nim tidak boleh kosong!',
					'is_unique' => 'Nim sudah terdaftar!',
					// 'min-length' => 'Nim minimal 9 angka!',
					'integer' => 'Nim yang diinput harus angka !'
				]
			],

			'password' => [
				'rules' => 'required|min_length[9]|integer',
				'errors' => [
					'required' => 'Password tidak boleh kosong!',
					'min-length' => 'Password minimal 9 angka!'

				]
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jurusan tidak boleh kosong!'

				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'File yang anda pilih bukan gambar',
					'mime_in' => 'File yang anda pilih bukan gambar'
				]
			]

		])) {

			// $validation = \Config\Services::validation();
			// return redirect()->to('/mahasiswa/create')->withInput()->with('validation', $validation);
			return redirect()->to('/admin/create')->withInput();
		}
		//ambil gambar
		$fileGambar = $this->request->getFile('gambar');
		// dd($fileGambar);

		if ($fileGambar->getError() == 4) {
			$namaGambar = 'default.png';
		} else {
			$namaGambar = $fileGambar->getRandomName();

			// pindahkan gambar
			$fileGambar->move('/img', $namaGambar);

			//
			// $namaGambar = $fileGambar->getName();
		}


		$slug = url_title($this->request->getVar('nama'), '-', true);


		$mhs = [
			// 'username' => $this->request->getVar('username'),
			'nama' => $this->request->getVar('nama'),
			'slug' => $slug,
			'nim' => $this->request->getVar('nim'),
			'jurusan' => $this->request->getVar('jurusan'),
			'gambar' => $namaGambar
		];


		$this->mhsModel->insert($mhs);



		$id_mhs = $this->userModel->insertID();

		// dd($id_mhs);

		$passwordHash = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

		$user = [
			// 'username' => $this->request->getVar('username'),
			'nim' => $this->request->getVar('nim'),
			'password' => $passwordHash,
			'role' => $this->request->getVar('role'),
			'id_mhs' => $id_mhs
		];


		$this->userModel->insert($user);



		session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

		return redirect()->to('/admin/kelola-mahasiswa');
	}


	public function edit($slug)
	{
		$data = [
			'title' => 'Form Edit Data Mahasiswa',
			'validation' => \Config\Services::validation(),
			'mahasiswa' => $this->mhsModel->getMahasiswa($slug)
		];

		return view('users/admin/data-mahasiswa/edit', $data);
	}

	public function update($id)
	{

		$mhsLama = $this->mhsModel->getMahasiswa($this->request->getVar('slug'));
		if ($mhsLama['nim'] == $this->request->getVar('nim')) {
			$ruleNim = 'required';
		} else {
			$ruleNim = 'required|is_unique[mahasiswa.nim]';
		}


		if (!$this->validate([

			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nim tidak boleh kosong!'
				]
			],
			'nim' => [
				'rules' => $ruleNim,
				'errors' => [
					'required' => 'Nim tidak boleh kosong!',
					'is_unique' => 'Nim sudah terdaftar!'
				]
			],
			'jurusan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Jurusan tidak boleh kosong!'
				]
			],
			'gambar' => [
				'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar',
					'is_image' => 'File yang anda pilih bukan gambar',
					'mime_in' => 'File yang anda pilih bukan gambar'
				]
			]

		])) {

			// $validation = \Config\Services::validation();
			return redirect()->to('/admin/edit/' . $this->request->getVar('slug'))->withInput();
		}


		$fileGambar = $this->request->getFile('gambar');
		// cek gambar apa pakai yang lama atau nggk

		if ($fileGambar->getError() == 4) {
			$namaGambar = $this->request->getVar('gambarLama');
		} else {
			$namaGambar = $fileGambar->getRandomName();
			$fileGambar->move('components/img', $namaGambar);

			// hapus file lama
			// unlink('components/img/' . $this->request->getVar('gambarLama'));
		}



		$slug = url_title($this->request->getVar('nama'), '-', true);
		$this->mhsModel->save([
			'id' => $id,
			'nama' => $this->request->getVar('nama'),
			'slug' => $slug,
			'nim' => $this->request->getVar('nim'),
			'jurusan' => $this->request->getVar('jurusan'),
			'gambar' => $namaGambar
		]);


		session()->setFlashdata('pesan', 'Data berhasil di ubah!');

		return redirect()->to('/admin/kelola-mahasiswa');
	}


	public function delete($id)
	{
		$this->mhsModel->delete($id);


		session()->setFlashdata('pesan', 'Data berhasil dihapus!');
		return redirect()->to('/admin/kelola-mahasiswa');
	}


	// Dosen


}
