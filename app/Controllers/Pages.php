<?php

namespace App\Controllers;

use \App\Models\MahasiswaModel;
use \App\Models\DosenModel;
use \App\Models\UserModel;
use App\Models\FileModel;

class Pages extends BaseController
{

    protected $dosenModel;
    protected $mhsModel;
    protected $userModel;
    protected $fileModel;

    public function __construct()
    {
        $this->mhsModel = new MahasiswaModel();
        $this->dosenModel = new DosenModel();
        $this->userModel = new UserModel();
        $this->fileModel = new FileModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Home | SISFO PKL',
            'file'  => $this->fileModel->findAll()

        ];
        return view('pages/home', $data);
    }

    // public function dosen()
    // {

    //     $ambilPager = $this->request->getVar('dosen_pager') ? $this->request->getVar('dosen_pager') : 1;
    //     // dd($currentPage);


    //     $totalPage = 1 + (6 * ($ambilPager - 1));

    //     $keyword = $this->request->getVar('keyword');
    //     if ($keyword) {
    //         $dosen = $this->dosenModel->search($keyword);
    //     } else {
    //         $dosen = $this->dosenModel;
    //     }
    //     // d($keyword);

    //     $data = [
    //         'title' => 'List Dosen',
    //         'dosen' => $this->dosenModel->paginate(6, 'dosen'),
    //         'pager' => $this->dosenModel->pager,
    //         'total' => $totalPage
    //         // 'pager' => $this->dosenModel->pager()
    //     ];

    //     return view('pages/dosen', $data);
    // }
}
