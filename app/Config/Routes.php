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
$routes->get('/login/verifikasi/(:segment)', 'Login::verifikasiWhatsapp/$1', ['as' => 'user.login.verifikasi']);
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
    $routes->get('data-anak/scan-barcode/(:segment)', 'ScanBarcode::anak/$1');
    



    // Scan Barcode
    $routes->get('scan-barcode/(:segment)', 'ScanBarcode::index/$1');

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
    // $routes->post('checkout/checkout', 'Checkout::checkout', ['as' => 'user.checkout.checkout']);
    $routes->post('checkout/metode-bayar', 'Checkout::metodeBayar', ['as' => 'user.checkout.method']);
    $routes->post('checkout/setPayment', 'Checkout::setPayment', ['as' => 'user.checkout.setPayment']);
    $routes->get('checkout/bayar', 'Checkout::bayar', ['as' => 'user.checkout.payment']);
    $routes->get('checkout/detail', 'Checkout::detail', ['as' => 'user.checkout.detail']);

    // myOrder
    $routes->get('my-order', 'MyOrder::index', ['as' => 'user.myorder']);
    $routes->get('my-order/invoice/(:segment)', 'Invoice::index/$1');
    $routes->get('my-order/riwayat', 'MyOrder::riwayatPemesanan');
    $routes->post('my-order/notification/(:segment)', 'Notifications::index/$1');
    $routes->get('my-order/detail-order/(:segment)', 'MyOrder::detailOrder/$1', ['as' => 'user.myorder.detail']);

    //Discount
    $routes->get('vouchers', 'Vouchers::index');

    $routes->get('vouchers/detail', 'Vouchers::detail');

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
// $routes->get('/checkout/metode-bayar', 'Checkout::metodeBayar');
// $routes->get('/checkout/bayar', 'Checkout::bayar');
// $routes->get('/checkout/detail', 'Checkout::detail');
$routes->group('admin', ['filter' => 'adminredirect'], static function ($routes) {
    // Dashboard User
    $routes->get('login', 'Admin::login',['as' => 'admin.login']);
    $routes->post('login/post', 'Admin::authLogin',['as' => 'admin.auth.login']);

}); 


$routes->group('admin',['filter' => 'adminauth'], static function ($routes) {
    // Admin



    // Barcode Update Scan
    $routes->get('barcode/scan/(:segment)', 'Admin::scanBarcode/$1',['as' => 'admin.barcode.scan']);
    // Orangtua
    $routes->get('orangtua', 'Admin::orangtuaIndex',['as' => 'admin.orangtua']);
    $routes->post('orangtua/tambah', 'Admin::orangtuaTambah',['as' => 'admin.orangtua.tambah']);
    $routes->get('orangtua/edit/(:segment)', 'Admin::orangtuaEdit/$1', ['as' => 'admin.orangtua.edit']);
    $routes->post('orangtua/edit/(:segment)', 'Admin::orangtuaUpdate/$1',['as' => 'admin.orangtua.update']);

    // Anak
    $routes->get('anak/(:segment)', 'Admin::anakIndex/$1',['as' => 'admin.anak']);
    $routes->post('anak/tambah', 'Admin::anakTambah',['as' => 'admin.anak.tambah']);
    $routes->get('anak/edit/(:segment)', 'Admin::anakEdit/$1', ['as' => 'admin.anak.edit']);
    $routes->get('anak/hadiah/(:segment)', 'Admin::anakHadiah/$1', ['as' => 'admin.anak.hadiah']);
    $routes->post('anak/hadiahTukar/(:segment)', 'Admin::anakHadiahTukar/$1', ['as' => 'admin.anak.hadiah']);
    $routes->post('anak/edit/(:segment)', 'Admin::anakUpdate/$1',['as' => 'admin.anak.update']);

    // Jadwal
    $routes->get('jadwal', 'Admin::jadwalIndex',['as' => 'admin.jadwal']);
    $routes->get('jadwal/detail/(:segment)', 'Admin::jadwalDetail/$1', ['as' => 'admin.jadwal.detail']);

    $routes->post('jadwal/tambah', 'Admin::jadwalTambah',['as' => 'admin.jadwal.tambah']);
    $routes->get('jadwal/edit/(:segment)', 'Admin::jadwalEdit/$1', ['as' => 'admin.jadwal.edit']);
    $routes->post('jadwal/edit/(:segment)', 'Admin::jadwalUpdate/$1',['as' => 'admin.jadwal.jadwal']);
    $routes->post('jadwal/delete/(:segment)', 'Admin::jadwalDelete/$1',['as' => 'admin.jadwal.delete']);

    // Produk
    $routes->get('produk', 'Admin::produkIndex',['as' => 'admin.produk']);
    $routes->post('produk/tambah', 'Admin::produkTambah',['as' => 'admin.produk.tambah']);
    $routes->get('produk/edit/(:segment)', 'Admin::produkEdit/$1', ['as' => 'admin.produk.edit']);
    $routes->post('produk/edit/(:segment)', 'Admin::produkUpdate/$1',['as' => 'admin.produk.update']);

    // reservasi
    $routes->get('reservasi', 'AdminReservasi::reservasiIndex',['as' => 'admin.reservasi']);
    $routes->get('reservasi/detail/(:segment)', 'AdminReservasi::reservasiDetail/$1',['as' => 'admin.reservasi.detail']);
    $routes->get('reservasi/tambah', 'AdminReservasi::reservasiTambah',['as' => 'admin.reservasi.tambah']);

    // cariReservasi
    $routes->get('reservasi/cari/ortu', 'AdminReservasi::reservasiCariOrtu',['as' => 'admin.reservasi.cariOrtu']);
    $routes->get('reservasi/cari/ortuInput', 'AdminReservasi::reservasiOrtuInput',['as' => 'admin.reservasi.ortuInput']);
    
    $routes->post('reservasi/cari/anakInput', 'AdminReservasi::reservasiAnakInput',['as' => 'admin.reservasi.anakInput']);
    $routes->post('reservasi/cari/layananInput', 'AdminReservasi::reservasiLayananInput',['as' => 'admin.reservasi.layananInput']);
    $routes->post('reservasi/cari/kategoriInput', 'AdminReservasi::reservasiKategoriInput',['as' => 'admin.reservasi.kategoriInput']);

    $routes->post('reservasi/cari/produkInput', 'AdminReservasi::reservasiProdukInput',['as' => 'admin.reservasi.produkInput']);
    $routes->post('reservasi/cari/jamInput', 'AdminReservasi::reservasiJamInput',['as' => 'admin.reservasi.jamInput']);

    $routes->post('reservasi/simpanSementara', 'AdminReservasi::reservasiSimpanSementara',['as' => 'admin.reservasi.simpanSementara']);
    $routes->post('reservasi/hapusDetail', 'AdminReservasi::reservasiHapusDetail',['as' => 'admin.reservasi.hapusDetail']);

    $routes->post('reservasi/selesai', 'AdminReservasi::selesai',['as' => 'admin.reservasi.selesai']);

    $routes->get('my-order/invoice/(:segment)', 'Invoice::admin/$1');


    // Operator
    $routes->get('operator', 'Admin::operatorIndex',['as' => 'admin.operator']);
    $routes->post('operator/tambah', 'Admin::operatorTambah',['as' => 'admin.operator.tambah']);
    $routes->get('operator/edit/(:segment)', 'Admin::operatorEdit/$1', ['as' => 'admin.operator.edit']);
    $routes->post('operator/edit/(:segment)', 'Admin::operatorUpdate/$1',['as' => 'admin.operator.update']);
    $routes->post('operator/delete/(:segment)', 'Admin::operatorDelete/$1',['as' => 'admin.operator.delete']);

    // Diskon
    $routes->get('diskon', 'Admin::diskonIndex',['as' => 'admin.diskon']);
    $routes->post('diskon/tambah', 'Admin::diskonTambah',['as' => 'admin.diskon.tambah']);
    $routes->get('diskon/edit/(:segment)', 'Admin::diskonEdit/$1', ['as' => 'admin.diskon.edit']);
    $routes->post('diskon/edit/(:segment)', 'Admin::diskonUpdate/$1',['as' => 'admin.diskon.update']);
    $routes->post('diskon/delete/(:segment)', 'Admin::diskonDelete/$1',['as' => 'admin.diskon.delete']);

    // Point Setting
    $routes->get('point', 'AdminPoint::index',['as' => 'admin.point']);
    $routes->post('point/tambah', 'AdminPoint::tambah',['as' => 'admin.point.tambah']);
    $routes->get('point/edit/(:segment)', 'AdminPoint::edit/$1', ['as' => 'admin.point.edit']);
    $routes->post('point/edit/(:segment)', 'AdminPoint::update/$1',['as' => 'admin.point.update']);
    $routes->post('point/delete/(:segment)', 'AdminPoint::delete/$1',['as' => 'admin.point.delete']);

    // Hadiah
    $routes->get('hadiah', 'AdminHadiah::index',['as' => 'admin.hadiah']);
    $routes->post('hadiah/tambah', 'AdminHadiah::tambah',['as' => 'admin.hadiah.tambah']);
    $routes->get('hadiah/edit/(:segment)', 'AdminHadiah::edit/$1', ['as' => 'admin.hadiah.edit']);
    $routes->post('hadiah/edit/(:segment)', 'AdminHadiah::update/$1',['as' => 'admin.hadiah.update']);
    $routes->post('hadiah/delete/(:segment)', 'AdminHadiah::delete/$1',['as' => 'admin.hadiah.delete']);

    // History Penukaran
    $routes->get('histori', 'Admin::historiIndex',['as' => 'admin.histori']);

    // Spin
    $routes->get('data-anak/spin/(:segment)', 'Spin::index/$1');
    $routes->post('postSpin', 'Spin::postData');
    $routes->get('indexData', 'Spin::indexData');
    $routes->get('poinDetail', 'Spin::detailPoin');

    $routes->get('logout', 'Admin::logout',['as' => 'admin.logout']);

});


    // Riwayat Pemesanan


