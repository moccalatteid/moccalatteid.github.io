<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <?php foreach ($tahun as $t) : ?>
        <h4 class="mt-2">Daftar Mahasiswa Pembimbing <?= $dosen['nama']; ?></h4>
        <h4>Tahun Akademik <?= $t['tahun_akademik']; ?></h4>
    <?php endforeach; ?>
    <a href="/admin/tahun-dospem/<?= $dosen['slug']; ?>" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-arrow-left"></i></a>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped mt-3">
                <thead style="text-align:center;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Tahun Akademik</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tempat PKL</th>
                    </tr>
                </thead>
                <?php $no = 1;  ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tbody>
                        <th scope="row" style="text-align:center;"><?= $no++;  ?></th>
                        <td style="text-align:center;">
                            <img src="/img/mahasiswa/<?= $mhs['gambar_mhs']; ?>" class="gambar-user">
                        </td>
                        <td><?= $mhs['nama_mhs'];  ?></td>
                        <td style="text-align:center;"><?= $mhs['nim'];  ?></td>
                        <td style="text-align:center;"><?= $mhs['tahun_akademik'];  ?></td>
                        <td style="text-align:center;">3TE<?= $mhs['kelas'];  ?></td>
                        <td style="text-align:center;"><?= $mhs['tempat_pkl'];  ?></td>
                    </tbody>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>