<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<style>
    /* .container {
        display: flex;
        justify-content: space-around;
        margin: 10px 20px;
        background-color: white;
    } */

    .card {
        margin-top: 20px;
        box-shadow: 0px 2px 10px #000;
        font-size: 12px;
    }

    .card-body .card-title {
        font-size: 14px;
    }

    .tombol {
        font-size: 12px;
    }
</style>

<?php if (session()->get('role') == 'Admin') { ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-2">Daftar Mahasiswa</h3>
                <a href="/admin/bimbingan" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i></a>
                <table class="table table-bordered table-striped mt-3">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tempat PKL</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>

                        <?php foreach ($mahasiswa as $mhs) : ?>
                            <th style="text-align: center;" scope="row"><?= $no++;  ?></th>
                            <td><?= $mhs['nama_mhs'];  ?></td>
                            <td style="text-align: center;"><?= $mhs['nim'];  ?></td>
                            <td style="text-align: center;">3TE<?= $mhs['kelas'];  ?></td>
                            <td style="text-align: center;"><?= $mhs['tempat_pkl'];  ?></td>
                            <td style="text-align: center;">
                                <img src="<?= base_url();  ?>/img/mahasiswa/<?= $mhs['gambar_mhs'];  ?> " style="width:80px" class="img" alt="">
                            </td>
                            <td style="text-align: center;">
                                <div class="action">
                                    <a href="/admin/detail-bimbingan/<?= $mhs['slug'];  ?>" class="btn btn-success btn-sm">Detail Bimbingan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                    </tbody>
                <?php endforeach;  ?>
                </table>
            </div>
        </div>
    </div>

<?php } else if (session()->get('role') == 'Mahasiswa') {  ?>
    <h4 class="text-center">Dosen Pembimbing</h4>
    <div class="container">
        <!-- <a href="/sita" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a> -->
        <?php foreach ($dospem as $d) :  ?>
            <div class="card mb-3 border-left-primary shadow h-100 py-2 align-items-center" style="max-width: 440px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url();  ?>/img/dosen/<?= $d['gambar'];  ?>" width="130px" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d['nama'];  ?></h5>
                            <p class="card-text"><?= $d['nip'];  ?></p>
                            <a href="/mahasiswa/bimbingan/<?= $d['id_dospem'];  ?>" class="btn btn-primary tombol">Bimbingan<i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach;  ?>
    </div>

<?php } else { ?>
    <div class="container">
        <h3 class="mb-2">Daftar Mahasiswa</h3>
        <a href="/dosen/bimbingan" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-arrow-left"></i></a>
        <div class="row">
            <br>
            <div class="col">
                <table class="table mt-3" width=100% id="mahasiswa">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tempat PKL</th>
                            <th scope="col">Gambar</th>
                            <th colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <th scope="row"><?= $no++;  ?></th>
                                <td><?= $mhs['nama_mhs'];  ?></td>
                                <td style="text-align: center;"><?= $mhs['nim'];  ?></td>
                                <td style="text-align: center;">3TE<?= $mhs['kelas'];  ?></td>
                                <td style="text-align: center;"><?= $mhs['tempat_pkl'];  ?></td>
                                <td style="text-align: center;">
                                    <img src="<?= base_url();  ?>/img/mahasiswa/<?= $mhs['gambar_mhs'];  ?> " style="width:80px" class="img">
                                </td>
                                <td style="text-align: center;">
                                    <a href="/dosen/detail/<?= $mhs['id_dospem'];  ?>" class="btn btn-primary btn-sm">Lihat Bimbingan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                            <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                            <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tahun").change(function() {
                let a = $(this).val();
                // console.log(a);
                mahasiswa();
            });
        });

        function mahasiswa() {
            var tahun = $("#tahun").val();
            $.ajax({
                url: "<?= base_url('Dosen/load_mahasiswa') ?>",
                data: "tahun" + tahun,
                success: function(data) {
                    // $("#mahasiswa tbody").html('<tr><td colspan="4" align="center">Tidak ada data</td></tr>')
                    console.log(data);
                }
            });
        }
    </script>




<?php }  ?>



<?= $this->endSection(); ?>