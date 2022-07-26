<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Pages
$routes->get('/', 'Pages::index');
$routes->get('/home', 'Pages::index');
$routes->get('/about', 'Pages::about');

// Auth
$routes->get('/login', 'Login::index');
$routes->get('/login/ceklogin', 'Login::ceklogin');
$routes->get('/logout', 'Login::logout');

// Download
$routes->get('/download/downloadfile2/(:any)', 'Download::downloadFile2/$1');
$routes->get('/download/(:any)', 'Download::download/$1');

// SISFO
$routes->get('/sita', 'Sita::index');

// Mahasiswa
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/mahasiswa/tambah-bimbingan/(:num)', 'Mahasiswa::tambah/$1');
$routes->get('/mahasiswa/bimbingan', 'Mahasiswa::bimbingan');
$routes->get('/mahasiswa/bimbingan/(:num)', 'Mahasiswa::detail/$1');
$routes->get('/mahasiswa/edit-bimbingan/(:num)', 'Mahasiswa::editBimbingan/$1');
$routes->get('/mahasiswa/dailyreport', 'Mahasiswa::dailyreport');
$routes->get('/mahasiswa/dailyreport/(:num)', 'Mahasiswa::detaildailyreport/$1');
$routes->get('/mahasiswa/tambah-daily-report/(:num)', 'Mahasiswa::tambahdailyreport/$1');
$routes->get('/mahasiswa/edit-daily-report/(:num)', 'Mahasiswa::editDailyReport/$1');
$routes->get('/mahasiswa/upload', 'Mahasiswa::upload');
$routes->get('/mahasiswa/upload/(:num)', 'Mahasiswa::fileupload/$1');
$routes->get('/mahasiswa/upload-file/(:num)', 'Mahasiswa::tambahFile/$1');

//Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/bimbingan', 'Admin::bimbingan');
$routes->get('/admin/bimbingan/(:num)', 'Admin::bimbinganThn/$1');
$routes->get('/admin/create-mahasiswa', 'Admin::createMhs');
$routes->get('/admin/create-dosen', 'Admin::createDosen');
$routes->get('/admin/mahasiswa-bimbingan', 'Admin::mhsBimbingan');
$routes->get('/admin/mahasiswa-bimbingan/(:num)', 'Admin::mhsBimbinganTahun/$1');
$routes->get('/admin/kelola-mahasiswa', 'Admin::mahasiswa');
$routes->get('/admin/kelola-mahasiswa/(:num)', 'Admin::mhsTahun/$1');
$routes->get('/admin/kelola-dosen', 'Admin::dosen');
$routes->get('/admin/detail-mahasiswa/(:any)', 'Admin::detailMhs/$1');
$routes->get('/admin/detail-dosen/(:any)', 'Admin::detailDosen/$1');
$routes->get('/admin/tahun-dospem/(:any)', 'Admin::dospem/$1');
$routes->get('/admin/detail-bimbingan/(:any)', 'Admin::detail/$1');
$routes->get('/admin/lembar-bimbingan/(:num)', 'Admin::lembarBimbingan/$1');
$routes->get('/admin/kelola-dosen/(:num)', 'Admin::dosen/$1');
$routes->get('/admin/edit-mahasiswa/(:segment)', 'Admin::editMhs/$1');
$routes->delete('/admin/(:any)', 'Admin::delete/$1');
$routes->get('/admin/dailyreport', 'Admin::dailyreport');
$routes->get('/admin/dailyreport/(:num)', 'Admin::dailyreportThn/$1');
$routes->get('/admin/detail-daily-report/(:any)', 'Admin::detaildailyreport/$1');
$routes->get('/admin/lembar-daily-report/(:num)', 'Admin::lembardailyreport/$1');
$routes->get('/admin/upload', 'Admin::upload');
$routes->get('/admin/upload/(:num)', 'Admin::uploadThn/$1');
$routes->get('/admin/detail-upload/(:any)', 'Admin::detailUpload/$1');
$routes->get('/admin/file-pkl/(:num)', 'Admin::fileUpload/$1');
$routes->get('/admin/export/(:num)', 'Admin::export/$1');
$routes->get('/admin/(:any)/(:any)', 'Admin::tahunDospem/$1/$2');

// Dosen
$routes->get('/dosen', 'Dosen::index');
$routes->get('/dosen/bimbingan', 'Dosen::bimbingan');
$routes->get('/dosen/pembimbing', 'Dosen::pembimbing');
$routes->get('/dosen/bimbingan/(:num)', 'Dosen::tahunMhs/$1');
$routes->get('/dosen/edit-bimbingan/(:num)', 'Dosen::edit/$1');
$routes->get('/dosen/dailyreport', 'Dosen::dailyreport');
$routes->get('/dosen/dailyreport/(:num)', 'Dosen::tahunMhsDaily/$1');
$routes->get('/dosen/upload', 'Dosen::upload');
$routes->get('/dosen/upload/(:num)', 'Dosen::tahunMhsUpload/$1');


















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
