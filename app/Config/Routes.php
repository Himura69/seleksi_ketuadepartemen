<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route untuk dashboard sebagai halaman utama
$routes->get('/', function() {
    return view('seleksi/dashboard');
});

// Route untuk seleksi dan fitur lainnya
$routes->get('/seleksi', 'Seleksi::index');
$routes->get('/seleksi/hitungSAW', 'Seleksi::hitungSAW');
$routes->get('/seleksi/createAlternatif', 'Seleksi::createAlternatif');
$routes->post('/seleksi/storeAlternatif', 'Seleksi::storeAlternatif');
$routes->get('/seleksi/editAlternatif/(:num)', 'Seleksi::editAlternatif/$1');
$routes->post('/seleksi/updateAlternatif/(:num)', 'Seleksi::updateAlternatif/$1');
$routes->get('/seleksi/deleteAlternatif/(:num)', 'Seleksi::deleteAlternatif/$1');
$routes->get('/seleksi/editNilai/(:num)', 'Seleksi::editNilai/$1');
$routes->post('/seleksi/updateNilai/(:num)', 'Seleksi::updateNilai/$1');
$routes->get('/seleksi/deleteNilai/(:num)', 'Seleksi::deleteNilai/$1');
$routes->get('/seleksi/kriteria', 'Seleksi::kriteria');
$routes->get('/seleksi/createKriteria', 'Seleksi::createKriteria');
$routes->post('/seleksi/storeKriteria', 'Seleksi::storeKriteria');
$routes->get('/seleksi/editKriteria/(:num)', 'Seleksi::editKriteria/$1');
$routes->post('/seleksi/updateKriteria/(:num)', 'Seleksi::updateKriteria/$1');
$routes->get('/seleksi/deleteKriteria/(:num)', 'Seleksi::deleteKriteria/$1');
$routes->get('/seleksi/normalisasi', 'Seleksi::normalisasi');

// Route opsional untuk tetap bisa mengakses dashboard
$routes->get('/dashboard', function() {
    return view('seleksi/dashboard');
});
