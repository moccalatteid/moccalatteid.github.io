<?php

namespace App\Models;

use CodeIgniter\Model;

use \Mpdf\Mpdf;

class DailyReportModel extends Model
{
    protected $table                = 'dailyreport';
    protected $primaryKey           = 'id_daily';
    protected $allowedFields        = ['job_name', 'job_sequences', 'tanggal', 'gambar_kegiatan', 'id_dospem'];
    protected $useTimestamps        = true;
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getDaily($id_dospem = false)
    {
        if ($id_dospem == false) {
            return $this->findAll();
        }
        return $this->where(['id_dospem' => $id_dospem])->first();
    }

    public function getDailyReport($id_dospem)
    {
        $builder = $this->db->table('dailyreport');
        $builder->select('*');
        $builder->join('dospem', 'dailyreport.id_dospem = dospem.id_dospem', 'inner');
        $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
        $builder->orderBy('id_daily', 'ASC');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getDailyReportTanggal($tanggal)
    {
        $builder = $this->db->table('dailyreport');
        $builder->select('*');
        $builder->join('dospem', 'dailyreport.id_dospem = dospem.id_dospem', 'inner');
        $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
        $builder->orderBy('tanggal', 'ASC');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getDailyReportAdmin($id_dospem)
    {
        $builder = $this->db->table('dailyreport');
        $builder->select('*');
        $builder->join('dospem', 'dailyreport.id_dospem = dospem.id_dospem', 'inner');
        $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner');
        $builder->join('mahasiswa', 'dospem.id_mhs = mahasiswa.id', 'inner');
        $builder->orderBy('id_daily', 'ASC');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getDailyReportDosen($id_dospem)
    {
        $builder = $this->db->table('dailyreport');
        $builder->select('*');
        $builder->where(['id_dospem' => $id_dospem]);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function getDospem($id_dospem)
    {
        $builder = $this->db->table('dospem');
        $builder->select('*');
        $builder->join('dosen', 'dospem.id_dosen = dosen.id', 'inner')->where(['dospem.id_dospem' => $id_dospem]);
        $query = $builder->orderBy('pembimbing', 'ASC')->get()->getRowArray();

        return $query;
    }

    public function editDailyReport($id_daily)
    {
        $builder = $this->db->table('dailyreport');
        $builder->select('*');
        $builder->join('dospem', 'dailyreport.id_dospem = dospem.id_dospem', 'inner');
        $builder->where(['id_daily' => $id_daily]);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function hari_indo($hari)
    {
        switch ($hari) {
            case 'Sun':
                $hari_indo = "Minggu";
                break;

            case 'Mon':
                $hari_indo = "Senin";
                break;

            case 'Tue':
                $hari_indo = "Selasa";
                break;

            case 'Wed':
                $hari_indo = "Rabu";
                break;

            case 'Thu':
                $hari_indo = "Kamis";
                break;

            case 'Fri':
                $hari_indo = "Jumat";
                break;

            case 'Sat':
                $hari_indo = "Sabtu";
                break;

            default:
                $hari_indo = "Tidak ada";
                break;
        }

        return $hari_indo;
    }

    public function bulan_indo($bulan_angka)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        return $bulan[$bulan_angka];
    }
}
