<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<style>
    ul li {
        list-style-type: none;
    }
</style>

<?php if (session()->getFlashdata('pesan')) :  ?>
    <div class="alert alert-success my-2" role="alert">
        <?= session()->getFlashdata('pesan');  ?>
    </div>
<?php endif;  ?>

<div class="col-xl-3 col-md-6 mb-4">
    <h4>Pilih Tahun Akademik</h4>
    <?php foreach ($tahun as $t) :  ?>
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $t['tahun_akademik']; ?></div>
                    </div>
                    <div class="col-auto">
                        <a href="/admin/kelola-mahasiswa/<?= $t['tahun_akademik'];  ?>" class="btn btn-info"><i class="fas fa-sign-in-alt"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;  ?>
    <a href="/admin/create-mahasiswa" class="btn btn-primary mt-4">Tambah Mahasiswa
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
        </svg>
    </a>
</div>

<?= $this->endSection(); ?>