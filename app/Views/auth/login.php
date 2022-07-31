<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/iCheck/square/blue.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo_elektro.png" type="image/x-icon">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url(); ?>/img/logo_elektro.png" class="image-logo image-logo-login">
            <h1><b>SISFO PKL</b></h1>
        </div>

        <!-- pesan validasi -->
        <?php if (session()->getFlashdata('error')) :  ?>
            <div class="alert alert-danger my-2" role="alert">
                <?= session()->getFlashdata('error');  ?>
            </div>
        <?php endif;  ?>
        <?php if (session()->getFlashdata('logout')) :  ?>
            <div class="alert alert-success my-2" role="alert">
                <?= session()->getFlashdata('logout');  ?>
            </div>
        <?php endif;  ?>

        <div class="login-box-body">
            <form action="<?= base_url(); ?>/login/ceklogin" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control <?= ($validation->hasError('nomor_induk')) ? 'is-invalid' : ''; ?>" placeholder="NIM / NIP" name="nomor_induk">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nomor_induk'); ?>
                    </div>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
                    </div>
                </div>
                <br>
                <div class="row mt-2">
                    <div class="col-xs-4">
                        <a href="<?= base_url('/'); ?>" class="btn btn-warning btn-flat">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url(); ?>/template/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url(); ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- iCheck -->
    <script src="<?= base_url(); ?>/template/plugins/iCheck/icheck.min.js"></script>

    <!-- My JS -->
    <script src="<?= base_url(); ?>/js/script.js"></script>

    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>