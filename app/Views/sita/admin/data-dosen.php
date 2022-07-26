<?= $this->extend('sita/index'); ?>

<?= $this->section('isi'); ?>

<div class="container">
   <div class="row">
      <div class="col-12">
         <h3>Daftar Dosen</h3>
         <div class="row">
            <div class="col-6">
               <a href="/admin/create-dosen" class="btn btn-primary">Tambah Dosen
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                     <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                     <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                  </svg>
               </a>
            </div>
         </div>
      </div>
   </div>

   <div class=" row">
      <div class="col">
         <?php if (session()->getFlashdata('gagal')) :  ?>
            <div class="alert alert-danger my-2" role="alert">
               <?= session()->getFlashdata('gagal');  ?>
            </div>
         <?php endif;  ?>
         <?php if (session()->getFlashdata('pesan')) :  ?>
            <div class="alert alert-success my-2" role="alert">
               <?= session()->getFlashdata('pesan');  ?>
            </div>
         <?php endif;  ?>

         <table class="table table-bordered table-striped mt-3">
            <thead style="text-align: center;">
               <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NIP / NIDN</th>
                  <th scope="col">Bidang Keahlian</th>
                  <th scope="col">Gambar</th>
                  <th scope="col-3" colspan"3">Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1 ?>
               <?php foreach ($dosen as $d) : ?>
                  <tr>
                     <th scope="row" style="text-align: center;"><?= $i++;  ?></th>
                     <td><?= $d['nama'];  ?></td>
                     <td style="text-align: center;"><?= $d['nip'];  ?></td>
                     <td style="text-align: center;"><?= $d['bid_keahlian'];  ?></td>
                     <td style="text-align: center;">
                        <img src="<?= base_url();  ?>/img/dosen/<?= $d['gambar'];  ?> " style="width:90px" class="img" alt="">
                     </td>
                     <td style="text-align: center;">
                        <div class="action">
                           <!-- <a href="/admin/edit-dosen/" class="btn btn-warning btn-sm">Edit
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a> -->
                           <a href="/admin/detail-dosen/<?= $d['slug'];  ?>" class="btn btn-info btn-sm">
                              Detail
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                                 <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                                 <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                 <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                              </svg>
                           </a>
                           <a href="/admin/tahun-dospem/<?= $d['slug'];  ?>" class="btn btn-success btn-sm">
                              Dospem
                              <i class="fas fa-chalkboard-teacher"></i>
                           </a>
                        </div>
                     </td>
                  </tr>
               <?php endforeach;  ?>
            </tbody>
         </table>

      </div>
   </div>
</div>

<?= $this->endSection(); ?>