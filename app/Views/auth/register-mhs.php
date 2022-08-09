<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo_elektro.png" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url(); ?>/img/logo_elektro.png" class="image-logo image-logo-login">
                                        <h1 class="h4 text-gray-900 mb-4">Register Mahasiswa</h1>
                                    </div>

                                    <?php if (session()->getFlashdata('gagal')) :  ?>
                                        <div class="alert alert-danger my-2" role="alert">
                                            <?= session()->getFlashdata('gagal');  ?>
                                        </div>
                                    <?php endif; ?>

                                    <form action="/login/saveMhs" method="post" enctype="multipart/form-data" class="user">
                                        <?= csrf_field();  ?>

                                        <input type="hidden" name="jurusan" value="Teknik Elektro">
                                        <input type="hidden" name="role" value="Mahasiswa">

                                        <div class="form-group row">
                                            <div class="col-sm-7 mb-sm 0">
                                                <label for="nama" class="col-sm col-form-label">Nama</label>
                                                <input type="text" value="<?= old('nama'); ?>" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="Nama Lengkap" id="nama" name="nama">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <label for="nim" class="col-sm col-form-label">NIM</label>
                                                <input type="text" value="<?= old('nim'); ?>" class="form-control form-control-user <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" placeholder="NIM" id="nim" name="nim">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nim'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm col-form-label">Email</label>
                                            <input type="email" value="<?= old('email');  ?>" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="Email" id="email" name="email">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm col-form-label">Password</label>
                                            <input type="password" value="<?= old('password');  ?>" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" id="password" name="password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <label for="kelas" class="col-sm col-form-label">Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control form-control-user <?= $validation->hasError('kelas') ? 'is-invalid' : '' ?>" id="validationServer03">
                                                    <option value="" hidden></option>
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <option value="<?= $k->id_kelas; ?>" <?= old('kelas') == $k->id_kelas ? 'selected' : null ?>>
                                                            <?= $k->nama_kelas; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                    <?= $validation->getError('kelas');  ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="tahun_akademik" class="col-sm col-form-label">Tahun Akademik</label>
                                                <input type="text" value="<?= old('tahun_akademik'); ?>" class="form-control form-control-user <?= ($validation->hasError('tahun_akademik')) ? 'is-invalid' : ''; ?>" placeholder="Tahun Akademik" id="tahun_akademik" name="tahun_akademik">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tahun_akademik'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9 mb-sm-0">
                                                <!-- <label for="" class="col-sm col-form-label ml-2 custom-file-label">Foto</label> -->
                                                <label for="gambar" class="custom-file-label ml-2">Pilih Foto</label>
                                                <input id="gambar" type="file" value="<?= old('gambar'); ?>" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : '';  ?> " id="validationGambar" onchange="previewImg()" name="gambar">
                                                <div id="validationGambarFeedback" class="invalid-feedback">
                                                    <?= $validation->getError('gambar'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <img src="/img/default.jpg" class="img-thumbnail img-preview gambar-user-register ml-5">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <label for="tempat_lahir" class="col-sm col-form-label">Tempat Lahir</label>
                                                <input type="text" value="<?= old('tempat_lahir'); ?>" class="form-control form-control-user <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tempat_lahir'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="tanggal_lahir" class="col-sm col-form-label">Tanggal Lahir</label>
                                                <input type="date" value="<?= old('tanggal_lahir'); ?>" class="form-control form-control-user <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" placeholder="NIM" id="tanggal_lahir" name="tanggal_lahir">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="col-sm col-form-label">Alamat Tempat Tinggal</label>
                                            <textarea rows="3" autocomplete="off" value="<?= old('alamat');  ?>" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> " name="alamat" id="alamat"></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <label for="no_hp" class="col-sm col-form-label">No. HP</label>
                                                <input type="text" value="<?= old('no_hp');  ?>" class="form-control form-control-user <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" placeholder="Nomor Handphone" id="no_hp" name="no_hp">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_hp'); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="tempat_pkl" class="col-sm col-form-label">Tempat PKL</label>
                                                <input type="text" value="<?= old('tempat_pkl');  ?>" class="form-control form-control-user <?= ($validation->hasError('tempat_pkl')) ? 'is-invalid' : ''; ?>" placeholder="Tempat PKL" id="tempat_pkl" name="tempat_pkl">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tempat_pkl'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-sm-0">
                                                <a href="<?= base_url('/'); ?>" class="btn btn-warning btn-user btn-block">Kembali</a>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- My JS -->
    <script src="<?= base_url(); ?>/js/script.js"></script>

</body>

</html>