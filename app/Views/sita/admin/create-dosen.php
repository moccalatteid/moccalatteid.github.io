<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Data Dosen</h2>
            <a href="/admin/kelola-dosen" class="btn btn-secondary btn-sm mb-3"><i class="fas fa-arrow-left"></i></a>

            <div class="card border-left-secondary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <form action="/admin/saveDosen" method="post" enctype="multipart/form-data">
                            <?= csrf_field();  ?>
                            <input type="hidden" name="jurusan" value="Teknik Elektro">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" value="<?= old('nama');  ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autofocus name="nama" id="nama">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" value="<?= old('nip');  ?>" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?> " name="nip" id="nip">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nip');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" autocomplete="off" value="<?= old('email');  ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?> " name="email" id="email">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
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
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role" value="<?= old('role');  ?>" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : '';  ?>" id="validationServer03">
                                        <option selected value="Dosen">Dosen</option>
                                    </select>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('role');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-2">
                                    <img src="/img/default.jpg" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-7">
                                    <label class="custom-file-label" for="gambar">Pilih Foto</label>
                                    <input id="gambar" type="file" value="<?= old('gambar');  ?>" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="gambar">
                                    <div id="validationGambarFeedback" class="invalid-feedback">
                                        <?= $validation->getError('gambar');  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" value="<?= old('tempat_lahir');  ?>" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?> " name="tempat_lahir" id="tempat_lahir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lahir');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" autocomplete="off" value="<?= old('tanggal_lahir');  ?>" class="form-control  <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?> " name="tanggal_lahir" id="tanggal_lahir">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_lahir');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" value="<?= old('no_hp');  ?>" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?> " name="no_hp" id="no_hp">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp');  ?>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" autocomplete="off" value="<?= old('alamat');  ?>" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> " name="alamat" id="alamat">
                                    </textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat');  ?>

                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <span style="color:red;">*</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="bidang_keahlian" class="col-sm-2 col-form-label">Bidang Keahlian</label>
                                <div class="col-sm-9">
                                    <textarea rows="3" autocomplete="off" value="<?= old('bidang_keahlian');  ?>" class="form-control <?= ($validation->hasError('bidang_keahlian')) ? 'is-invalid' : ''; ?> " name="bidang_keahlian" id="bidang_keahlian">
                                    </textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('bidang_keahlian');  ?>
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