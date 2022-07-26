<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<?php if (session()->get('role') == 'Admin') { ?>
    <div class="card mb-3 border-left-primary shadow h-100 py-2" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img width="150px" src="<?= base_url();  ?>/img/<?= $admin['gambar'];  ?>" alt="<?= $admin['gambar']  ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $admin['nama'];  ?></h5>
                    <p class="card-text"><?= $admin['nip'];  ?></p>
                </div>
            </div>
        </div>
    </div>

<?php } else if (session()->get('role') == 'Mahasiswa') {  ?>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">

            <div class="col-md-8">
                <div class="card-body border-left-primary shadow h-100 py-2">
                    <p class="card-title">Nama : <?= $user['nama_mhs'];  ?></p>
                    <p class="card-text">NIM : <?= $user['nim'];  ?></p>
                    <p class="card-text">Tahun Akademik : <?= $user['tahun_akademik'];  ?></p>
                    <p class="card-text">Tempat Lahir : <?= $user['tempat_lahir'];  ?>, <?= $user['tgl_lahir'];  ?></p>
                    <p class="card-text">Alamat : <?= $user['alamat'];  ?></p>
                    <p class="card-text">Email : <?= $user['email'];  ?></p>
                    <p class="card-text">No. HP : <?= $user['no_hp'];  ?></p>
                    <p class="card-text">Tempat PKL : <?= $user['tempat_pkl'];  ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <img width="150px" src="<?= base_url();  ?>/img/mahasiswa/<?= $user['gambar_mhs'];  ?>" alt="<?= $user['gambar_mhs']  ?>">
            </div>
        </div>
    </div>

<?php } else { ?>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">

            <div class="col-md-8">
                <div class="card-body border-left-primary shadow h-100 py-2">
                    <p class="card-title">Nama : <?= $dosen['nama'];  ?></p>
                    <p class="card-text">NIP : <?= $dosen['nip'];  ?></p>
                    <p class="card-text">Tempat Lahir : <?= $dosen['tempat_lahir'];  ?></p>
                    <p class="card-text">Tanggal Lahir : <?= $dosen['tgl_lahir'];  ?></p>
                    <p class="card-text">Email : <?= $dosen['email'];  ?></p>
                    <p class="card-text">No. HP : <?= $dosen['no_hp'];  ?></p>
                    <p class="card-text">Alamat : <?= $dosen['alamat'];  ?></p>
                    <p class="card-text">Bidang Keahlian : <?= $dosen['bid_keahlian'];  ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <img width="150px" src="<?= base_url();  ?>/img/dosen/<?= $dosen['gambar'];  ?>" alt="<?= $dosen['gambar']  ?>">
            </div>
        </div>
    </div>

<?php }  ?>

<?= $this->endSection(); ?>