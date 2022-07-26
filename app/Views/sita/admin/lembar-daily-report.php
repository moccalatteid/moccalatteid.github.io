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

<a href="/admin/dailyreport" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

<?php $no = 1;  ?>
<table class="tableku mt-2" border=1 width=100%>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Job Name</th>
            <th scope="col">Job Sequences</th>
            <th scope="col">Foto Kegiatan PKL</th>
        </tr>
    </thead>

    <?php foreach ($daily as $dly) : ?>
        <tbody>
            <tr>
                <td><?= $no++;  ?></td>
                <td><?= $dly['tanggal'];  ?></td>
                <td style="text-align:left; padding: 0px 5px;"><?= $dly['job_name'];  ?></td>
                <td style="text-align:left; padding: 0px 5px;"><?= $dly['job_sequences'];  ?></td>
                <td style="text-align:center; padding: 0px 5px;">
                    <img src="/img/daily/<?= $dly['gambar_kegiatan']; ?>" style="width: 90px;">
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>

<?= $this->endSection(); ?>