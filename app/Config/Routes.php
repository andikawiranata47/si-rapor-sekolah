<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/welcome', 'Welcome::index',['filter' => 'auth']);

$routes->get('/masteruser', 'MasterUser::index',['filter' => 'auth']);
$routes->get('/kelas', 'Kelas::index',['filter' => 'auth']);
$routes->get('/kelas/naik', 'Kelas::naik',['filter' => 'auth']);
$routes->get('/matapelajaran', 'MataPelajaran::index',['filter' => 'auth']);
$routes->get('/matapelajarankelas', 'MataPelajaranKelas::index',['filter' => 'auth']);
$routes->get('/matapelajarankelas/get', 'MataPelajaranKelas::get',['filter' => 'auth']);
$routes->get('/siswa', 'Siswa::index',['filter' => 'auth']);
$routes->get('/siswakelas', 'SiswaKelas::index',['filter' => 'auth']);
$routes->get('/siswakelas/get', 'SiswaKelas::get',['filter' => 'auth']);

$routes->get('/nilaimatapelajaran', 'NilaiMataPelajaran::index',['filter' => 'auth']);
$routes->get('/nilaimatapelajaran/get', 'NilaiMataPelajaran::get',['filter' => 'auth']);
$routes->get('/nilaiprakerin', 'NilaiPrakerin::index',['filter' => 'auth']);
$routes->get('/nilaiprakerin/get', 'NilaiPrakerin::get',['filter' => 'auth']);
$routes->get('/nilaiekstrakurikuler', 'NilaiEkstrakurikuler::index',['filter' => 'auth']);
$routes->get('/nilaiekstrakurikuler/get', 'NilaiEkstrakurikuler::get',['filter' => 'auth']);
$routes->get('/kepribadian', 'Kepribadian::index',['filter' => 'auth']);
$routes->get('/kepribadian/get', 'Kepribadian::get',['filter' => 'auth']);
$routes->get('/rapor', 'Rapor::index',['filter' => 'auth']);
$routes->get('/rapor/get', 'Rapor::get',['filter' => 'auth']);
$routes->get('/validasirapor', 'ValidasiRapor::index',['filter' => 'auth']);
$routes->get('/rapor/printpdf', 'Rapor::printpdf',['filter' => 'auth']);
// $routes->get('/siswaprakerin', 'SiswaPrakerin::index',['filter' => 'auth']);
// $routes->get('/siswaekstrakurikuler', 'SiswaEkstrakurikuler::index',['filter' => 'auth']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
