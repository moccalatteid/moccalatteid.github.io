<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-4">
            <h3 class="mt-2">List Dosen</h3>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="masukkan keyword pencarian..">
                    <div class="input-group-append">
                        <button class=" btn btn-outline-secondary" type="submit" name="submit" ">Cari</button>
                    </div>
                </div>
            </form>
         </div>
    </div>
    <div class=" row">
                            <div class="col">

                                <!-- <a href="/mahasiswa/create" class="btn btn-primary">Tambah Mahasiswa -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg>
            </a> -->
                                <?php if (session()->getFlashdata('pesan')) :  ?>
                                    <div class="alert alert-success my-2" role="alert">
                                        <?= session()->getFlashdata('pesan');  ?>
                                    </div>
                                <?php endif;  ?>
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor</th>
                                            <!-- <th scope="col">Gambar</th> -->
                                            <th scope="col-3" colspan"3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = $total   ?>
                                        <?php foreach ($dosen as $d) :  ?>
                                            <tr>
                                                <th scope="row"><?= $i++;  ?></th>
                                                <td><?= $d['nama'];  ?></td>
                                                <td><?= $d['alamat'];  ?></td>
                                                <td><?= $d['no_hp'];  ?></td>
                                                <td>
                                                    <div class="action">
                                                        <a href="/dosen/<?= $d['id_dosen'];  ?>" class="btn btn-success">
                                                            Detail
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                                                <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;  ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('dosen', 'dosen_pager') ?>
                            </div>
                    </div>
                </div>



                <?= $this->endSection(); ?>