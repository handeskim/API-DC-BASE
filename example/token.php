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
	
$method = 'card/token'; // method của API//
$array = array(
	'username'=>$username,  // Tên đăng nhập
	'password'=>$password, 	// tài khoản cấp 1
);

$param = $doicard->encrypt(json_encode($array)); // mã hóa dữ liệu
$url = $doicard->create_url($method,$param); /// Tạo url kết nối
$result = $doicard->Sending($url); // gửi lệnh tạo kết nối lên server
$response = json_decode($result); // lấy kết quả trả về 
if($response->status === 1000){ // nếu kết quả trả về thành công
	$token_response = json_decode($doicard->decrypt($response->result)); // giả mã dữ liệu
	if(isset($token_response->token)){
		$token = $token_response->token;  // đây là token của mình
	}
}

echo "Chuỗi mã token là: ".$token;
/// Bạn không chia sẻ token này cho bất kỳ ai. 
/// Token có giá trị vô thời hạn
/// Token này bạn có thể lưu thành session hoặc lưu database dùng lại.

/*Token Check*/
/////kiểm tra token
// $method = 'card/token/check';
// $array = array(
	// 'token' => $token,
// );	
// $param = $doicard->encrypt(json_encode($array)); // mã hóa dữ liệu
// $url = $doicard->create_url($method,$param); /// Tạo url kết nối
// $result = $doicard->Sending($url); // gửi lệnh tạo kết nối lên server
// $response = json_decode($result); // lấy kết quả trả về 
// echo "Kiểm Tra token là: ". $response->token;



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

