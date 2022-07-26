<?php

namespace App\Controllers;

use \App\Models\MahasiswaModel;
use \App\Models\UserModel;
use \App\Models\BimbinganModel;
use \App\Models\DailyReportModel;
use \App\Models\FileUploadModel;

class Mahasiswa extends BaseController
{
    protected $mhsModel, $userModel, $bimbinganModel, $dailyModel, $uploadModel;

    public function __construct()
    {
        $this->mhsModel = new MahasiswaModel();
        $this->userModel = new UserModel();
        $this->bimbinganModel = new BimbinganModel();
        $this->dailyModel = new DailyReportModel();
        $this->uploadModel = new FileUploadModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Mahasiswa',
            'user' => $this->mhsModel->getMahasiswa(),
        ];

        return view('sita/home', $data);
    }

    public function bimbingan()
    {
        $data = [
            'title' => 'Bimbingan | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'admin' => $this->userModel->joinAdmin(),
            'dosen' => $this->userModel->joinDosen(),
            'dospem' => $this->mhsModel->getDospem(),
        ];

        return view('sita/bimbingan', $data);
    }

    public function detail($id_dospem)
    {
        $data = [
            'title'     => 'Lembar Bimbingan | SISFO PKL',
            'user'      => $this->userModel->joinUser(),
            'bimbingan' => $this->bimbinganModel->getBimbingan($id_dospem),
            'dospem'    => $this->bimbinganModel->getDospem($id_dospem),
            'total'     => $this->bimbinganModel->totalBimbingan($id_dospem),
            'acc'       => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
        ];

        return view('sita/detail-bimbingan', $data);
    }

    public function tambah($id_dospem)
    {
        $data = [
            'title'      => 'Tambah Bimbingan | SISFO PKL',
            'user'       => $this->userModel->joinUser(),
            'dospem'     => $this->bimbinganModel->getDospem($id_dospem),
            'validation' => \Config\Services::validation(),
        ];

        return view('sita/tambah-bimbingan', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'uraian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Uraian Bimbingan Tidak Boleh Kosong!'
                ]
            ],
            'rekomendasi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Rekomendasi Penyelesaian Tidak Boleh Kosong!'
                ]
            ],
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Bimbingan Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Gagal Menambahkan Bimbingan');
            return redirect()->back()->withInput();
        }

        $format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal')));
        // pecah tanggal menjadi array
        $pecah = explode('-', $format_indo);
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
        $tanggal =  $tgl . '-' . $bulan . '-' . $tahun;

        $bim = [
            'uraian'      => $this->request->getVar('uraian'),
            'rekomendasi' => $this->request->getVar('rekomendasi'),
            'tanggal'     => $tanggal,
            'id_status'   => 1,
            'id_dospem'   => $this->request->getVar('id_dospem'),
        ];

        $this->bimbinganModel->insert($bim);

        session()->setFlashdata('pesan', 'Berhasil Menambahkan Bimbingan');
        return redirect()->to('/mahasiswa/bimbingan/' . $this->request->getVar('id_dospem'));
    }

    public function editBimbingan($id_bimbingan)
    {
        $data = [
            'title' => 'Edit Bimbingan | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'edit' => $this->bimbinganModel->editBimbingan($id_bimbingan),
            'validation' =>  \Config\Services::validation()

        ];

        return view('sita/edit-bimbingan', $data);
    }

    public function updatebimbingan()
    {
        if (!$this->validate([
            'uraian' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Uraian Bimbingan Tidak Boleh Kosong!'
                ]
            ],
            'rekomendasi' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Rekomendasi Penyelesaian Tidak Boleh Kosong!'
                ]
            ],
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Bimbingan Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Gagal Update Bimbingan');
            return redirect()->back()->withInput();
        }

        $format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal')));
        // pecah tanggal menjadi array
        $pecah = explode('-', $format_indo);
        $hari = date('D', strtotime($format_indo));
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
        $tanggal =  $tgl . '-' . $bulan . '-' . $tahun;
        $bimbingan = [

            'id_bimbingan' => $this->request->getVar('id_bimbingan'),
            'tanggal' => $tanggal,
            'uraian' => $this->request->getVar('uraian'),
            'rekomendasi' => $this->request->getVar('rekomendasi'),
            'id_status' => $this->request->getVar('status'),
            'id_dospem' => $this->request->getVar('id_dospem'),
        ];

        $this->bimbinganModel->save($bimbingan);

        session()->setFlashdata('pesan', 'Data berhasil di ubah!');
        return redirect()->to('/mahasiswa/bimbingan');
    }

    public function deletebimbingan($id_bimbingan)
    {

        $this->bimbinganModel->delete($id_bimbingan);

        session()->setFlashdata('pesan', 'Bimbingan Berhasil Dihapus!');
        return redirect()->back();
    }

    public function export($id_dospem)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data = [
            'title' => 'Cetak Bimbingan | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'export' =>   $this->bimbinganModel->getBimbingan($id_dospem)
        ];

        $html = view('sita/export/export', $data);
        $mpdf->WriteHTML($html);

        return redirect()->to($mpdf->Output('cetak-bimbingan.pdf', 'I'));
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Edit Data Mahasiswa',
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mhsModel->getMahasiswa($slug)
        ];

        return view('users/mahasiswa/edit', $data);
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

            return redirect()->to('/mahasiswa/edit/' . $this->request->getVar('slug'))->withInput();
        }


        $fileGambar = $this->request->getFile('gambar');
        // cek gambar apa pakai yang lama atau nggk

        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('components/img', $namaGambar);
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
        return redirect()->to('/mahasiswa');
    }

    public function delete($id)
    {
        $this->mhsModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/mahasiswa');
    }

    public function dailyreport()
    {
        $data = [
            'title' => 'Lembar Daily Report | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'admin' => $this->userModel->joinAdmin(),
            'dosen' => $this->userModel->joinDosen(),
            'dospem' => $this->mhsModel->getDospem(),
        ];

        return view('sita/dailyreport', $data);
    }

    public function detaildailyreport($id_dospem)
    {
        $data = [
            'title' => 'Detail Daily Report | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'daily' => $this->dailyModel->getDailyReport($id_dospem),
            'dospem' => $this->dailyModel->getDospem($id_dospem),
            'export' => $this->dailyModel->getDailyReport($id_dospem)
        ];

        return view('sita/detail-daily-report', $data);
    }

    public function tambahdailyreport($id_dospem)
    {
        $data = [
            'title' => 'Tambah Daily Activity | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'dospem' => $this->dailyModel->getDospem($id_dospem),
            'validation' => \Config\Services::validation(),
        ];

        return view('sita/tambah-daily-report', $data);
    }

    public function savedailyreport()
    {
        if (!$this->validate([
            'jobname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Job Name Tidak Boleh Kosong!'
                ]
            ],
            'jobsequences' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Job Sequences Tidak Boleh Kosong!'
                ]
            ],
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Daily Report Tidak Boleh Kosong!'
                ]
            ],
            'gambar' => [
                'rules'  => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran File Terlalu Besar!',
                    'is_image' => 'Harus format gambar (jpg, jpeg, png)',
                    'mime_in'  => 'Harus format gambar (jpg, jpeg, png)'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Gagal Menambahkan Daily Report Activity');
            return redirect()->back()->withInput();
        }

        //ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            $namaGambar = $fileGambar->getRandomName();

            // pindahkan gambar
            $fileGambar->move('img/daily', $namaGambar);
        }

        $format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal')));
        // pecah tanggal menjadi array
        $pecah = explode('-', $format_indo);
        $hari = date('D', strtotime($format_indo));
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
        $tanggal =  $tgl . '-' . $bulan . '-' . $tahun;

        $daily = [
            'job_name'        => $this->request->getVar('jobname'),
            'job_sequences'   => $this->request->getVar('jobsequences'),
            'tanggal'         => $tanggal,
            'gambar_kegiatan' => $namaGambar,
            'id_dospem'       => $this->request->getVar('id_dospem'),
        ];

        $this->dailyModel->insert($daily);

        session()->setFlashdata('pesan', 'Berhasil Menambahkan Daily Report Activity');
        return redirect()->to('/mahasiswa/dailyreport/' . $this->request->getVar('id_dospem'));
    }

    public function editDailyReport($id_daily)
    {
        $data = [
            'title' => 'Edit Daily Report | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'edit' => $this->dailyModel->editDailyReport($id_daily),
            'validation' =>  \Config\Services::validation()
        ];

        return view('sita/edit-daily-report', $data);
    }

    public function updatedailyreport()
    {
        if (!$this->validate([
            'jobname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Job Name Tidak Boleh Kosong!'
                ]
            ],
            'jobsequences' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Job Sequences Tidak Boleh Kosong!'
                ]
            ],
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal Daily Report Tidak Boleh Kosong!'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Gagal Update Daily Report');
            return redirect()->back()->withInput();
        }

        $format_indo = date('d-m-Y', strtotime($this->request->getVar('tanggal')));
        // pecah tanggal menjadi array
        $pecah = explode('-', $format_indo);
        $hari = date('D', strtotime($format_indo));
        $tgl = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
        $tanggal =  $tgl . '-' . $bulan . '-' . $tahun;
        $daily = [

            'id_daily'      => $this->request->getVar('id_daily'),
            'job_name'      => $this->request->getVar('jobname'),
            'job_sequences' => $this->request->getVar('jobsequences'),
            'tanggal'       => $tanggal,
            'id_dospem'     => $this->request->getVar('id_dospem'),
        ];

        $this->dailyModel->save($daily);

        session()->setFlashdata('pesan', 'Daily Report Berhasil Diupdate!');
        return redirect()->to('/mahasiswa/dailyreport');
    }

    public function deletedailyreport($id_daily)
    {

        $this->dailyModel->delete($id_daily);

        session()->setFlashdata('pesan', 'Daily Report Berhasil Dihapus!');
        return redirect()->back();
    }

    public function exportdailyreport($id_dospem)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data = [
            'title'  => 'Cetak Daily Report | SISFO PKL',
            'user'   => $this->userModel->joinUser(),
            'export' => $this->dailyModel->getDailyReport($id_dospem)
        ];

        $html = view('sita/export/export-daily-report', $data);
        $mpdf->WriteHTML($html);

        return redirect()->to($mpdf->Output('cetak-daily-report.pdf', 'I'));
    }

    public function upload()
    {
        $data = [
            'title' => 'Upload | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'admin' => $this->userModel->joinAdmin(),
            'dosen' => $this->userModel->joinDosen(),
            'dospem' => $this->mhsModel->getDospem(),
        ];

        return view('sita/upload', $data);
    }

    public function fileUpload($id_dospem)
    {
        $data = [
            'title' => 'Upload File | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'file' => $this->uploadModel->getFileUpload($id_dospem),
            'dospem' => $this->uploadModel->getDospem($id_dospem),
            'acc' => $this->bimbinganModel->totalBimbinganAcc($id_dospem),
            // 'total' => $this->bimbinganModel->totalBimbingan($id_dospem),
        ];

        return view('sita/upload-file-pkl', $data);
    }

    public function tambahFile($id_dospem)
    {
        $data = [
            'title' => 'Upload File | SISFO PKL',
            'user' => $this->userModel->joinUser(),
            'dospem' => $this->uploadModel->getDospem($id_dospem),
            'validation' => \Config\Services::validation(),
        ];

        return view('sita/form-upload-file', $data);
    }

    public function saveFile()
    {
        if (!$this->validate([
            'filekuisioner' => [
                'rules'  => 'uploaded[filekuisioner]|ext_in[filekuisioner,pdf,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'File Kuisioner PKL Tidak Boleh Kosong!',
                    'ext_in'  => 'File Kuisioner Harus Berformat (PDF/PNG/JPG/JPEG)'
                ]
            ],
            'filesaran' => [
                'rules'  => 'uploaded[filesaran]|ext_in[filesaran,pdf,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'File Saran-Saran PKL Tidak Boleh Kosong!',
                    'ext_in'  => 'File Kuisioner Harus Berformat (PDF/PNG/JPG/JPEG)'
                ]
            ],
            'filenilai' => [
                'rules'  => 'uploaded[filenilai]|ext_in[filenilai,pdf,png,jpg,jpeg]',
                'errors' => [
                    'uploaded' => 'File Nilai PKL Tidak Boleh Kosong!',
                    'ext_in'  => 'File Kuisioner Harus Berformat (PDF/PNG/JPG/JPEG)'
                ]
            ],
            'filelaporan' => [
                'rules'  => 'uploaded[filelaporan]|ext_in[filelaporan,pdf,docx]',
                'errors' => [
                    'uploaded' => 'File Laporan PKL Tidak Boleh Kosong!',
                    'ext_in'  => 'File Laporan PKL Harus Berformat (PDF/Word Doc)'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', 'Gagal Upload File');
            return redirect()->back()->withInput();
        }

        //ambil file
        $fileKuisioner = $this->request->getFile('filekuisioner');
        $fileSaran     = $this->request->getFile('filesaran');
        $fileNilai     = $this->request->getFile('filenilai');
        $fileLaporan   = $this->request->getFile('filelaporan');

        // pindahkan file
        $fileKuisioner->move('file/fileupload');
        $fileSaran->move('file/fileupload');
        $fileNilai->move('file/fileupload');
        $fileLaporan->move('file/fileupload');

        // ambil nama file
        $namaFileKuisioner = $fileKuisioner->getName();
        $namaFileSaran = $fileSaran->getName();
        $namaFileNilai = $fileNilai->getName();
        $namaFileLaporan = $fileLaporan->getName();

        $file = [
            'file_kuisioner_pkl' => $namaFileKuisioner,
            'file_saran_pkl'     => $namaFileSaran,
            'file_nilai_pkl'     => $namaFileNilai,
            'file_laporan_pkl'   => $namaFileLaporan,
            'id_status'          => 1,
            'id_dospem'          => $this->request->getVar('id_dospem'),
        ];

        $this->uploadModel->insert($file);

        session()->setFlashdata('pesan', 'Berhasil Upload File');
        return redirect()->to('/mahasiswa/upload/' . $this->request->getVar('id_dospem'));
    }
}
