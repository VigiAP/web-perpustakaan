<?php

namespace Config;


$routes = Services::routes();
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Accounts');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('/Acccounts', 'Accounts::index');
$routes->get('generate-pdf/(:num)', 'PdfController::generatePdf/$1');
$routes->post('bookmark/add', 'BookmarkController::add');
$routes->get('pengguna/bukuid/(:num)', 'Pengguna::bukuid/$1');
$routes->get('pengguna/detail_buku', 'Pengguna::detail_buku');
$routes->get('/bookmark', 'BookmarkController::index');
$routes->get('/bookmark/remove/(:num)', 'BookmarkController::remove/$1');
$routes->post('bookmark/add', 'BookmarkController::add');
$routes->post('bookmark/hapusBookmark/(:num)', 'BookmarkController::hapusBookmark/$1');
$routes->get('bookmark/pengetahuan', 'BookmarkController::bookmarkPengetahuan');
$routes->get('bookmark/novel', 'BookmarkController::bookmarkNovel');
$routes->get('bookmark/lainnya', 'BookmarkController::bookmarkLainnya');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

