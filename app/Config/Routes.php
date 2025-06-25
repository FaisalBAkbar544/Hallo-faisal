<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------
// ROUTES UTAMA / UMUM
// --------------------
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');

// --------------------
// AUTH & USER
// --------------------
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');

$routes->get('/register', 'Register::index');
$routes->post('/register/submit', 'Register::submit');

// --------------------
// FORMULIR TAMBAHAN (opsional)
// --------------------
$routes->get('/home/formulir', 'Home::form');
$routes->get('/home/formulir/(:any)', 'Home::form/$1');

// --------------------
// PESAN / KONTAK
// --------------------
$routes->get('/pesan', 'Pesan::index');
$routes->post('/pesan/submit', 'Pesan::submit');

// --------------------
// MANAJEMEN TANAMAN
// --------------------
$routes->get('/tanaman', 'Tanaman::index');
$routes->get('/tanaman/tambah', 'Tanaman::tambah');
$routes->post('/tanaman/simpan', 'Tanaman::simpan');
$routes->get('/tanaman/edit/(:num)', 'Tanaman::edit/$1');
$routes->post('/tanaman/update/(:num)', 'Tanaman::update/$1');
$routes->get('/tanaman/filter', 'Tanaman::filter');
$routes->post('tanaman/delete/(:num)', 'Tanaman::delete/$1');


// --------------------
// PERAWATAN TANAMAN
// --------------------
$routes->get('/perawatan/(:num)', 'Perawatan::index/$1');
$routes->post('/perawatan/simpan', 'Perawatan::simpan');

// --------------------
// PANEN & PRODUKSI
// --------------------
$routes->get('/panen', 'Panen::index'); // fallback list panen
$routes->get('/panen/catat/(:num)', 'Panen::catat/$1');
$routes->get('/panen/riwayat/(:num)', 'Panen::riwayat/$1');
$routes->get('/panen/estimasi/(:num)', 'Panen::estimasi/$1');
$routes->get('/panen/distribusi/(:num)', 'Panen::distribusi/$1');

$routes->post('/panen/simpan', 'Panen::simpan');
$routes->post('/panen/simpan_estimasi', 'Panen::simpan_estimasi');
$routes->post('/panen/simpan_distribusi', 'Panen::simpan_distribusi');

// Fitur pemilihan tanaman per jenis fitur
$routes->get('/panen/pilih/(:segment)', 'Panen::pilih/$1');
$routes->get('/panen/(:num)', 'Panen::index/$1');



// --------------------
// KEUANGAN
// --------------------
$routes->get('/keuangan/pengeluaran', 'Keuangan::pengeluaran');
$routes->get('/keuangan/pemasukan', 'Keuangan::pemasukan');
$routes->get('/keuangan/laporan', 'Keuangan::laporan');
$routes->get('/keuangan/grafik', 'Keuangan::grafik');
$routes->get('/keuangan/data-grafik', 'Keuangan::dataGrafik');

$routes->post('/keuangan/simpan_pengeluaran', 'Keuangan::simpan_pengeluaran');
$routes->post('/keuangan/simpan_pemasukan', 'Keuangan::simpan_pemasukan');

// --------------------
// LAPORAN
// --------------------
$routes->get('/laporan/hasil-panen', 'Laporan::panen');
$routes->get('/laporan/keuangan', 'Laporan::keuangan');
$routes->get('/laporan/cetak-pdf', 'Laporan::cetakPDF');
$routes->get('/laporan/cetak-pdf/panen', 'Laporan::cetakPDFPanen');
$routes->get('/laporan/cetak-pdf/keuangan', 'Laporan::cetakPDFKeuangan');


// --------------------
// AKUN & PENGATURAN
// --------------------
$routes->get('/akun/ubah', 'Akun::ubah');        // Ubah Akun
$routes->post('/akun/ubah', 'Akun::prosesUbah');

$routes->get('/akun/profil', 'Akun::profil');    // Ubah Profil
$routes->post('/akun/profil', 'Akun::prosesProfil');

$routes->get('/dash-home', function () {
    return view('dashHome');
});

$routes->get('/dash-contact', function () {
    return view('dashContact');
});


// --------------------
// OPSIONAL: AUTO ROUTE
// --------------------
$routes->setAutoRoute(true); // atau false, jika ingin manual-only routing
