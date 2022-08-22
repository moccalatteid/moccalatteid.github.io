<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\MahasiswaModel;
use \App\Models\DosenModel;
use \App\Models\UserModel;
use \App\Models\AdminModel;
use \App\Models\BimbinganModel;
use \App\Models\KelasModel;
use \App\Models\DailyReportModel;
use \App\Models\DospemModel;

class Admin extends BaseController
{

   protected $mhsModel, $dosenModel, $userModel, $adminModel, $bimbinganModel, $kelasModel, $dailyModel, $dospemModel;

   public function __construct()
   {
      $this->mhsModel = new MahasiswaModel();
      $this->dosenModel = new DosenModel();
      $this->userModel = new UserModel();
      $this->adminModel = new AdminModel();
      $this->bimbinganModel = new BimbinganModel();
      $this->kelasModel = new KelasModel();
      $this->dailyModel = new DailyReportModel();
      $this->dospemModel = new DospemModel();
      $this->db      = \Config\Database::connect();
   }

   public function index()
   {
      $data =
         [
            'title' => 'Profil | SISFO PKL',
         ];
      return view('sita/home', $data);
   }

   public function mhsBimbingan()
   {
      $data = [
         'title' => 'Tambah Mahasiswa Bimbingan | SISFO PKL',
         'admin' => $this->userModel->joinAdmin(),
         'tahun' => $this->adminModel->getTahun()
      ];

      return view('sita/admin/tahun-tambah-mhsbimbingan', $data);
   }

   public function mahasiswa()
   {
      $data = [
         'title' => 'Kelola Data Mahasiswa | SISFO PKL',
         'admin' => $this->userModel->joinAdmin(),
         'tahun' => $this->adminModel->getTahun()
      ];

      return view('sita/admin/tahun-mahasiswa', $data);
   }

   public function mhsTahun($tahun)
   {
      $data = [
         'title'     => 'Kelola Data Mahasiswa | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'mahasiswa' => $this->adminModel->getMahasiswaAdminThn($tahun),
         'tahun'     => $this->adminModel->getTahun()
      ];

      return view('sita/admin/data-mahasiswa', $data);
   }

   public function mhsBimbinganTahun($tahun)
   {
      $data = [
         'title'      => 'Tambah Mahasiswa Bimbingan | SISFO PKL',
         'admin'      => $this->userModel->joinAdmin(),
         'dosen'      => $this->adminModel->getDosenAdmin(),
         'dospem'     => $this->adminModel->getDospem(),
         'mahasiswa'  => $this->adminModel->getMahasiswaAdminThn($tahun),
         'tahun'      => $this->adminModel->getTahun(),
         'validation' => \Config\Services::validation()
      ];

      return view('sita/admin/tambah-mhs-bimbingan', $data);
   }

   public function saveMhsBimbingan()
   {
      if (!$this->validate([
         'dosen' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Dosen Belum Dipilih!'
            ]
         ],
         'mhs' => [
            'rules'  => 'required|is_unique[dospem.id_mhs]',
            'errors' => [
               'required' => 'Mahasiswa Belum Dipilih!',
               'is_unique' => 'Mahasiswa Sudah Dipilih Menjadi Mahasiswa Bimbingan'
            ]
         ]
      ])) {
         // jika tidak valid
         session()->setFlashdata('gagal', 'Gagal Menambahkan Mahasiswa');
         return redirect()->back()->withInput();
      }

      $dospem = [
         'id_mhs'     => $this->request->getVar('mhs'),
         'id_dosen'   => $this->request->getVar('dosen'),
         'pembimbing' => $this->request->getVar('pembimbing')
      ];

      $this->dospemModel->insert($dospem);

      session()->setFlashdata('pesan', 'Berhasil Menambahkan Mahasiswa');
      return redirect()->back();
   }

   public function createMhs()
   {
      $data = [
         'title'      => 'Form Tambah Data Mahasiswa | SISFO PKL',
         'admin'      => $this->userModel->joinAdmin(),
         'kelas'      => $this->kelasModel->findAll(),
         'tahun'      => $this->adminModel->getTahun(),
         'validation' => \Config\Services::validation()
      ];

      return view('/sita/admin/create-mahasiswa', $data);
   }

   public function save()
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
         'role' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Role Tidak Boleh Kosong!'
            ]
         ],
         'jurusan' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Jurusan Tidak Boleh Kosong!'
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
         session()->setFlashdata('gagal', 'Gagal Menambahkan Mahasiswa');
         return redirect()->to('/admin/createMhs')->withInput();
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

      session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil Ditambahkan!');
      return redirect()->to('/admin/kelola-mahasiswa/' . $this->request->getVar('tahun_akademik'));
   }

   public function detailMhs($slug)
   {
      $data = [
         'title'     => 'Detail Mahasiswa | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'mahasiswa' => $this->adminModel->getDetailMahasiswaAdmin($slug),
         'tahun'     => $this->adminModel->getTahun(),
         'kelas'     => $this->mhsModel->getKelas(),
      ];

      return view('sita/admin/detail-mahasiswa', $data);
   }

   public function editMhs($slug)
   {
      $data = [
         'title'      => 'Form Edit Data Mahasiswa | SISFO PKL',
         'validation' => \Config\Services::validation(),
         'admin'      => $this->userModel->joinAdmin(),
         'kelas'      => $this->kelasModel->findAll(),
         'tahun'      => $this->adminModel->getTahun(),
         'mahasiswa'  => $this->adminModel->getDetailMahasiswaAdmin($slug)
      ];

      return view('sita/admin/edit-mahasiswa', $data);
   }

   public function updateMhs($id)
   {
      $fileGambar = $this->request->getFile('gambar');

      // cek gambar apa pakai yang lama atau tidak
      if ($fileGambar->getError() == 4) {
         $namaGambar = $this->request->getVar('gambarLama');
      } else {
         $namaGambar = $fileGambar->getRandomName();
         $fileGambar->move('img/mahasiswa', $namaGambar);

         // hapus file lama
         if ($this->request->getVar('gambarLama') != 'default.jpg') {
            unlink('img/mahasiswa/' . $this->request->getVar('gambarLama'));
         }
      }

      $slug = url_title($this->request->getVar('nama'), '-', true);
      $this->mhsModel->save([
         'id'             => $id,
         'nama_mhs'       => $this->request->getVar('nama'),
         'slug'           => $slug,
         'nim'            => $this->request->getVar('nim'),
         'kelas'          => $this->request->getVar('kelas'),
         'gambar_mhs'     => $namaGambar,
         'tahun_akademik' => $this->request->getVar('tahun_akademik'),
         'tempat_lahir'   => $this->request->getVar('tempat_lahir'),
         'email'          => $this->request->getVar('email'),
         'no_hp'          => $this->request->getVar('no_hp'),
         'alamat'         => $this->request->getVar('alamat'),
         'tempat_pkl'     => $this->request->getVar('tempat_pkl'),
      ]);

      session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil Diubah!');
      return redirect()->to('/admin/kelola-mahasiswa');
   }

   public function delete($id)
   {
      $this->mhsModel->delete($id);

      session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil Dihapus!');
      return redirect()->to('/admin/kelola-mahasiswa');
   }

   public function tahunAkademik()
   {
      $tahun = [
         'tahun_akademik' => $this->request->getVar('tahun_akademik'),
      ];

      $this->userModel->findAll();

      return redirect()->to('/admin/kelola-mahasiswa');
   }

   public function dosen()
   {
      $data = [
         'title' => 'Kelola Data Dosen | SISFO PKL',
         'dosen' => $this->adminModel->getDosenAdmin(),
         'admin' => $this->userModel->joinAdmin(),
      ];

      return view('sita/admin/data-dosen', $data);
   }

   public function detailDosen($id_dospem)
   {
      $data = [
         'title' => 'Detail Dosen | SISFO PKL',
         'admin' => $this->userModel->joinAdmin(),
         'dosen' => $this->adminModel->getDetailDosenAdmin($id_dospem)
      ];

      return view('sita/admin/detail-dosen', $data);
   }

   public function dospem($slug)
   {
      $data = [
         'title' => 'Dosen Pembimbing | SISFO PKL',
         'admin' => $this->userModel->joinAdmin(),
         'dosen' => $this->adminModel->getDetailDosenAdmin($slug),
         'tahun' => $this->dosenModel->getTahunMhs()
      ];

      return view('sita/admin/tahun-dospem', $data);
   }

   public function tahunDospem($id_dospem, $tahun)
   {
      $data = [
         'title'     => 'Dosen Pembimbing | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'dosen'     => $this->adminModel->getDetailDosenAdmin($id_dospem),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb4($id_dospem, $tahun),
         'tahun'     => $this->adminModel->getTahun()
      ];

      return view('sita/admin/dospem', $data);
   }

   public function createDosen()
   {
      $data = [
         'title'      => 'Form Tambah Data Dosen | SISFO PKL',
         'admin'      => $this->userModel->joinAdmin(),
         'kelas'      => $this->kelasModel->findAll(),
         'validation' => \Config\Services::validation()
      ];

      return view('/sita/admin/create-dosen', $data);
   }

   public function saveDosen()
   {
      // validation
      if (!$this->validate([
         'nama' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Nama Tidak Boleh Kosong!'
            ]
         ],
         'nip' => [
            'rules'  => 'required|is_unique[dosen.nip]|integer',
            'errors' => [
               'required'  => 'NIP Tidak Boleh Kosong!',
               'is_unique' => 'NIP Sudah Terdaftar!',
               'integer'   => 'NIP Harus Berupa Inputan Angka!'
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
         'role' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Role Tidak Boleh Kosong!'
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
               'required'  => 'Nomor HP Tidak Boleh Kosong!',
               'integer'   => 'NIM Harus Berupa Inputan Angka!'
            ]
         ],
         'alamat' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Alamat Tidak Boleh Kosong!'
            ]
         ],
         'bidang_keahlian' => [
            'rules'  => 'required',
            'errors' => [
               'required' => 'Bidang Keahlian Tidak Boleh Kosong!'
            ]
         ],
      ])) {
         // jika tidak valid
         session()->setFlashdata('gagal', 'Gagal Menambahkan Dosen!');
         return redirect()->to('/admin/createDosen')->withInput();
      }

      //ambil gambar
      $fileGambar = $this->request->getFile('gambar');

      if ($fileGambar->getError() == 4) {
         $namaGambar = 'default.jpg';
      } else {
         $namaGambar = $fileGambar->getRandomName();

         // pindahkan gambar
         $fileGambar->move('img/dosen', $namaGambar);
      }

      $slug = url_title($this->request->getVar('nama'), '-', true);

      $format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal_lahir')));

      // pecah tanggal menjadi array
      $pecah = explode('-', $format_indo);
      $tgl = $pecah[0];
      $bulan = $pecah[1];
      $tahun = $pecah[2];
      $tanggal =  $tgl . '-' . $bulan . '-' . $tahun;

      $dosen = [
         'nama'         => $this->request->getVar('nama'),
         'slug'         => $slug,
         'nip'          => $this->request->getVar('nip'),
         'jurusan'      => $this->request->getVar('jurusan'),
         'gambar'       => $namaGambar,
         'tempat_lahir' => $this->request->getVar('tempat_lahir'),
         'tgl_lahir'    => $tanggal,
         'email'        => $this->request->getVar('email'),
         'no_hp'        => $this->request->getVar('no_hp'),
         'alamat'       => $this->request->getVar('alamat'),
         'bid_keahlian' => $this->request->getVar('bidang_keahlian'),
      ];
      $this->dosenModel->insert($dosen);

      $id_dosen = $this->userModel->insertID();
      $user = [
         'nim'      => $this->request->getVar('nip'),
         'password' => $this->request->getVar('password'),
         'role'     => $this->request->getVar('role'),
         'id_dosen' => $id_dosen
      ];
      $this->userModel->insert($user);

      session()->setFlashdata('pesan', 'Data Dosen Berhasil Ditambahkan!');
      return redirect()->to('/admin/kelola-dosen');
   }

   public function export($id_dospem)
   {
      $mpdf = new \Mpdf\Mpdf();

      $data = [
         'title' => 'Cetak Bimbingan | SISFO PKL',
         'user' => $this->userModel->joinAdmin(),
         'export' => $this->bimbinganModel->getBimbinganAdmin($id_dospem),
         'dosen' => $this->bimbinganModel->getBimbinganAdmin2($id_dospem)
      ];

      $html = view('sita/export/export', $data);
      $mpdf->WriteHTML($html);

      return redirect()->to($mpdf->Output('cetak-bimbingan.pdf', 'I'));
   }

   public function bimbingan()
   {
      $data =
         [
            'title' => 'Bimbingan | SISFO PKL',
            'admin' => $this->userModel->joinAdmin(),
            'tahun' => $this->adminModel->getTahun(),
         ];

      return view('sita/admin/tahun-bimbingan', $data);
   }

   public function bimbinganThn($tahun)
   {
      $data = [
         'title'     => 'Bimbingan | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'mahasiswa' => $this->adminModel->getMahasiswaAdminThn($tahun),
         'dospem1'   => $this->adminModel->getMahasiswaDospem1(),
         'tahun'     => $this->adminModel->getTahun()
      ];

      return view('sita/bimbingan', $data);
   }

   public function detail($slug)
   {
      $data = [
         'title'     => 'Detail Bimbingan | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'tahun'     => $this->adminModel->getTahun(),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb($slug),
      ];

      return view('sita/detail-bimbingan', $data);
   }

   public function lembarBimbingan($id_dospem)
   {
      $data = [
         'title'     => 'Detail Bimbingan | SISFO PKL',
         'bimbingan' => $this->adminModel->getBim($id_dospem),
         'export'    => $this->adminModel->getBim2($id_dospem),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb2($id_dospem),
         'dosen'     => $this->adminModel->getMahasiswaPemb3($id_dospem),
         'total'     => $this->bimbinganModel->totalBimbingan($id_dospem),
         'acc'       => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
         'admin'     => $this->userModel->joinAdmin(),
      ];

      return view('sita/admin/lembar-bimbingan', $data);
   }

   public function import()
   {
      $file = $this->request->getFile('file_excel');
      $ext = $file->getClientExtension();

      if ($ext == 'xls') {
         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
      } else {
         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
      }

      $spreadsheet = $render->load($file);
      $sheet = $spreadsheet->getActiveSheet()->toArray();

      foreach ($sheet as $x => $excel) {
         if ($x == 0) {
            continue;
         }

         // skip jika ada data yang sama
         // $nim = $this->mhsModel->cekdata($excel['3']);
         // if ($excel['3'] == $nim['nim']) {
         //    continue;
         // }

         $mhs = [
            'nama_mhs'       => $excel['1'],
            'slug'           => $excel['2'],
            'nim'            => $excel['3'],
            'jurusan'        => $excel['4'],
            'kelas'          => $excel['5'],
            'gambar_mhs'     => $excel['6'],
            'tahun_akademik' => $excel['7'],
            'tempat_lahir'   => $excel['8'],
            'tgl_lahir'      => $excel['9'],
            'email'          => $excel['10'],
            'no_hp'          => $excel['11'],
            'alamat'         => $excel['12'],
            'tempat_pkl'     => $excel['13'],
         ];
         $this->mhsModel->insert($mhs);

         $id_mhs = $this->userModel->insertID();
         $user = [
            'nim'      => $excel['3'],
            'password' => $excel['14'],
            'role'     => $excel['15'],
            'id_mhs'   => $id_mhs
         ];
         $this->userModel->insert($user);
      }

      session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil Ditambahkan!');
      return redirect()->to('/admin/kelola-mahasiswa');
   }

   public function dailyreport()
   {
      $data =
         [
            'title' => 'Daily Report | SISFO PKL',
            'admin' => $this->userModel->joinAdmin(),
            'tahun' => $this->adminModel->getTahun(),
         ];

      return view('sita/admin/tahun-daily-report', $data);
   }

   public function dailyreportThn($tahun)
   {
      $data = [
         'title'     => 'Daily Report | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'mahasiswa' => $this->adminModel->getMahasiswaAdminThn($tahun),
         'dospem1'   => $this->adminModel->getMahasiswaDospem1(),
         'tahun'     => $this->adminModel->getTahun()
      ];

      return view('sita/dailyreport', $data);
   }

   public function detaildailyreport($slug)
   {
      $data = [
         'title'     => 'Detail Daily Report | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'tahun'     => $this->adminModel->getTahun(),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb($slug),
      ];

      return view('sita/detail-daily-report', $data);
   }

   public function lembardailyreport($id_dospem)
   {
      $data = [
         'title'     => 'Detail Daily Report | SISFO PKL',
         'daily'     => $this->adminModel->getDaily($id_dospem),
         'export'    => $this->adminModel->getBim2($id_dospem),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb2($id_dospem),
         'dosen'     => $this->adminModel->getMahasiswaPemb3($id_dospem),
         'admin'     => $this->userModel->joinAdmin(),
         'tahun'     => $this->adminModel->getTahun(),
      ];

      return view('sita/admin/lembar-daily-report', $data);
   }

   public function upload()
   {
      $data =
         [
            'title' => 'Upload File | SISFO PKL',
            'admin' => $this->userModel->joinAdmin(),
            'tahun' => $this->adminModel->getTahun(),
         ];

      return view('sita/admin/tahun-upload', $data);
   }

   public function uploadThn($tahun)
   {
      $data = [
         'title'     => 'Upload File | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'mahasiswa' => $this->adminModel->getMahasiswaAdminThn($tahun),
         'dospem1'   => $this->adminModel->getMahasiswaDospem1(),
         'tahun'     => $this->adminModel->getTahun()
      ];

      return view('sita/upload', $data);
   }

   public function detailUpload($slug)
   {
      $data = [
         'title'     => 'Detail Upload File | SISFO PKL',
         'admin'     => $this->userModel->joinAdmin(),
         'tahun'     => $this->adminModel->getTahun(),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb($slug),
      ];

      return view('sita/detail-upload', $data);
   }

   public function fileUpload($id_dospem)
   {
      $data = [
         'title'     => 'Detail Upload File | SISFO PKL',
         'file'      => $this->adminModel->getFile($id_dospem),
         'export'    => $this->adminModel->getFiles($id_dospem),
         'mahasiswa' => $this->adminModel->getMahasiswaPemb2($id_dospem),
         'dosen'     => $this->adminModel->getMahasiswaPemb3($id_dospem),
         'total'     => $this->bimbinganModel->totalBimbingan($id_dospem),
         'acc'       => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
         'admin'     => $this->userModel->joinAdmin(),
      ];

      return view('sita/admin/file-upload', $data);
   }
}
