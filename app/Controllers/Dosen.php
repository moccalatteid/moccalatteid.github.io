<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\DosenModel;
use \App\Models\BimbinganModel;
use \App\Models\MahasiswaModel;
use \App\Models\UserModel;
use \App\Models\DailyReportModel;
use \App\Models\FileUploadModel;

class Dosen extends BaseController
{
	protected $dosenModel;
	protected $bimbinganModel;
	protected $mhsModel;
	protected $userModel;
	protected $dailyModel;
	protected $uploadModel;

	public function __construct()
	{
		$this->dosenModel = new DosenModel();
		$this->bimbinganModel = new BimbinganModel();
		$this->mhsModel = new MahasiswaModel();
		$this->userModel = new UserModel();
		$this->dailyModel = new DailyReportModel();
		$this->uploadModel = new FileUploadModel();
	}

	public function index()
	{
		$data = [
			'title' => 'List Dosen',
			'dosen' => $this->userModel->joinDosen(),
		];

		return view('sita/index', $data);
	}

	public function bimbingan()
	{
		$data = [
			'title' => 'Halaman Bimbingan | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'wait'  => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'tahun' => $this->dosenModel->getTahunMhs(),
		];

		return view('sita/tahun_mahasiswa', $data);
	}

	public function pembimbing()
	{
		$data = [
			'dosen' => $this->userModel->joinDosen(),
			'wait'  => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
		];

		return view('pembimbing/index', $data);
	}

	public function tahunMhs($tahun)
	{
		$data = [
			'title' => 'Halaman Bimbingan | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'mahasiswa' => $this->dosenModel->getMahasiswaPemb($tahun),
		];

		return view('sita/bimbingan', $data);
	}

	public function load_mahasiswa()
	{
		$tahun = $this->request->getVar('tahun');
		$builder = $this->db->table('dospem');
		$builder->select('*');
		$builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
		$builder->where(['id_dosen' => session()->get('id_dosen')]);
		$builder->where(['mahasiswa.tahun_akademik' => $tahun]);
		$query = $builder->get()->getResultArray();

		return $query;
	}

	public function detail($id_dospem)
	{
		$data = [
			'title' => 'Detail Bimbingan | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'mahasiswa' => $this->dosenModel->detailBim($id_dospem),
			'bimbingan' => $this->bimbinganModel->getBimbinganDosen($id_dospem),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'total' => $this->bimbinganModel->totalBimbingan($id_dospem),
			'acc' => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
			'tahun' => $this->dosenModel->getTahunMhs()
		];

		return view('sita/detail-bimbingan', $data);
	}

	public function edit($id_bimbingan)
	{
		$data = [
			'title' => 'Edit Bimbingan | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'edit' => $this->bimbinganModel->editBimbingan($id_bimbingan),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'validation' =>  \Config\Services::validation()
		];

		return view('sita/edit-bimbingan', $data);
	}
	public function updatebimbingan()
	{

		$format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal')));
		// pecah tanggal menjadi array
		$pecah = explode('-', $format_indo);
		$tgl = $pecah[0];
		$bulan = $pecah[1];
		$tahun = $pecah[2];
		$tanggal =  $tgl . '-' . $bulan . '-' . $tahun;

		$bimbingan = [

			'id_bimbingan' => $this->request->getVar('id_bimbingan'),
			'tanggal' => $tanggal,
			'uraian' => $this->request->getVar('uraian'),
			'rekomendasi' => $this->request->getVar('rekomendasi'),
			'keterangan' => $this->request->getVar('keterangan'),
			'id_status' => $this->request->getVar('status'),
			'id_dospem' => $this->request->getVar('id_dospem'),
		];

		$this->bimbinganModel->save($bimbingan);

		session()->setFlashdata('pesan', 'Data berhasil di ubah!');
		return redirect()->to('/dosen/bimbingan');
	}

	public function detailMhs($slug)
	{
		$data = [
			'title' => 'Detail Mahasiswa | SISFO PKL',
			'mahasiswa' => $this->mhsModel->getMhs($slug),
			'dosen' => $this->userModel->joinDosen(),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
		];

		// jika mahasiswa tidak ada di tabel

		if (empty($data['mahasiswa'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama mahasiswa ' . $slug . ' tidak ditemukkan');
		}

		return view('sita/detail-mahasiswa', $data);
	}

	public function dailyreport()
	{
		$data = [
			'title' => 'Daily Report | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'wait'  => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'tahun' => $this->dosenModel->getTahunMhs()
		];

		return view('sita/tahun-mahasiswa-daily', $data);
	}

	public function tahunMhsDaily($tahun)
	{
		$data = [
			'title' 	=> 'Daily Report | SISFO PKL',
			'dosen' 	=> $this->userModel->joinDosen(),
			'wait' 		=> $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' 	=> $this->bimbinganModel->totalBimbinganWaiting2(),
			'mahasiswa' => $this->dosenModel->getMahasiswaPemb($tahun),
		];

		return view('sita/dailyreport', $data);
	}

	public function detailMhsDaily($slug)
	{
		$data = [
			'title' 	=> 'Detail Mahasiswa | SISFO PKL',
			'mahasiswa' => $this->mhsModel->getMhs($slug),
			'dosen' 	=> $this->userModel->joinDosen(),
			'wait' 		=> $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' 	=> $this->bimbinganModel->totalBimbinganWaiting2(),
		];

		// jika mahasiswa tidak ada di tabel

		if (empty($data['mahasiswa'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama mahasiswa ' . $slug . ' tidak ditemukkan');
		}

		return view('sita/detail-mahasiswa-daily', $data);
	}

	public function detaildailyreport($id_dospem)
	{
		$data = [
			'title' => 'Detail Daily Report | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'mahasiswa' => $this->dosenModel->detailBim($id_dospem),
			'daily' => $this->dailyModel->getDailyReportDosen($id_dospem),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'total' => $this->bimbinganModel->totalBimbingan($id_dospem),
			'acc' => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
			'tahun' => $this->dosenModel->getTahunMhs()
		];

		return view('sita/detail-daily-report', $data);
	}

	public function upload()
	{
		$data = [
			'title' => 'Upload File | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'wait'  => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'tahun' => $this->dosenModel->getTahunMhs(),
		];

		return view('sita/tahun-mahasiswa-upload', $data);
	}

	public function tahunMhsUpload($tahun)
	{
		$data = [
			'title' 	=> 'Upload File | SISFO PKL',
			'dosen' 	=> $this->userModel->joinDosen(),
			'wait' 		=> $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' 	=> $this->bimbinganModel->totalBimbinganWaiting2(),
			'mahasiswa' => $this->dosenModel->getMahasiswaPemb($tahun),
		];

		return view('sita/upload', $data);
	}

	public function detailupload($id_dospem)
	{
		$data = [
			'title' => 'Detail Upload File | SISFO PKL',
			'dosen' => $this->userModel->joinDosen(),
			'mahasiswa' => $this->dosenModel->detailBim($id_dospem),
			'file' => $this->uploadModel->getFileUpload($id_dospem),
			'wait' => $this->bimbinganModel->totalBimbinganWaiting(),
			'notif' => $this->bimbinganModel->totalBimbinganWaiting2(),
			'total' => $this->bimbinganModel->totalBimbingan($id_dospem),
			'acc' => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
			'tahun' => $this->dosenModel->getTahunMhs()
		];

		return view('sita/upload-file-pkl', $data);
	}
}
