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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Register
$routes->get('/register', 'Register::index', ['as' => 'user.register']);
$routes->post('/register/save', 'Register::save', ['as' => 'user.register.save']);
$routes->post('/login/auth', 'Login::authLogin', ['as' => 'user.login.auth']);
$routes->get('/register/verifikasi', 'Register::verifikasi', ['as' => 'user.account.verifikasi']);

// Homepage
$routes->get('/', 'Homepage::index');
$routes->get('/cari', 'Homepage::cari');

$routes->group('', ['filter' => 'redirectlogin'], static function ($routes) {
    // Dashboard User
    $routes->get('/login', 'Login::index', ['as' => 'user.login']);
}); 

//Logged In
$routes->group('user', ['filter' => 'auth'], static function ($routes) {
    // Dashboard User

    $routes->get('dashboard', 'Login::dashboard');
    $routes->get('dashboard/edit', 'Login::dashboardEdit', ['as' => 'user.dashboard.edit']);
    $routes->post('dashboard/edit/(:segment)', 'Login::update/$1', ['as' => 'user.dashboard.update']);

    // Data Anak
    $routes->get('data-anak', 'DataAnak::index', ['as' => 'user.anak.index']);
    $routes->get('data-anak/tambah', 'DataAnak::tambah', ['as' => 'user.anak.add']);
    $routes->post('data-anak/tambah', 'DataAnak::save', ['as' => 'user.anak.save']);
    $routes->get('data-anak/edit/(:segment)', 'DataAnak::edit/$1', ['as' => 'user.anak.edit']);
    $routes->post('data-anak/edit/(:segment)', 'DataAnak::update/$1', ['as' => 'user.dashboard.update']);
    $routes->post('data-anak/delete/(:segment)', 'DataAnak::delete/$1', ['as' => 'user.dashboard.delete']);


    // Scan Barcode
    $routes->get('/scan-barcode', 'ScanBarcode::index');

    // keranjang
    $routes->get('keranjang', 'Keranjang::index', ['as' => 'user.keranjang.index']);
    $routes->post('keranjang/checkout/(:segment)', 'Keranjang::checkout/$1', ['as' => 'user.keranjang.checkout']);
    $routes->post('keranjang/delete/(:segment)', 'Keranjang::delete/$1', ['as' => 'user.keranjang.delete']);

    // lihat antrian
    $routes->get('lihat-antrian', 'LihatAntrian::index', ['as' => 'user.antrian.index']);
    $routes->get('lihat-antrian/cari', 'LihatAntrian::cari', ['as' => 'user.antrian.cari']);
    $routes->post('lihat-antrian/tambah', 'LihatAntrian::tambah', ['as' => 'user.antrian.tambah']);

    // lihat antrian
    $routes->get('checkout', 'Checkout::index', ['as' => 'user.checkout.index']);
    $routes->get('checkout/metode-bayar', 'Checkout::metodeBayar', ['as' => 'user.checkout.method']);
    $routes->get('checkout/bayar', 'Checkout::bayar', ['as' => 'user.checkout.payment']);
    $routes->get('checkout/detail', 'Checkout::detail', ['as' => 'user.checkout.detail']);

    // myOrder
    $routes->get('my-order', 'MyOrder::index', ['as' => 'user.myorder']);

    // logout
    $routes->get('logout', 'Login::logout',['as' => 'user.logout']);

});



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

// // keranjang
// $routes->get('/keranjang', 'Keranjang::index');

// // lihat antrian
// $routes->get('/lihat-antrian', 'LihatAntrian::index');

// // lihat antrian
// $routes->get('/checkout', 'Checkout::index');
// $routes->get('/checkout/metode-bayar', 'Checkout::metodeBayar');
// $routes->get('/checkout/bayar', 'Checkout::bayar');
// $routes->get('/checkout/detail', 'Checkout::detail');

$routes->group('admin', static function ($routes) {
    // Admin
    // Orangtua
    $routes->get('orangtua', 'Admin::orangtuaIndex',['as' => 'admin.orangtua']);
    $routes->post('orangtua/tambah', 'Admin::orangtuaTambah',['as' => 'admin.orangtua.tambah']);
    $routes->get('orangtua/edit/(:segment)', 'Admin::orangtuaEdit/$1', ['as' => 'admin.orangtua.edit']);
    $routes->post('orangtua/edit/(:segment)', 'Admin::orangtuaUpdate/$1',['as' => 'admin.orangtua.update']);

    // Anak
    $routes->get('anak/(:segment)', 'Admin::anakIndex/$1',['as' => 'admin.anak']);
    $routes->post('anak/tambah', 'Admin::anakTambah',['as' => 'admin.anak.tambah']);
    $routes->get('anak/edit/(:segment)', 'Admin::anakEdit/$1', ['as' => 'admin.anak.edit']);
    $routes->post('anak/edit/(:segment)', 'Admin::anakUpdate/$1',['as' => 'admin.anak.update']);

    // Jadwal
    $routes->get('jadwal', 'Admin::jadwalIndex',['as' => 'admin.jadwal']);
    $routes->get('jadwal/detail/(:segment)', 'Admin::jadwalDetail/$1', ['as' => 'admin.jadwal.detail']);

    $routes->post('jadwal/tambah', 'Admin::jadwalTambah',['as' => 'admin.jadwal.tambah']);
    $routes->get('jadwal/edit/(:segment)', 'Admin::jadwalEdit/$1', ['as' => 'admin.jadwal.edit']);
    $routes->post('jadwal/edit/(:segment)', 'Admin::jadwalUpdate/$1',['as' => 'admin.jadwal.jadwal']);

});




// Riwayat Pemesanan
$routes->get('/my-order/riwayat', 'MyOrder::riwayatPemesanan');
$routes->get('/my-order/detail-order', 'MyOrder::detailOrder');

$routes->get('/vouchers', 'Vouchers::index');

$routes->get('/vouchers/detail', 'Vouchers::detail');


