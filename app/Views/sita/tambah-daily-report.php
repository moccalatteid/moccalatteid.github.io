<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Tambah Data Daily Report</h4>
            <a href="/mahasiswa/detaildailyreport/<?= $dospem['id_dospem']; ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
            <form action="/mahasiswa/savedailyreport" method="post" enctype="multipart/form-data">
                <?= csrf_field();  ?>
                <div class="row mb-3">
                    <input type="hidden" name="id_dospem" value="<?= $dospem['id_dospem'];  ?>">

                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Daily Activity</label>
                    <div class="col-sm-8">
                        <input type="date" id="tanggal" autocomplete="off" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal');  ?>" autofocus name="tanggal" id="tanggal">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <span style="color:red;">*</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jobname" class="col-sm-3 col-form-label">Job Name</label>
                    <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('jobname')) ? 'is-invalid' : ''; ?>" value="<?= old('jobname');  ?>" name="jobname" placeholder="Isi Job Name" autocomplete="off" id="jobname" rows="4"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jobname'); ?>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <span style="color:red;">*</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jobsequences" class="col-sm-3 col-form-label">Job Sequences</label>
                    <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('jobsequences')) ? 'is-invalid' : ''; ?>" value="<?= old('jobsequences');  ?>" name="jobsequences" placeholder="Isi Job Sequences" autocomplete="off" id="jobsequences" rows="4"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jobsequences'); ?>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <span style="color:red;">*</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Foto Kegiatan PKL</label>
                    <div class="col-sm-2">
                        <img src="/img/daily/default.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-6">
                        <label class="custom-file-label" for="gambar">Pilih Foto</label>
                        <input id="gambar" type="file" value="<?= old('gambar');  ?>" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="gambar">
                        <div id="validationGambarFeedback" class="invalid-feedback">
                            <?= $validation->getError('gambar');  ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>