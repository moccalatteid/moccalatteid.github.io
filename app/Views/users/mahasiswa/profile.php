<?= $this->extend('users/mahasiswa/index'); ?>


<?= $this->section('isi'); ?>

<?php if (session()->getFlashdata('welcome')) :  ?>
    <div class="alert alert-success my-2" role="alert">
        <?= session()->getFlashdata('welcome');  ?>
    </div>
<?php endif;  ?>



<h3>Profile</h3>


<?= $this->endSection(); ?>