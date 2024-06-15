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
$routes->post('bookmark/add', 'Pengguna::addBookmark');
$routes->get('pengguna/bukuid/(:num)', 'Pengguna::bukuid/$1');
$routes->get('pengguna/detail_buku', 'Pengguna::detail_buku');


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

