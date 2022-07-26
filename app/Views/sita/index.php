 <?= $this->extend('/templates/sita/index'); ?>

 <?= $this->section('content'); ?>

 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/sita">
             <div class="sidebar-brand-icon">
                 <img src="<?= base_url();  ?>/img/logo_elektro.png" width="45px">
             </div>
             <div class="sidebar-brand-text">SISFO PKL</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Divider -->
         <hr class="sidebar-divider">

         <?php if (session()->get('role') == 'Admin') {  ?>
             <li class="nav-item">
                 <a class="nav-link" href="/sita">
                     <i class="fas fa-fw fa-user"></i>
                     <span>My Profile</span></a>
             </li>

             <hr class="sidebar-divider">

             <!-- Heading -->
             <div class="sidebar-heading">
                 <i class="bi bi-people"></i>
                 Kelola User
             </div>
             <li class="nav-item">
                 <a href="/admin/kelola-mahasiswa" class="nav-link collapsed">
                     <span><i class="fas fa-fw fa-user-graduate"></i>Mahasiswa</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="/admin/kelola-dosen" class="nav-link collapsed">
                     <span><i class="fas fa-fw fa-user-tie"></i>Dosen</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="/admin/mahasiswa-bimbingan">
                     <span><i class="fas fa-fw fa-chalkboard-teacher"></i>Tambah Mahasiswa Bimbingan</span>
                 </a>
             </li>

             <hr class="sidebar-divider">

             <div class="sidebar-heading">
                 Bimbingan PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/admin/bimbingan">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Bimbingan</span></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="/admin/dailyreport">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Daily Report Activity</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Upload File PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/admin/upload">
                     <i class="fas fa-fw fa-upload"></i>
                     <span>Upload File dan Laporan PKL</span></a>

             </li>

         <?php } else if (session()->get('role') == 'Mahasiswa') { ?>

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Profile
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/sita">
                     <i class="fas fa-user"></i>
                     <span>My Profile</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Bimbingan PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/mahasiswa/bimbingan">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Bimbingan</span></a>

             </li>
             <li class="nav-item">
                 <a class="nav-link" href="/mahasiswa/dailyreport">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Daily Report Activity</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Upload File PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/mahasiswa/upload">
                     <i class="fas fa-fw fa-upload"></i>
                     <span>Upload File dan Laporan PKL</span></a>

             </li>

         <?php } else { ?>

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Profile
             </div>
             <li class="nav-item">
                 <a class="nav-link active" href="/sita">
                     <i class="fas fa-user"></i>
                     <span>My Profile</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Bimbingan PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/dosen/bimbingan">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Bimbingan</span></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="/dosen/dailyreport">
                     <i class="fas fa-fw fa-table"></i>
                     <span>Daily Report Activity</span></a>
             </li>

             <!-- Divider -->
             <hr class="sidebar-divider d-none d-md-block">

             <div class="sidebar-heading">
                 <i class="bi bi-table"></i>
                 Upload File PKL
             </div>
             <li class="nav-item">
                 <a class="nav-link" href="/dosen/upload">
                     <i class="fas fa-fw fa-upload"></i>
                     <span>Upload File dan Laporan PKL</span></a>

             </li>

         <?php }  ?>

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>

                 <!-- Topbar Navbar -->
                 <ul class="navbar-nav ml-auto">
                     <?php if (session()->get('role') == 'Dosen') {  ?>
                         <li class="nav-item dropdown no-arrow mx-1">
                             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fas fa-bell fa-fw"></i>
                                 <?php if ($wait < 1) { ?>
                                     <!-- Counter - Alerts -->
                                     <span style="display: none;" class="badge badge-danger badge-counter"><?= $wait; ?> </span>
                                 <?php } else { ?>
                                     <span class="badge badge-danger badge-counter"> <?= $wait; ?> </span>
                                 <?php }  ?>
                             </a>

                             <!-- Dropdown - Alerts -->
                             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                 <h6 class="dropdown-header">
                                     Notifikasi Masuk - <?= $dosen['nama'];  ?>
                                 </h6>
                                 <?php if (empty($notif)) {  ?>
                                     <p style="text-align: center; margin-top:10px;">Belum Ada Notif</p>
                                 <?php } else {  ?>
                                     <?php foreach ($notif as $n) : ?>
                                         <a class="dropdown-item d-flex align-items-center" href="/dosen/edit-bimbingan/<?= $n['id_bimbingan'];  ?>">
                                             <div class="mr-3">
                                                 <div class="icon-circle bg-primary">
                                                     <i class="fas fa-file-alt text-white"></i>
                                                 </div>
                                             </div>

                                             <div>
                                                 <div class="small text-gray-500"><?= $n['tanggal'];  ?></div>
                                                 <span><?= $n['nama_mhs'];  ?> - Pembimbing <?= $n['pembimbing'];  ?></span>
                                                 <br>
                                                 <span style="color: red;">Waiting</span>
                                             </div>

                                         </a>
                                     <?php endforeach;  ?>
                                 <?php }  ?>
                                 <a class="dropdown-item text-center small text-gray-500" href="/sita/notif">Show All</a>
                             </div>
                         </li>
                     <?php }   ?>

                     <div class="topbar-divider d-none d-sm-block"></div>

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <?php if (session()->get('role') == 'Admin') {  ?>
                                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nama'];  ?></span>
                                 <img class="img-profile rounded-circle" src="<?= base_url();  ?>/img/<?= $admin['gambar'];  ?>">
                             <?php } else if (session()->get('role') == 'Mahasiswa') {  ?>
                                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_mhs'];  ?></span>
                                 <img class="img-profile rounded-circle" src="<?= base_url();  ?>/img/mahasiswa/<?= $user['gambar_mhs'];  ?>">
                             <?php } else {  ?>
                                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dosen['nama'];  ?></span>
                                 <img class="img-profile rounded-circle" src="<?= base_url();  ?>/img/dosen/<?= $dosen['gambar'];  ?>">
                             <?php }  ?>
                         </a>
                         <!-- Dropdown - User Information -->
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                             <!-- <a class="dropdown-item" href="#">
                                 <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Ganti Password
                             </a> -->

                             <div class="dropdown"></div>
                             <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                         </div>
                     </li>

                 </ul>

             </nav>
             <!-- End of Topbar -->

             <!-- Begin Page Content -->


             <div class="container-fluid">

                 <?= $this->renderSection('isi'); ?>
             </div>


             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->

         <!-- Footer -->
         <footer class="sticky-footer bg-white">
             <div class="container my-auto">
                 <div class="copyright text-center my-auto">
                     <span>Copyright &copy; SISFO PKL - <?= date('Y');  ?></span>
                 </div>
             </div>
         </footer>
         <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

 </div>


 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Logout?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="/logout">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <?= $this->endSection(); ?>