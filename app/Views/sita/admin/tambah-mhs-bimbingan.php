<?= $this->extend('/sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Mahasiswa Bimbingan</h2>
            <a href="/admin/mahasiswa-bimbingan" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-arrow-left"></i></a>

            <div class="card border-left-secondary shadow col-8">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <form action="/admin/saveMhsBimbingan" method="post">
                            <?= csrf_field();  ?>
                            <input type="hidden" name="pembimbing" value="1">

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

                            <div class=" row mb-3">
                                <label for="dosen" class="col-sm-5 col-form-label">Pilih Dosen</label>
                                <div class="col-sm-6">
                                    <select name="dosen" class="form-control <?= $validation->hasError('dosen') ? 'is-invalid' : '' ?>" id="validationServer03">
                                        <option value="" hidden></option>
                                        <?php foreach ($dosen as $d) : ?>
                                            <option value="<?= $d['id']; ?>" <?= old('dosen') == $d['id'] ? 'selected' : null ?>>
                                                <?= $d['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('dosen');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mhs" class="col-5 col-form-label">Pilih Mahasiswa</label>
                                <div class="col-6">
                                    <select name="mhs" class="form-control <?= $validation->hasError('mhs') ? 'is-invalid' : '' ?>" id="validationServer03">
                                        <option value="" hidden></option>
                                        <?php foreach ($mahasiswa as $m) : ?>
                                            <option value="<?= $m['id']; ?>" <?= old('mhs') == $m['id'] ? 'selected' : null ?>>
                                                <?= $m['nama_mhs']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('mhs');  ?>
                                    </div>
                                </div>
                                <div class="col-1">
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