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
$route['default_controller'] = 'autentifikasi';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

# Menu API
$route['api/menu'] = 'api/MenuApi/index';
$route['api/menu/id/(:any)'] = 'api/MenuApi/MenuById/$1';
$route['api/menu/promo'] = 'api/MenuApi/MenuPromo';
$route['api/menu/makanan'] = 'api/MenuApi/MenuMakanan';
$route['api/menu/minuman'] = 'api/MenuApi/MenuMinuman';
$route['api/menu/buah'] = 'api/MenuApi/MenuBuah';

#User Member API
$route['api/member/id/(:any)'] = 'api/UserMemberApi/MemberById/$1';
$route['api/member/update/(:any)'] = 'api/UserMemberApi/Update/$1';
$route['api/member/update-password/(:any)'] = 'api/UserMemberApi/Update_password/$1';
$route['api/member/create'] = 'api/UserMemberApi/Create';
$route['api/member/login'] = 'api/UserMemberApi/Login';


# Kerangjang API
$route['api/keranjang/create'] = 'api/Keranjang/Create';
$route['api/keranjang/delete/(:any)'] = 'api/Keranjang/DeleteKeranjang/$1';
$route['api/keranjang/bymember/(:any)'] = 'api/Keranjang/Keranjang_byidmember/$1';
$route['api/keranjang/byid/(:any)'] = 'api/Keranjang/UpdateKeranjang/$1';
$route['api/keranjang/jmlbymember/(:any)'] = 'api/Keranjang/JmlByMember/$1';
$route['api/keranjang/rpbymember/(:any)'] = 'api/Keranjang/RpByMember/$1';

# Pesanan API
$route['api/pesanan/create/(:any)'] = 'api/Pesanan/Create/$1';
$route['api/pesanan/bykode/(:any)'] = 'api/Pesanan/Pesanan_byidkode/$1';
$route['api/dtpesanan/bykode/(:any)'] = 'api/DTPesanan/DTPesanan_byidkode/$1';
