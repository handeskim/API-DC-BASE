<?php
define('SERVER_API', 'http://45.77.12.144/');
define('VER', 'API-DOICARD-V1');
///Merchant ID được cấp 
define('secret_key', '7f622888763a74826066f1452c9f5cab'); ///Merchant ID
///Secret key được cấp  Không chia sẻ khóa này////////////////
define('secret_iv', 'u9rc9LC8PWfbQI2xi3Hz+2yOBcAAT5lPYK9wvw6xTvyQ44xRqqDtcLuplDPVvq7ebk70B3fLxHHVmgsjQyTOZMi+/dmWltnAEAXSql0abfeOo2lxPNKuXKl2BlxS6vVYYkLTOTMFWs/kppR+utjqLIkcfpsK732hiIwMJyKpZDhB2fi6F6pz0YR7MxVrVCK8vvyhT1/Vo7pJLrEIli8Ymg==');

$username = 'hoangtam';
$password = '123456';
/*==khởi nạp thư viện*/
$doicard = new Lib();

$method = 'card/buy';
$array = array(
	'keys' => '5b96e28172cfc835908e379e',  // Giá Trị theo Shop XML trả về
	'quantity' => '1', // Max 10 Min 1
	'mobile' => '0912229991', // số điện thoại cần nạp
	'cardprice' => '20000',
	'token' => 'UmQ4NkJYRGlkSmw2NWIrY0k5d3hrNXBGRlhObUtOUURsT1lJSk4ybTRuUlFKcTE5SlRjTVBHZEI5U2VGcTRvd2NtVTNHYkRvdGwzRTc2MlBFcDFFTWRNUU9nQXNFdUxJQkM1VnFZZnBQNXBWODk5RzhFbUpBZWg5YzVLQU1mYnlvNWZHaEw2UXQ1bjZkUEtXQ2oyVklIa3ZjQnYyY2FMVUdIL2VqbnF4U1lRPQ%3D%3D',
);	
$param = $doicard->encrypt(json_encode($array)); // mã hóa dữ liệu
$url = $doicard->create_url($method,$param); /// Tạo url kết nối
$result = $doicard->Sending($url); // gửi lệnh tạo kết nối lên server
$card_result = json_decode($result); // lấy kết quả trả về 
var_dump($card_result);

Class Lib {

function create_url($method,$param){
	$url = SERVER_API.$method;
	$url .= '?'.VER .'='. secret_key;
	$url .= '&param='.$param;
	return $url;
}


function Sending($url){
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result=curl_exec($ch);
	curl_close($ch);
	return $result;
}
///////////// HÀM MÃ HÓA DỮ LIỆU
function encrypt($string) {
	
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash('sha256', secret_key);
	$iv = substr(hash('sha256', secret_iv), 0, 16);
	$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($output);
	return $output;
}
///////////// HÀM GIẢI MÃ DỮ LIỆU
function decrypt($string) {
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$key = hash('sha256', secret_key);
	$iv = substr(hash('sha256', secret_iv), 0, 16);
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	return $output;

}

}

