<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->include('layout/style');  ?>

    <title><?= $title;  ?></title>


</head>

<style>
    .jumbotron {
        background-image: url("<?= base_url(); ?>/img/jumbotron.png");
    }
</style>

<body>


    <?= $this->include('layout/navbar');  ?>


    <?= $this->renderSection('content');  ?>



    <?= $this->include('layout/js');  ?>



</body>

</html>