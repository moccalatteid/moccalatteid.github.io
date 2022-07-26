<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\FileUploadModel;

class DownloadFileUpload extends BaseController
{
    protected $fileuploadModel;

    public function __construct()
    {
        $this->fileuploadModel = new FileUploadModel();
    }

    public function index()
    {
        //
    }

    function FileKuisioner($id)
    {
        $data = $this->fileuploadModel->find($id);
        return $this->response->download('file/fileupload/' . $data['file_kuisioner_pkl'], null);
    }

    function FileSaran($id)
    {
        $data = $this->fileuploadModel->find($id);
        return $this->response->download('file/fileupload/' . $data['file_saran_pkl'], null);
    }

    function FileNilai($id)
    {
        $data = $this->fileuploadModel->find($id);
        return $this->response->download('file/fileupload/' . $data['file_nilai_pkl'], null);
    }

    function FileLaporan($id)
    {
        $data = $this->fileuploadModel->find($id);
        return $this->response->download('file/fileupload/' . $data['file_laporan_pkl'], null);
    }
}
