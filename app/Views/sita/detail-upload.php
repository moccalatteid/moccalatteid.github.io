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
        background-color: #cc4d4d;
    }
</style>

<?php if (session()->get('role') == 'Admin') { ?>
    <h4 class="text-center">Dosen Pembimbing</h4>

    <div class="container">
        <?php foreach ($mahasiswa as $d) :  ?>
            <div class="card mb-3 align-items-center" style="max-width: 440px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>/img/dosen/<?= $d['gambar'];  ?>" width="130px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d['nama'];  ?></h5>
                            <p class="card-text"><?= $d['nip'];  ?></p>
                            <a href="/admin/file-pkl/<?= $d['id_dospem'];  ?>" class="btn btn-primary tombol">Lihat File <i class="far fa-arrow-alt-circle-right"></i></a>
                            <br>
                            <a href="/admin/upload" class="btn btn-secondary btn-sm mt-3 tombol"><i class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach;  ?>
    </div>

<?php } else if (session()->get('role') == 'Mahasiswa') { ?>

    <div class="bimbingan">
        <div class="nama">Nama</div>
        <div class="nama2">: <?= $user['nama'];  ?></div>
        <div class="nim">NIM</div>
        <div class="nim2">: <?= $user['nim'];  ?></div>
        <div class="pemb">Pembimbing</div>
        <div class="pemb2">: <?= $dospem['nama'];  ?> </div>
        <div class="jurusan">Tempat PKL</div>
        <div class="jurusan2">: <?= $user['tempat_pkl'];  ?></div>
    </div>

    <a href="/mahasiswa/bimbingan" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i></a>

    <div class="pilih">
        <a href="/mahasiswa/tambah-bimbingan/<?= $dospem['id_dospem'];  ?>" class="tambah" id="btn-tambah" onclick="add_bimbingan()"> <i class="fas fa-file-medical mr-2"></i>Tambah Bimbingan</a>

        <?php foreach ($bimbingan as $bi) { ?>
            <?php if ($acc < 1) { ?>
                <a href="/mahasiswa/export/<?= $bi['id_dospem'];  ?>" target="_blank" style="display:none;" class="export"><i class="fas fa-file-export"></i>Export</a>
            <?php } else { ?>
                <a href="/mahasiswa/export/<?= $bi['id_dospem'];  ?>" target="_blank" class="export"><i class="fas fa-file-export"></i> Export</a>
            <?php }  ?>
        <?php }  ?>
    </div>

    <!-- <?php if ($acc >= 4) {  ?>
        <button type="submit" class="akhiri" onclick="disabledButton()"><i class="fas fa-ban mr-2"></i>Akhiri Bimbingan </button>
    <?php } else {  ?>
        <button style="display:none" class="akhiri ">Akhiri Bimbingan </button>
    <?php  } ?> -->

    <?php $no = 1;  ?>

    <table class="tableku mt-2" border=1 width=100%>
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Uraian Bimbingan</th>
                <th scope="col">Rekomendasi Penyelesaian</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="1">Action</th>
            </tr>
        </thead>

        <?php if (!empty($bimbingan)) {  ?>
            <?php foreach ($bimbingan as $b) : ?>

                <tbody>
                    <tr>
                        <td><?= $no++;  ?></td>
                        <td><?= $b['tanggal'];  ?></td>
                        <td style="text-align:left; padding: 0px 5px;">
                            <?= $b['uraian'];  ?>
                        </td>
                        <td style="text-align:left; padding: 0px 5px;">
                            <?= $b['rekomendasi']; ?>
                        </td>
                        <td style="text-align:left; padding: 0px 5px;">
                            <?= $b['keterangan']; ?>
                        </td>
                        <?php if ($b['id_status'] == 1) { ?>
                            <td style="color:red;">Menunggu</td>
                        <?php   } else { ?>
                            <td style="color:green;">Disetujui</td>
                        <?php }  ?>
                        <td>
                            <div class="action">
                                <a class="edit" href="/mahasiswa/edit-bimbingan/<?= $b['id_bimbingan'];  ?>" onclick="return confirm('Apakah anda yakin ingin mengedit bimbingan?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg> Edit</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach;  ?>
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
            <?php if ($acc >= 4) : ?>
                <p style="font-size:12px; font-weight:bold">Telah Memenuhi Syarat Minimal Bimbingan untuk Dapat Mendaftar Seminar PKL</p>
            <?php endif; ?>
        </div>
    </div>

    <p>Keterangan</p>

    <p style="font-size:12px;">Menunggu : Menunggu Konfirmasi Bimbingan dari Dosen Pembimbing</p>
    <p style="font-size:12px;">Disetujui : Bimbingan telah Disetujui oleh Dosen Pembimbing</p>
    <p style="font-size:12px;  color:red;">Note : Tombol Export akan Muncul Ketika Bimbingan dengan Status <span style=" font-style:italic;font-weight:bold;">Disetujui</span> telah Memenuhi Syarat </p>

<?php } else {  ?>
    <div class="bimbingan">
        <div class="nama">Nama</div>
        <div class="nama2">: <?= $mahasiswa['nama'];  ?></div>
        <div class="nim">NIM</div>
        <div class="nim2">: <?= $mahasiswa['nim'];  ?></div>
        <div class="tahun">Tahun Akademik</div>
        <div class="tahun2">: <?= $mahasiswa['tahun_akademik'];  ?></div>
        <div class="pemb">Pembimbing </div>
        <div class="pemb2">: <?= $dosen['nama'];  ?> </div>
        <div class="jurusan">Tempat PKL</div>
        <div class="jurusan2">: <?= $mahasiswa['tempat_pkl'];  ?></div>
    </div>

    <?php foreach ($tahun as $t) : ?>
        <a href="/dosen/bimbingan/<?= $t['tahun_akademik']; ?>" class="btn btn-secondary mb-3 btn-sm"><i class="fas fa-arrow-left"></i></a>
    <?php endforeach; ?>

    <?php $no = 1;  ?>
    <table class="tableku" border=1 width=100%>
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Uraian Bimbingan</th>
                <th scope="col">Rekomendasi Penyelesaian</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <?php if (!empty($bimbingan)) {  ?>
            <?php foreach ($bimbingan as $b) : ?>

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
            <?php endforeach;  ?>
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
            <?php if ($acc >= 4) : ?>
                <p style="font-size:12px; font-weight:bold">Telah Memenuhi Syarat Minimal Bimbingan untuk Dapat Mendaftar Seminar PKL</p>
            <?php endif; ?>
        </div>
    </div>
<?php }  ?>

<?= $this->endSection(); ?>