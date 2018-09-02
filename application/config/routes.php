<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['trang-chu'] = "home";
$route['thoat-tai-khoan'] = "exits";
$route['dang-ky'] = "register";
$route['khoi-phuc-mat-khau'] = "register/forgot";
$route['dang-nhap'] = "login";
$route['lien-he'] = "contacts";
$route['giao-dich-thanh-cong'] = "profile/transfer_success/$1";
$route['xac-nhan-giao-dich'] = "profile/transfer_confirm/$1";
$route['chuyen-khoan'] = "profile/transfer/$1";
$route['thong-tin-ca-nhan'] = "profile";
$route['khoi-phuc-ma-bao-mat'] = "profile/activation";
$route['khong-ton-tai-trang'] = "unknown";
$route['loi-truy-cap-trang'] = "unknown";
$route['default_controller'] = "home";
$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */