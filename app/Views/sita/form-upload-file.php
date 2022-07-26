<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3">Upload File PKL</h4>
            <a href="/mahasiswa/fileupload/<?= $dospem['id_dospem']; ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i></a>
            <form action="/mahasiswa/saveFile" method="post" enctype="multipart/form-data">
                <?= csrf_field();  ?>
                <input type="hidden" name="id_dospem" value="<?= $dospem['id_dospem'];  ?>">

                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">File Kuisioner PKL</label>
                    <div class="col-sm-5">
                        <label class="custom-file-label filekuisioner" for="filekuisioner">Pilih File Kuisioner PKL</label>
                        <input id="filekuisioner" type="file" value="<?= old('filekuisioner');  ?>" class="form-control <?= ($validation->hasError('filekuisioner')) ? 'is-invalid' : '';  ?> " id="validationFile" name="filekuisioner" onchange="previewFileKuisioner()">
                        <div id="validationFileFeedback" class="invalid-feedback">
                            <?= $validation->getError('filekuisioner');  ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span style="color:red; font-size: 13px">*Format PDF/PNG/JPG/JPEG</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">File Saran-Saran PKL</label>
                    <div class="col-sm-5">
                        <label class="custom-file-label filesaran" for="filesaran">Pilih File Saran-Saran PKL</label>
                        <input id="filesaran" type="file" value="<?= old('filesaran');  ?>" class="form-control <?= ($validation->hasError('filesaran')) ? 'is-invalid' : '';  ?> " id="validationFile" name="filesaran" onchange="previewFileSaran()">
                        <div id="validationFileFeedback" class="invalid-feedback">
                            <?= $validation->getError('filesaran');  ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span style="color:red; font-size: 13px">*Format PDF/PNG/JPG/JPEG</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">File Nilai PKL</label>
                    <div class="col-sm-5">
                        <label class="custom-file-label filenilai" for="filenilai">Pilih File Nilai PKL</label>
                        <input id="filenilai" type="file" value="<?= old('filenilai');  ?>" class="form-control <?= ($validation->hasError('filenilai')) ? 'is-invalid' : '';  ?> " id="validationFile" name="filenilai" onchange="previewFileNilai()">
                        <div id="validationFileFeedback" class="invalid-feedback">
                            <?= $validation->getError('filenilai');  ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span style="color:red; font-size: 13px">*Format PDF/PNG/JPG/JPEG</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">File Laporan PKL</label>
                    <div class="col-sm-5">
                        <label class="custom-file-label filelaporan" for="filelaporan">Pilih File Laporan PKL</label>
                        <input id="filelaporan" type="file" value="<?= old('filelaporan');  ?>" class="form-control <?= ($validation->hasError('filelaporan')) ? 'is-invalid' : '';  ?> " id="validationFile" name="filelaporan" onchange="previewFileLaporan()">
                        <div id="validationFileFeedback" class="invalid-feedback">
                            <?= $validation->getError('filelaporan');  ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <span style="color:red; font-size: 13px">*Format PDF/WORD DOC</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>