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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//
$route['admin'] = 'admin/Admin/index';
$route['admin/index'] = 'admin/Admin/index';
$route['admin/giris'] = 'admin/Admin/giris_yap';
$route['admin/cikis'] = 'admin/Admin/cikis_yap';
//
$route['default_controller'] = 'Anasayfa';
$route['anasayfa'] = 'Anasayfa/index';
$route['yorum-ekle'] = 'Anasayfa/yorum_ekle/insert';
$route['iletisim'] = 'Piletisim/index';
$route['iletisim/gonder'] = 'Piletisim/brkdndr_form_gonder';
$route['itiraf/(:num)'] = 'Anasayfa/brkdndr_itiraf_icerik/$1';
$route['itiraf/ekle'] = 'Anasayfa/brkdndr_insert';
//
$route['admin/itiraflar'] = 'admin/Pitiraflar/index';
$route['admin/itiraflar/duzenle'] = 'admin/Pitiraflar/update_form';
$route['admin/itiraflar/duzenle/(:any)'] = 'admin/Pitiraflar/update_form/$1';
$route['admin/itiraflar/duzenle/update/(:any)'] = 'admin/Pitiraflar/update/$1';
$route['admin/itiraflar/sil/(:any)'] = 'admin/Pitiraflar/delete/$1';
//
$route['admin/yoneticiler'] = 'admin/Yoneticiler/index';
$route['admin/yoneticiler/ekle'] = 'admin/Yoneticiler/insert_form';
$route['admin/yoneticiler/ekle/insert'] = 'admin/Yoneticiler/insert';
$route['admin/yoneticiler/duzenle'] = 'admin/Yoneticiler/update_form';
$route['admin/yoneticiler/duzenle/(:any)'] = 'admin/Yoneticiler/update_form/$1';
$route['admin/yoneticiler/duzenle/update/(:any)'] = 'admin/Yoneticiler/update/$1';
$route['admin/yoneticiler/sil/(:any)'] = 'admin/Yoneticiler/delete/$1';
//
$route['admin/yorumlar'] = 'admin/Yorumlar/index';
$route['admin/yorumlar/duzenle'] = 'admin/Yorumlar/update_form';
$route['admin/yorumlar/duzenle/(:any)'] = 'admin/Yorumlar/update_form/$1';
$route['admin/yorumlar/duzenle/update/(:any)'] = 'admin/Yorumlar/update/$1';
$route['admin/yorumlar/sil/(:any)'] = 'admin/Yorumlar/delete/$1';
//
$route['admin/ayarlar'] = 'admin/Ayarlar/index';
$route['admin/ayarlar/update'] = 'admin/Ayarlar/update';

//
$route['admin/iletisim'] = 'admin/Piletisim/index';
$route['admin/iletisim/(:num)'] = 'admin/Piletisim/iletisim_icerik/$1';
$route['admin/iletisim/sil/(:any)'] = 'admin/Piletisim/delete/$1';
