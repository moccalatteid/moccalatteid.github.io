<?= $this->extend('users/admin/index'); ?>

<?= $this->section('isi'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Data Mahasiswa</h2>
            <form action="/admin/save" method="post" enctype="multipart/form-data">
                <?= csrf_field();  ?>
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
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-9">
                        <input type="text" autocomplete="off" value="<?= old('nim');  ?>" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?> " name="nim" id="nim">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nim');  ?>
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
                            <option selected value="Mahasiswa">Mahasiswa</option>


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
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                        <select name="jurusan" value="<?= old('jurusan');  ?>" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '';  ?>" id="validationServer03">
                            <option disabled selected>pilih jurusan..</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Mesin">Mesin</option>
                            <option value="Hukum">Hukum</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('jurusan');  ?>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <span style="color:red;">*</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-7">
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