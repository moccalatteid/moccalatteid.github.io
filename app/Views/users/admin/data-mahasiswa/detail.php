<?= $this->extend('users/admin/index'); ?>

<?= $this->section('isi'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center mt-2">Detail Mahasiswa</h2>
            <div class="card mb-3 mt-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img" src="/img/<?= $mahasiswa['gambar'];  ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mahasiswa['nama'];  ?></h5>
                            <p class="card-text"><?= $mahasiswa['nim'];  ?></p>
                            <p class="card-text"><?= $mahasiswa['jurusan'];  ?></p>
                            <a href="/admin/kelola-mahasiswa"><small>Kembali ke list mahasiswa..</small></a>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>