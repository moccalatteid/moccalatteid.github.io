<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FileModel;

class Download extends BaseController
{
    protected $fileModel;

    public function __construct()
    {
        $this->fileModel = new FileModel();
    }

    public function index()
    {
        //
    }

    function Download($id)
    {
        $data = $this->fileModel->find($id);
        return $this->response->download('file/panduanpkl/' . $data['nama_file_1'], null);
    }

    function DownloadFile2($id)
    {
        $data = $this->fileModel->find($id);
        return $this->response->download('file/panduanpkl/' . $data['nama_file_2'], null);
    }
}
