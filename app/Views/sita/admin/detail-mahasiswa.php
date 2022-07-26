<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<a href="/admin/kelola-mahasiswa" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>
<div class="card mb-3 border-left-primary shadow h-100 py-2" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-title">Nama : <?= $mahasiswa['nama_mhs'];  ?></p>
                <p class="card-text">NIM : <?= $mahasiswa['nim'];  ?></p>
                <p class="card-text">Kelas : 3TE<?= $mahasiswa['kelas'];  ?></p>
                <p class="card-text">Tahun Akademik : <?= $mahasiswa['tahun_akademik'];  ?></p>
                <p class="card-text">Tempat Lahir : <?= $mahasiswa['tempat_lahir'];  ?>, <?= $mahasiswa['tgl_lahir'];  ?></p>
                <p class="card-text">Alamat : <?= $mahasiswa['alamat'];  ?></p>
                <p class="card-text">Email : <?= $mahasiswa['email'];  ?></p>
                <p class="card-text">No. HP : <?= $mahasiswa['no_hp'];  ?></p>
                <p class="card-text">Tempat PKL : <?= $mahasiswa['tempat_pkl'];  ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <img width="150px" src="<?= base_url();  ?>/img/mahasiswa/<?= $mahasiswa['gambar_mhs'];  ?>" alt="<?= $mahasiswa['gambar_mhs']  ?>">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>