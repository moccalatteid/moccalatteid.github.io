<?= $this->extend('users/admin/index'); ?>



<?= $this->section('isi'); ?>

<?php if (session()->getFlashdata('welcome')) :  ?>
    <div class="alert alert-success my-2" role="alert">
        <?= session()->getFlashdata('welcome');  ?>
    </div>
<?php endif;  ?>

<h1>Ini Dashboard</h1>



<!-- // d(password_hash('akuntansi', PASSWORD_DEFAULT));

// $hash = '$2y$10$JdsdUtq.AhGB49qcsAuo.eIWW4EMZBS4YukE0hau07JhEHbcr2YGq';

// if (password_verify('akuntansi', $hash)) {
//     echo "Password Sama";
// } else {
//     echo "password Salah";
// } -->




<?= $this->endSection(); ?>