<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <h4 class="my-3">Tambah Data Bimbingan</h4>
            <a href="/mahasiswa/detail/<?= $dospem['id_dospem']; ?>" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

            <div class="card border-left-secondary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <form action="/mahasiswa/save" method="post">
                            <?= csrf_field();  ?>
                            <div class="row mb-3">
                                <input type="hidden" name="id_dospem" value="<?= $dospem['id_dospem'];  ?>">

                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Bimbingan</label>
                                <div class="col-sm-8">
                                    <input type="date" id="tanggal" autocomplete="off" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal');  ?>" autofocus name=" tanggal" id="tanggal">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal'); ?>
                                    </div>
                                </div>

                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="uraian" class="col-sm-3 col-form-label">Uraian Bimbingan</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>" value="<?= old('uraian');  ?>" name="uraian" placeholder="Isi Uraian Bimbingan" autocomplete="off" id="uraian" rows="4"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('uraian'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rekomendasi" class="col-sm-3 col-form-label">Rekomendasi Penyelesaian</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control <?= ($validation->hasError('rekomendasi')) ? 'is-invalid' : ''; ?>" value="<?= old('rekomendasi');  ?>" name="rekomendasi" placeholder="Isi rekomendasi Bimbingan" autocomplete="off" id="rekomendasi" rows="4"></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('rekomendasi'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>