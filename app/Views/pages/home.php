<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- My Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">

    <link rel="shortcut icon" href="<?= base_url(); ?>/img/logo_elektro.png" type="image/x-icon">

    <title><?= $title; ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url(); ?>/img/logo_elektro.png" width="40" height="40" class="d-inline-block align-top" alt="">
                SISFO PKL
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-item btn btn-primary button" href="<?= base_url('login'); ?>">Login</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <!-- <h1 class="display-4">SISFO PKL</h1> -->
        </div>
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->
    <div class="container">

        <!-- Info Panel -->
        <div class="row justify-content-center">
            <div class="col-8 info-panel">
                <div class="row">
                    <?php foreach ($file as $f) : ?>
                        <div class="col-lg-6">
                            <h4>Panduan dan Format Laporan PKL</h4>
                            <a href="<?= base_url('download/' . $f['id_file']); ?>" class="btn btn-info">Download</a>
                        </div>
                        <div class="col-lg-6">
                            <h4>Panduan Penggunaan Aplikasi</h4>
                            <a href="<?= base_url('download/downloadfile2/' . $f['id_file']); ?>" class="btn btn-info">Download</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Info Panel -->

    <!-- Beranda -->
    <div class="row beranda">
        <div class="col">
            <img src="<?= base_url(); ?>/img/elektro3.jpg" alt="" class="img-fluid gambar-beranda">
        </div>
        <div class="col">
            <h3>Lorem ipsum dolor sit amet.</h3>
        </div>
    </div>
    <!-- End Beranda -->

    </div>
    <!-- End Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>