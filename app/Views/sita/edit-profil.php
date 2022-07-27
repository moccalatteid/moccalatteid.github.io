<?= $this->extend('/sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-7">
            <h2 class="my-3">Edit Profil</h2>
            <a href="/sita" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

            <?php if (session()->getFlashdata('gagal')) :  ?>
                <div class="alert alert-danger my-2" role="alert">
                    <?= session()->getFlashdata('gagal');  ?>
                </div>
            <?php endif;  ?>

            <?php if (session()->get('role') == 'Mahasiswa') {  ?>

                <div class="card border-left-secondary shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <form action="/mahasiswa/update/<?= $mahasiswa['id'];  ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field();  ?>

                                <input type="hidden" name="slug" value="<?= $mahasiswa['slug'];  ?>">
                                <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar_mhs'];  ?>">

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-2">
                                        <img src="/img/mahasiswa/<?= $mahasiswa['gambar_mhs'];  ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-7">
                                        <label class="custom-file-label" for="gambar"><?= $mahasiswa['gambar_mhs']; ?></label>
                                        <input id="gambar" type="file" value="<?= old('gambar');  ?>" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="gambar">
                                        <div id="validationGambarFeedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar');  ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if (session()->get('role') == 'Dosen') { ?>
                <div class="card border-left-secondary shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <form action="/dosen/update/<?= $dosen['id'];  ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field();  ?>

                                <input type="hidden" name="slug" value="<?= $dosen['slug'];  ?>">
                                <input type="hidden" name="gambarLama" value="<?= $dosen['gambar'];  ?>">

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-2">
                                        <img src="/img/dosen/<?= $dosen['gambar'];  ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-7">
                                        <label class="custom-file-label" for="gambar"><?= $dosen['gambar']; ?></label>
                                        <input id="gambar" type="file" value="<?= old('gambar');  ?>" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="gambar">
                                        <div id="validationGambarFeedback" class="invalid-feedback">
                                            <?= $validation->getError('gambar');  ?>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>