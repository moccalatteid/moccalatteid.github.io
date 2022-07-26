<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<a href="/dosen/bimbingan/<?= $mahasiswa['tahun_akademik']; ?>" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i></a>
<div class="card mb-3 border-left-primary shadow h-100 py-2" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Nama : <?= $mahasiswa['nama_mhs'];  ?></h5>
                <p class="card-text">NIM : <?= $mahasiswa['nim'];  ?></p>
                <p class="card-text">Email : <?= $mahasiswa['email'];  ?></p>
                <p class="card-text">Kelas : 3TE<?= $mahasiswa['kelas'];  ?></p>
                <p class="card-text">Jurusan : <?= $mahasiswa['jurusan'];  ?></p>
                <p class="card-text">Tahun Akademik : <?= $mahasiswa['tahun_akademik'];  ?></p>
                <p class="card-text">Tempat Lahir : <?= $mahasiswa['tempat_lahir'];  ?>, <?= $mahasiswa['tgl_lahir'];  ?></p>
                <p class="card-text">Alamat : <?= $mahasiswa['alamat'];  ?></p>
                <p class="card-text">No. HP : <?= $mahasiswa['no_hp'];  ?></p>
                <p class="card-text">Tempat PKL : <?= $mahasiswa['tempat_pkl'];  ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <img width="150px" src="<?= base_url();  ?>/img/mahasiswa/<?= $mahasiswa['gambar'];  ?>" alt="<?= $mahasiswa['gambar']  ?>">
        </div>
    </div>
</div>

<?= $this->endSection(); ?>