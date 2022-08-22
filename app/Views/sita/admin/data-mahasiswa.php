<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-2">Daftar Mahasiswa</h3>
            <a href="/admin/kelola-mahasiswa" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-arrow-left"></i></a>

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

            <table class="table table-bordered table-striped mt-3">
                <thead style="text-align:center;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tempat PKL</th>
                        <th scope="col" colspan"3">Action</th>
                    </tr>
                </thead>
                <?php $no = 1;  ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tbody>
                        <th scope="row" style="text-align:center;"><?= $no++;  ?></th>
                        <td style="text-align:center;">
                            <img src="/img/mahasiswa/<?= $mhs['gambar_mhs']; ?>" class="gambar-user">
                        </td>
                        <td><?= $mhs['nama_mhs']; ?></td>
                        <td style="text-align:center;"><?= $mhs['nim']; ?></td>
                        <td style="text-align:center;">3TE<?= $mhs['kelas']; ?></td>
                        <td style="text-align:center;"><?= $mhs['tempat_pkl']; ?></td>
                        <td>
                            <div class="action">
                                <a href="/admin/edit-mahasiswa/<?= $mhs['slug']; ?>" class="btn btn-warning btn-sm">Edit
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="/admin/detail-mahasiswa/<?= $mhs['slug'];  ?>" class="btn btn-info btn-sm">Detail
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                        <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                    </svg>
                                </a>
                                <form action="/admin/<?= $mhs['id'];  ?>" method="post" class="d-inline">
                                    <?= csrf_field();  ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus?');">
                                        Hapus
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                        </tr>

                    </tbody>
                <?php endforeach;  ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>