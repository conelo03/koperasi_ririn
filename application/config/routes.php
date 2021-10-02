<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['user'] 				    = 'User';
$route['tambah-user'] 	        = 'User/tambah';
$route['edit-user/(:any)'] 	    = 'User/edit/$1';
$route['hapus-user/(:any)']     = 'User/hapus/$1';
$route['setting']			    = 'User/setting';
$route['changes-password']		= 'User/password';

$route['koperasi'] 				    = 'Koperasi';
$route['tambah-koperasi'] 	        = 'Koperasi/tambah';
$route['detail-koperasi/(:any)'] 	    = 'Koperasi/detail/$1';
$route['edit-koperasi/(:any)'] 	    = 'Koperasi/edit/$1';
$route['hapus-koperasi/(:any)']     = 'Koperasi/hapus/$1';

$route['anggota'] 				    = 'Anggota';
$route['tambah-anggota'] 	        = 'Anggota/tambah';
$route['detail-anggota/(:any)'] 	    = 'Anggota/detail/$1';
$route['edit-anggota/(:any)'] 	    = 'Anggota/edit/$1';
$route['hapus-anggota/(:any)']     = 'Anggota/hapus/$1';
$route['status-anggota/(:any)']     = 'Anggota/status/$1';

$route['simpanan-anggota/(:any)'] 				    = 'Anggota/simpanan/$1';
$route['tambah-simpanan/(:any)'] 	        = 'Anggota/tambah_simpanan/$1';
$route['edit-simpanan/(:any)/(:any)'] 	    = 'Anggota/edit_simpanan/$1/$2';
$route['hapus-simpanan/(:any)/(:any)']     = 'Anggota/hapus_simpanan/$1/$2';

$route['penilaian'] 				    = 'Penilaian';
$route['tambah-penilaian'] 	        = 'Penilaian/tambah';
$route['edit-penilaian/(:any)'] 	    = 'Penilaian/edit/$1';
$route['hapus-penilaian/(:any)']     = 'Penilaian/hapus/$1';

$route['rat'] 				    	= 'Rat';
$route['detail-rat/(:any)'] 	        = 'Rat/detail/$1';
$route['dokumen-rat/(:any)/(:any)'] 	= 'Rat/dokumen/$1/$2';
$route['validasi-rat/(:any)/(:any)'] 	= 'Rat/validasi/$1/$2';
$route['validasi-tolak-rat/(:any)/(:any)'] 	= 'Rat/validasi_tolak/$1/$2';
$route['tambah-rat/(:any)'] 	        = 'Rat/tambah/$1';
$route['edit-rat/(:any)/(:any)'] 	    = 'Rat/edit/$1/$2';
$route['hapus-rat/(:any)/(:any)']     = 'Rat/hapus/$1/$2';
$route['hapus-dokumen']     = 'Rat/hapus_dokumen';

$route['penilaian-kesehatan'] 			= 'Penilaian_kesehatan';
$route['detail-penilaian-kesehatan/(:any)'] 			= 'Penilaian_kesehatan/detail/$1';
$route['tambah-penilaian-kesehatan/(:any)'] 			= 'Penilaian_kesehatan/tambah/$1';
$route['edit-penilaian-kesehatan/(:any)/(:any)'] 			= 'Penilaian_kesehatan/edit/$1/$2';
$route['hapus-penilaian-kesehatan/(:any)/(:any)'] 			= 'Penilaian_kesehatan/hapus/$1/$2';

$route['proses-ranking/(:any)'] 			= 'Penilaian_kesehatan/proses_ranking/$1';

$route['laporan-rat'] 			= 'Laporan/rat';
$route['laporan-penilaian'] 	= 'Laporan/penilaian';

$route['detail-laporan-rat/(:any)'] 			= 'Laporan/detail_rat/$1';
$route['detail-laporan-penilaian/(:any)'] 	= 'Laporan/detail_penilaian/$1';

$route['cetak-laporan-rat/(:any)'] 			= 'Laporan/cetak_rat/$1';
$route['cetak-laporan-penilaian/(:any)'] 	= 'Laporan/cetak_penilaian/$1';