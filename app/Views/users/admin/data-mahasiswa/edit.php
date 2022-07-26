<?= $this->extend('users/admin/index'); ?>


<?= $this->section('isi'); ?>



<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Data Mahasiswa</h2>
            <form action="/admin/update/<?= $mahasiswa['id'];  ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field();  ?>
                <input type="hidden" name="slug" value="<?= $mahasiswa['slug'];  ?>">
                <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar'];  ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" value="<?= (old('nama')) ? (old('nama')) : $mahasiswa['nama']  ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autofocus name="nama" id="nama">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama');  ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-10">
                        <input type="text" autocomplete="off" value="<?= (old('nim')) ? (old('nim')) : $mahasiswa['nim']  ?>" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?> " name="nim" id="nim">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nim');  ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select name="jurusan" value="<?= (old('jurusan')) ? (old('jurusan')) : $mahasiswa['jurusan']  ?>" class="form-select <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '';  ?>" id="validationServer03">
                            <option disabled selected>pilih jurusan..</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Mesin">Mesin</option>
                        </select>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('jurusan');  ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $mahasiswa['gambar'];  ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <label class="custom-file-label" for="Gambar"><?= $mahasiswa['gambar'];  ?></label>
                            <input id="gambar" type="file" value="<?= old('gambar');  ?>" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="gambar" onchange="previewImg()" name="gambar">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar');  ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>





<?= $this->endSection(); ?>