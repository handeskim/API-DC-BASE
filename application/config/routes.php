<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['thong-tin-he-thong'] = "reseller";
$route['chiet-khau'] = "deduct";
$route['nap-so-du'] = "payments/pay";
$route['thanh-toan-ngan-luong'] = "payments/pay_nganluong";
$route['nap-tai-khoan'] = "payments";
$route['doi-the-cao'] = "card";
$route['thanh-toan-mua-the'] = "buycard/payments";
$route['mua-the-dien-thoai'] = "buycard/code";
$route['xac-nhan-don-hang'] = "buycard/complete";
$route['mua-the'] = "buycard/buy";
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
$route['cong-tac-vien'] = "publisher/share/(:any)";
$route['publisher/(:any)'] = "publisher/publisher/$1";
$route['kiem-tien/(:any)'] = "publisher/publisher/$1";
$route['tai-khoan'] = "reseller/staff";
$route['quan-ly-developer'] = "reseller/developer";
$route['rut-tien'] = "profile/transfer_withdrawal/$1";
$route['nap-ngay/(:any)'] = 'share/share/$1';
$route['mua-ngay/(:any)'] = 'share/buy/$1';
$route['thong-tin-ca-nhan'] = "profile";
$route['thong-tin-tai-khoan'] = "profile";
$route['khoi-phuc-ma-bao-mat'] = "profile/activation";
$route['khong-ton-tai-trang'] = "unknown";
$route['loi-truy-cap-trang'] = "unknown";
$route['default_controller'] = "home";
$route['404_override'] = 'unknown';
/* End of file routes.php */
/* Location: ./application/config/routes.php */