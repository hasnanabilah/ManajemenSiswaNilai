<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| default_controller : controller yang dipanggil saat URL root diakses
| 404_override       : controller pengganti halaman 404 (kosong = default CI)
| translate_uri_dashes : ubah tanda "-" di URL menjadi "_" (FALSE = tidak)
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route eksplisit (opsional, CI3 sudah otomatis memetakan controller/function)
$route['barang'] = 'barang/index';
$route['barang/tambah'] = 'barang/tambah';
