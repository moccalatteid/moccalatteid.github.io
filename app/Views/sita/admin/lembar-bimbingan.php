<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<style>
    .container {
        display: flex;
        justify-content: space-around;
        margin: 10px 20px;
        background-color: white;
    }

    .card {
        margin-top: 20px;
        box-shadow: 0px 2px 10px #000;
        font-size: 12px;
    }

    .card-body .card-title {
        font-size: 14px;
    }

    .tombol {
        font-size: 12px;
    }

    .bimbingan {
        /* background-color: red; */
        margin-bottom: 10px;
        display: grid;
        grid-template-areas: 'nama nama2 kosong pemb pemb2'
            'nim nim2 kosong jurusan jurusan2'
            'tahun tahun2 kosong jurusan jurusan2'
        ;
        grid-template-columns: 0.5fr 0.8fr 1fr 0.5fr 0.67fr;
        grid-template-rows: 0.5fr 0.5fr 0.5fr;
        /* background-color: red; */
        justify-content: space-between;

        font-size: 13px;
        font-weight: 400px;

    }

    .nama {
        grid-area: nama;
        /* background-color: blue; */
    }

    .nama2 {
        grid-area: nama2;
        /* background-color: green; */
    }

    .nim {
        grid-area: nim;
        /* background-color: cyan; */
    }

    .nim2 {
        grid-area: nim2;
        /* background-color: salmon; */
        justify-self: start;
    }

    .tahun {
        grid-area: tahun;
        justify-self: start;
        /* background-color: yellow; */
    }

    .tahun2 {
        grid-area: tahun2;
        justify-self: start;
        /* background-color: yellow; */
    }

    .pemb {
        grid-area: pemb;
        justify-self: start;
        /* background-color: violet; */
    }

    .pemb2 {

        grid-area: pemb2;
        justify-self: start;

    }

    .prodi {
        grid-area: prodi;
        justify-self: start;
        /* background-color: darksalmon; */
    }

    .prodi2 {
        grid-area: prodi2;
        justify-self: start;

        /* background-color: hotpink; */
    }

    .export {
        /* background-color: red; */
        float: right;
        align-self: end;
        justify-self: end;

        background-color: #f31111;
        color: white;
        width: 100px;
        padding: 5px;
        box-sizing: border-box;
        border-radius: 4px;
        margin: 8px 0;
        font-size: 12px;
    }

    a.export {
        text-decoration: none;
        text-align: center;
    }

    .export:hover {
        color: white;
        background-color: #c92121;
    }

    .jurusan {
        grid-area: jurusan;
        justify-self: start;
        /* background-color: lawngreen; */
    }

    .jurusan2 {
        grid-area: jurusan2;
        justify-self: start;
        /* background-color: khaki; */
    }


    .tableku {
        font-size: 12px;
        padding: 10px;

        text-align: center;
    }

    .tableku th {
        background-color: #4e73df;
        color: white;
        padding: 5px;
    }

    .tableku td {
        padding: 5px 0;
    }
</style>

<div class="bimbingan">
    <div class="nama">Nama</div>
    <div class="nama2">: <?= $mahasiswa['nama_mhs'];  ?> </div>
    <div class="nim">NIM</div>
    <div class="nim2">: <?= $mahasiswa['nim'];  ?> </div>
    <div class="tahun">Tahun Akademik</div>
    <div class="tahun2">: <?= $mahasiswa['tahun_akademik'];  ?> </div>
    <div class="pemb">Pembimbing</div>
    <div class="pemb2">: <?= $dosen['nama'];  ?> </div>
    <div class="jurusan">Tempat PKL</div>
    <div class="jurusan2">: <?= $mahasiswa['tempat_pkl'];  ?> </div>
</div>

<a href="/admin/bimbingan" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

<?php if ($acc < 1) { ?>
    <a href="/admin/export/<?= $export['id_dospem'];  ?>" target="_blank" style="display:none;" class="export"><i class="fas fa-file-export"></i> Export</a>
<?php } else { ?>
    <a href="/admin/export/<?= $export['id_dospem'];  ?>" target="_blank" class="export"><i class="fas fa-file-export"></i> Export</a>
<?php }  ?>

<?php $no = 1;  ?>
<table class="tableku mt-2" border=1 width=100%>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Uraian Bimbingan</th>
            <th scope="col">Rekomendasi Penyelesaian</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Status</th>
        </tr>
    </thead>

    <?php if (!empty($bimbingan)) {  ?>
        <?php foreach ($bimbingan as $b) { ?>
            <tbody>
                <tr>
                    <td><?= $no++;  ?></td>
                    <td><?= $b['tanggal'];  ?></td>
                    <td style="text-align:left; padding: 0px 5px;"><?= $b['uraian'];  ?></td>
                    <td style="text-align:left; padding: 0px 5px;"><?= $b['rekomendasi'];  ?></td>
                    <td style="text-align:left; padding: 0px 5px;"><?= $b['keterangan'];  ?></td>
                    <?php if ($b['id_status'] == 1) { ?>
                        <td style="color:red;">Menunggu</td>
                    <?php   } else { ?>
                        <td style="color:green;">Disetujui</td>
                    <?php }  ?>
                </tr>
            </tbody>
        <?php }  ?>
    <?php } else {  ?>
        <tbody>
            <tr>
                <td colspan="5">Belum ada bimbingan</td>
            </tr>
        </tbody>
    <?php }   ?>
</table>

<div class="col mt-2">
    <div class="row">
        <p style="font-size:12px;" class="mr-3">Total Bimbingan : <?= $total;  ?> Bimbingan</p>
        <p style="font-size:12px;" class="mr-3">Total ACC Bimbingan : <?= $acc;  ?> Bimbingan</p>
        <?php if ($acc < 7) { ?>
            <p style="font-size:12px; font-weight:bold">Belum Memenuhi Syarat Minimal Bimbingan untuk Dapat Mendaftar Seminar PKL</p>
        <?php } elseif ($acc >= 7) { ?>
            <p style="font-size:12px; font-weight:bold">Telah Memenuhi Syarat Minimal Bimbingan untuk Dapat Mendaftar Seminar PKL</p>
        <?php } ?>
    </div>
</div>

<?= $this->endSection(); ?>