<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<style>
    .container {
        display: flex;
        justify-content: space-around;
        margin: 10px 20px;
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
        margin-bottom: 20px;
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
    }

    .pemb {
        grid-area: pemb;
        justify-self: start;
    }

    .pemb2 {

        grid-area: pemb2;
        justify-self: start;

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

    .pilih {
        display: grid;
        grid-template-areas: 'tambah export';
        grid-template-columns: 1fr 1fr;
    }

    .tambah {
        grid-area: tambah;
        background-color: #4e73df;
        color: white;
        width: 140px;
        padding: 5px;
        box-sizing: border-box;
        border-radius: 4px;
        margin: 8px 0;
        font-size: 12px;
    }

    .tambah:hover {
        color: white;
        background-color: #425aa0;
    }

    a.tambah {
        text-decoration: none;
        text-align: center;
    }

    .export {
        /* background-color: red; */
        grid-area: export;
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

    .action {
        padding: 5px;
    }

    .edit {
        background-color: #52c17f;
        padding: 5px;
        border-radius: 4px;
    }

    .edit:hover {
        background-color: #659e8a;
    }

    a.edit {
        color: white;
        text-decoration: none;
    }

    .hapus {
        background-color: #f75858;
        padding: 5px;
        border-radius: 4px;
    }

    .hapus:hover {
        background-color: #bb4e4e;
    }

    button.hapus {
        color: white;
        border: none;
        text-decoration: none;
    }

    .b {
        width: 100%;
        margin: 0px auto;
    }

    button.akhiri {
        color: white;
        font-size: 12px;
        border: none;
        padding: 5px;
        border-radius: 5px;
        background-color: #ff6060;

    }

    button.akhiri:hover {
        background-color: #ff6060;
    }
</style>

<?php if (session()->get('role') == 'Admin') { ?>
    <h4 class="text-center">Dosen Pembimbing</h4>

    <div class="container">
        <?php foreach ($mahasiswa as $d) :  ?>
            <div class="card mb-3 align-items-center" style="max-width: 440px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url();  ?>/img/dosen/<?= $d['gambar'];  ?>" width="130px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d['nama'];  ?></h5>
                            <p class="card-text"><?= $d['nip'];  ?></p>
                            <a href="/admin/lembar-bimbingan/<?= $d['id_dospem'];  ?>" class="btn btn-primary tombol">Bimbingan <i class="far fa-arrow-alt-circle-right"></i></a>
                            <br>
                            <?php foreach ($tahun as $t) : ?>
                                <a href="/admin/bimbingan/<?= $t['tahun_akademik']; ?>" class="btn btn-secondary mt-3 tombol"><i class="fas fa-arrow-left"></i></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach;  ?>
    </div>

<?php } else if (session()->get('role') == 'Mahasiswa') { ?>

    <div class="bimbingan">
        <div class="nama">Nama</div>
        <div class="nama2">: <?= $user['nama_mhs'];  ?></div>
        <div class="nim">NIM</div>
        <div class="nim2">: <?= $user['nim'];  ?></div>
        <div class="pemb">Pembimbing</div>
        <div class="pemb2">: <?= $dospem['nama'];  ?> </div>
        <div class="jurusan">Tempat PKL</div>
        <div class="jurusan2">: <?= $user['tempat_pkl'];  ?></div>
    </div>

    <a href="/mahasiswa/upload" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

    <?php if (session()->getFlashdata('gagal')) :  ?>
        <div class="alert alert-danger my-2" role="alert">
            <?= session()->getFlashdata('gagal');  ?>
        </div>
    <?php endif;  ?>
    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success my-2" role="alert">
            <?= session()->getFlashdata('pesan');  ?>
        </div>
    <?php endif;  ?>

    <div class="pilih">
        <a href="/mahasiswa/upload-file/<?= $dospem['id_dospem'];  ?>" class="tambah"> <i class="fas fa-upload mr-2"></i>Daftar Seminar PKL</a>
    </div>

    <?php $no = 1;  ?>

    <table class="tableku mt-2" border=1 width=100%>
        <thead>
            <tr>
                <th scope="col">File Kuisioner PKL</th>
                <th scope="col">File Saran Saran PKL</th>
                <th scope="col">File Nilai PKL</th>
                <th scope="col">File Laporan PKL</th>
            </tr>
        </thead>

        <?php if (!empty($file)) {  ?>
            <?php foreach ($file as $f) : ?>
                <tbody style="text-align:center;">
                    <tr>
                        <td style="padding: 0px 5px;"><?= $f['file_kuisioner_pkl']; ?></td>
                        <td style="padding: 0px 5px;"><?= $f['file_saran_pkl']; ?></td>
                        <td style="padding: 0px 5px;"><?= $f['file_nilai_pkl']; ?></td>
                        <td style="padding: 0px 5px;"><?= $f['file_laporan_pkl']; ?></td>
                    </tr>
                </tbody>
            <?php endforeach;  ?>
        <?php } else {  ?>
            <tbody>
                <tr>
                    <td colspan="5">Belum Ada File yang Diupload</td>
                </tr>
            </tbody>
        <?php }   ?>
    </table>

<?php } else {  ?>
    <div class="bimbingan">
        <div class="nama">Nama</div>
        <div class="nama2">: <?= $mahasiswa['nama_mhs'];  ?></div>
        <div class="nim">NIM</div>
        <div class="nim2">: <?= $mahasiswa['nim'];  ?></div>
        <div class="tahun">Tahun Akademik</div>
        <div class="tahun2">: <?= $mahasiswa['tahun_akademik'];  ?></div>
        <div class="pemb">Pembimbing </div>
        <div class="pemb2">: <?= $dosen['nama'];  ?> </div>
        <div class="jurusan">Tempat PKL</div>
        <div class="jurusan2">: <?= $mahasiswa['tempat_pkl'];  ?></div>
    </div>

    <a href="/dosen/upload" class="btn btn-secondary mb-3 btn-sm"><i class="fas fa-arrow-left"></i></a>

    <?php $no = 1;  ?>
    <table class="tableku" border=1 width=100%>
        <thead>
            <tr>
                <th scope="col">File Kuisioner PKL</th>
                <th scope="col">File Saran Saran PKL</th>
                <th scope="col">File Nilai PKL</th>
                <th scope="col">File Laporan PKL</th>
            </tr>
        </thead>
        <?php if (!empty($file)) {  ?>
            <?php foreach ($file as $f) : ?>
                <tbody style="text-align:center;">
                    <tr>
                        <td style="padding: 0px 5px;">
                            <?= $f['file_kuisioner_pkl']; ?>
                            <a href="<?= base_url('file/fileupload/' . $f['file_kuisioner_pkl']); ?>" class="btn btn-info btn-sm mt-2 mb-2" style="width: 90px;" download>Download</a>
                        </td>
                        <td style="padding: 0px 5px;">
                            <?= $f['file_saran_pkl']; ?>
                            <a href="<?= base_url('file/fileupload/' . $f['file_saran_pkl']); ?>" class="btn btn-info btn-sm mt-2 mb-2" style="width: 90px;" download>Download</a>
                        </td>
                        <td style="padding: 0px 5px;">
                            <?= $f['file_nilai_pkl']; ?>
                            <a href="<?= base_url('file/fileupload/' . $f['file_nilai_pkl']); ?>" class="btn btn-info btn-sm mt-2 mb-2" style="width: 90px;" download>Download</a>
                        </td>
                        <td style="padding: 0px 5px;">
                            <?= $f['file_laporan_pkl']; ?>
                            <a href="<?= base_url('file/fileupload/' . $f['file_laporan_pkl']); ?>" class="btn btn-info btn-sm mt-2 mb-2" style="width: 90px;" download>Download</a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach;  ?>
        <?php } else {  ?>
            <tbody>
                <tr>
                    <td colspan="5">Belum Ada File yang Diupload</td>
                </tr>
            </tbody>
        <?php }   ?>
    </table>

<?php }  ?>

<?= $this->endSection(); ?>