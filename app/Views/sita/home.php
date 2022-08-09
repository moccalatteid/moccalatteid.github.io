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

    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success my-2" role="alert">
            <?= session()->getFlashdata('pesan');  ?>
        </div>
    <?php endif;  ?>

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
                <a href="/mahasiswa/ganti-foto/<?= $user['slug']; ?>" class="btn btn-warning btn-sm mt-3">Ganti Foto Profil
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <a href="/mahasiswa/ganti-password/<?= $user['slug']; ?>" class="btn btn-danger btn-sm mt-3 mb-2">Ganti Password
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

<?php } else { ?>

    <?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success my-2" role="alert">
            <?= session()->getFlashdata('pesan');  ?>
        </div>
    <?php endif;  ?>

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
                <a href="/dosen/ganti-foto/<?= $dosen['slug']; ?>" class="btn btn-warning btn-sm mt-3">Ganti Foto Profil
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
                <a href="/dosen/ganti-password/<?= $dosen['slug']; ?>" class="btn btn-danger btn-sm mt-3 mb-2">Ganti Password
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

<?php }  ?>

<?= $this->endSection(); ?>