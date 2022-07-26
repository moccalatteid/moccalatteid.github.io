<?= $this->extend('sita/index'); ?>


<?= $this->section('isi'); ?>

<a href="/admin/kelola-dosen" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

<div class="card mb-3 border-left-primary shadow h-100 py-2" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-title">Nama : <?= $dosen['nama'];  ?></p>
                <p class="card-text">NIP : <?= $dosen['nip'];  ?></p>
                <p class="card-text">Tempat Lahir : <?= $dosen['tempat_lahir'];  ?></p>
                <p class="card-text">Tanggal Lahir : <?= $dosen['tgl_lahir'];  ?></p>
                <p class="card-text">Email : <?= $dosen['email'];  ?></p>
                <p class="card-text">No. Hp : <?= $dosen['no_hp'];  ?></p>
                <p class="card-text">Alamat : <?= $dosen['alamat'];  ?></p>
                <p class="card-text">Bidang Keahlian : <?= $dosen['bid_keahlian'];  ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <img width="150px" src="<?= base_url();  ?>/img/dosen/<?= $dosen['gambar'];  ?>" alt="<?= $dosen['gambar']  ?>">
        </div>
    </div>
</div>



<?= $this->endSection(); ?>