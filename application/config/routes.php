<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['thong-tin-he-thong'] = "reseller";
$route['nap-ngay'] = "payments";
$route['doi-the-cao'] = "card";
$route['gui-the-cao'] = "card/card_post";
$route['trang-chu'] = "home";
$route['thoat-tai-khoan'] = "exits";
$route['dang-ky'] = "register";
$route['khoi-phuc-mat-khau'] = "register/forgot";
$route['dang-nhap'] = "login";
$route['lien-he'] = "contacts";
$route['giao-dich-thanh-cong'] = "profile/transfer_success/$1";
$route['xac-nhan-giao-dich'] = "profile/transfer_confirm/$1";
$route['chuyen-khoan'] = "profile/transfer/$1";
$route['tai-khoan'] = "reseller/staff";
$route['quan-ly-developer'] = "reseller/developer";
$route['rut-tien'] = "profile/transfer_withdrawal/$1";
$route['nap-ngay/(:any)'] = 'share/share/$1';
$route['thong-tin-ca-nhan'] = "profile";
$route['thong-tin-tai-khoan'] = "profile";
$route['khoi-phuc-ma-bao-mat'] = "profile/activation";
$route['khong-ton-tai-trang'] = "unknown";
$route['loi-truy-cap-trang'] = "unknown";
$route['default_controller'] = "home";
$route['404_override'] = 'unknown';
/* End of file routes.php */
/* Location: ./application/config/routes.php */