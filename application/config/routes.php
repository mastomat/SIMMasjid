<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'c_dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'c_dashboard/index';

$route['kegiatan/list'] = 'c_dashboard/kegiatan_list';
$route['struktur'] = 'c_dashboard/struktur';
$route['struktur/(:any)'] = 'c_dashboard/struktur';
$route['sejarah'] = 'c_dashboard/sejarah';
$route['sejarah/(:any)'] = 'c_dashboard/sejarah';

$route['kontak'] = 'c_dashboard/kontak';
$route['kontak/(:any)'] = 'c_dashboard/kontak';


$route['kegiatan/list/(:any)'] = 'c_dashboard/kegiatan_list/$1';

$route['galeri/list'] = 'c_dashboard/galeri_list';
$route['galeri/list/(:any)'] = 'c_dashboard/galeri_list/$1';
$route['pengumuman/list'] = 'c_dashboard/pengumuman_list';


$route['kegiatan/(:any)'] = 'c_dashboard/kegiatan_view/$1';
$route['pengumuman/(:any)'] = 'c_dashboard/pengumuman_view/$1';

$route['home/(:any)'] = 'c_dashboard/index';


// loginadmin
$route['login'] = 'c_user/index';
$route['logout'] = 'c_user/logout';


// admin \\

$route['k_user/profil'] = 'admin/c_user/profil';
$route['k_user/simpanpw'] = 'admin/c_user/simpanpw';

$route['k_user/simpannama'] = 'admin/c_user/simpannama';
$route['k_user/(:any)'] = 'admin/c_user/$1';
$route['k_jenispemasukan/(:any)'] = 'admin/c_jenispemasukan/$1';
$route['k_pemasukan/(:any)'] = 'admin/c_pemasukan/$1';
$route['k_pemasukan/getdata/(:any)'] = 'admin/c_pemasukan/getdata/$1';
$route['k_pengeluaran/(:any)'] = 'admin/c_pengeluaran/$1';
$route['k_kegiatan/(:any)'] = 'admin/c_kegiatan/$1';
$route['k_pengumuman/(:any)'] = 'admin/c_pengumuman/$1';




$route['k_masjid/(:any)'] = 'admin/c_masjid/$1';
$route['k_galeri/simpanedit'] = 'admin/c_galeri/simpanedit';
$route['k_galeri/showedit'] = 'admin/c_galeri/showedit';
$route['k_galeri/(:any)'] = 'admin/c_galeri/$1';


$route['k_galeri/edit/(:any)'] = 'admin/c_galeri/edit/$1';
$route['k_galeri/deleteimage/(:any)'] = 'admin/c_galeri/deleteimage/$1';
$route['k_galeri/delete/(:any)'] = 'admin/c_galeri/delete/$1';
$route['k_galeri/view/(:any)'] = 'admin/c_galeri/view/$1';
