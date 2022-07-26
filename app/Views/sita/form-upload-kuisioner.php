<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Upload File Kuisioner PKL</h4>

            <a href="/mahasiswa/kuisioner" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i></a>

            <form action="/mahasiswa/savefilekuisioner" method="post" enctype="multipart/form-data">
                <?= csrf_field();  ?>
                <input type="hidden" name="id_dospem" value="<?= $dp['id_dospem'];  ?>">

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">File</label>
                    <div class="col-sm-7">
                        <label class="custom-file-label" for="filekuisioner">Pilih File</label>
                        <input id="filekuisioner" type="file" value="<?= old('filekuisioner');  ?>" class="form-control <?= ($validation->hasError('filekuisioner')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="filekuisioner">
                        <div id="validationGambarFeedback" class="invalid-feedback">
                            <?= $validation->getError('filekuisioner');  ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <span style="color:red;">*</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-7">
                        <input type="text" autocomplete="off" value="<?= old('keterangan');  ?>" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" autofocus name="keterangan" id="keterangan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan');  ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <span style="color:red;">*</span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>