<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<style>
   ul li {
      list-style-type: none;
   }
</style>

<div class="col-xl-3 col-md-6 mb-4">
   <h4>Pilih Tahun Akademik</h4>
   <a href="/admin/kelola-dosen" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-arrow-left"></i></a>
   <?php foreach ($tahun as $t) :  ?>
      <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $t['tahun_akademik']; ?></div>
               </div>
               <div class="col-auto">
                  <a href="/admin/<?= $dosen['slug']; ?>/<?= $t['tahun_akademik'];  ?>" class="btn btn-info"><i class="fas fa-sign-in-alt"></i></a>
               </div>
            </div>
         </div>
      </div>
   <?php endforeach;  ?>
</div>

<?= $this->endSection(); ?>