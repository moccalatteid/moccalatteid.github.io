<?= $this->extend('/sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-7">
            <h2 class="my-3">Ganti Password Profil</h2>
            <a href="/sita" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

            <?php if (session()->getFlashdata('gagal')) :  ?>
                <div class="alert alert-danger my-2" role="alert">
                    <?= session()->getFlashdata('gagal');  ?>
                </div>
            <?php endif;  ?>

            <?php if (session()->get('role') == 'Mahasiswa') { ?>

                <div class="card border-left-secondary shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <form action="/mahasiswa/savepassword/<?= $mahasiswa['id_user'];  ?>" method="post">
                                <?= csrf_field();  ?>

                                <div class="row mb-3">
                                    <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" autocomplete="off" value="<?= old('password');  ?>" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> " name="password" id="password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password');  ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <span style="color:red;">*</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirm" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" autocomplete="off" value="<?= old('password_confirm');  ?>" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?> " name="password_confirm" id="password_confirm">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_confirm');  ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <span style="color:red;">*</span>
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
                            <form action="/dosen/savepassword/<?= $dosen['id_user'];  ?>" method="post">
                                <?= csrf_field();  ?>

                                <div class="row mb-3">
                                    <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" autocomplete="off" value="<?= old('password');  ?>" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?> " name="password" id="password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password');  ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <span style="color:red;">*</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirm" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" autocomplete="off" value="<?= old('password_confirm');  ?>" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?> " name="password_confirm" id="password_confirm">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_confirm');  ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <span style="color:red;">*</span>
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