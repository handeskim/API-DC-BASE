<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(! function_exists('getObjectId')){
	function getObjectId($param) {
		return $param->{'$id'};
	}
}

if(! function_exists('ClientID')){
	function ClientID($param) {
			if(!empty($param["_id"]['$id'])){
					return $param["_id"]['$id'];
			}else{
				return false;
			}
	}
}
if(! function_exists('convert_obj')){
	function convert_obj($param) {
		return json_decode(json_encode($param), true);;
	}
}
if(! function_exists('handesk_encode')){
  function handesk_encode($str){
    $encode_str = urlencode(base64_encode(core_encrypt($str)));
   return $encode_str;
  }
}
if(! function_exists('handesk_decode')){
  function handesk_decode($str){
    $decode_str = core_decrypt(base64_decode(urldecode($str)));
    return $decode_str;
  }
}
/////////////////////////////////////
if(! function_exists('encrypt_obj')){
	function encrypt_obj($string,$secret_key,$secret_iv) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
		return $output;
	}
}
/////////////////////////////////////
if(! function_exists('decrypt_obj')){
	function decrypt_obj($string,$secret_key,$secret_iv) {
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$key = hash('sha256', $secret_key);
		$iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		return $output;

	}
}
/////////////////////////////////////
if(! function_exists('encrypt_key')){
	function encrypt_key($string,$key){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->encode($string,$key);
	}
}
/////////////////////////////////////
if(! function_exists('decrypt_key')){
	function decrypt_key($string,$key){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->decode($string,$key);
	}
}
if(! function_exists('microsecond')){
	function microsecond() {
		 $ts = gettimeofday(true);
		 $ts = sprintf("%.5f", $ts);
		 $s = strftime("%Y-%m-%dT%H:%M:%S", $ts);
		return $s; 
	}
}

/////////////////////////////////////
if(! function_exists('core_token_csrf')){
	function core_token_csrf(){
		$ci = &get_instance();
			return $ci->security->get_csrf_hash();
	}
}
/////////////////////////////////////
if(! function_exists('core_csrf_name')){
	function core_csrf_name(){
		$ci = &get_instance();
			return $ci->security->get_csrf_token_name();
	}
}
/////////////////////////////////////
if(! function_exists('core_encrypt')){
	function core_encrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->encode($string);
	}
}
/////////////////////////////////////
if(! function_exists('core_decrypt')){
	function core_decrypt($string){
		$ci = &get_instance();
		$ci->load->library('encrypt');
			return $ci->encrypt->decode($string);
	}
}

/////////////////////////////////////
if ( ! function_exists('create_ssl')){
	function create_ssl($dn,$name_file) {
		$configs = array(
				"digest_alg" => "sha512",
				"private_key_bits" => 4096,
				"private_key_type" => OPENSSL_KEYTYPE_RSA,
		);
		$path = fpath_ssl();
		$name_token = random_name_ssl();
		$name_path_key_ssl = $path.'/'.$name_file.'.key';
		$name_path_crt_ssl = $path.'/'.$name_file.'.crt';
		$name_path_csr_ssl = $path.'/'.$name_file.'.csr';
		$privkey = openssl_pkey_new($configs);
		$csr = openssl_csr_new($dn, $privkey);
		$sscert = openssl_csr_sign($csr, null, $privkey, 365);
		$key_ssl = openssl_pkey_export_to_file($privkey, $name_path_key_ssl,NULL);
		$crt_ssl = openssl_x509_export_to_file($sscert,  $name_path_crt_ssl,  FALSE);
		$csr_ssl = openssl_csr_export_to_file($csr, $name_path_csr_ssl);
		$response = array(
			'key_ssl' => array($key_ssl,$name_path_key_ssl),
			'crt_ssl' => array($crt_ssl,$name_path_crt_ssl),
			'csr_ssl' => array($csr_ssl,$name_path_csr_ssl),
			'dn' => $dn,
		);
		return $response;
	}
}
if ( ! function_exists('fpath_ssl')){
	function fpath_ssl() {
			$dir = FCPATH .'certificate/crt_ssl/'.date('Ymd');
			if(!is_dir($dir)){
			umask(0);
			mkdir($dir, 0777, true);
				return $dir;
			}else{
				umask(0);
					return $dir;
			}
	}
}
 if(! function_exists('random_auth')){
    function random_auth(){
		$length = 5;
		$lengthc = 3;
		$randoms = substr(str_shuffle("012345678@#9ABCDEFGHIJKL$#@MNOPQRSTU@#VWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = md5(sha1($randomc.$randoms));
		return $username;
    }
  }
 if(! function_exists('random_name_ssl')){
    function random_name_ssl(){
		$length = 18;
		$lengthc = 12;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = md5(sha1("SSL_SIGN_UGROUPS-".$randomc.time().$randoms));
		return $username;
    }
  }
   if(! function_exists('random_name_text')){
    function random_name_text(){
		$length = 18;
		$lengthc = 12;
		$randoms = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$randomc = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $lengthc);
		$username = md5(sha1("text_save_".$randomc.time().$randoms));
		return $username;
    }
  }
	if(! function_exists('ssl_encrypt')){
		///////////////////// Mã hoá SSL dùng file .key để mã hoá ///////////////
    function ssl_encrypt($priv_key,$string){
			$res = openssl_get_privatekey($priv_key,null);
			openssl_private_encrypt($string,$crypttext,$res);
			return $crypttext;
    }
  }
	if(! function_exists('ssl_decrypt')){ 
		////////////////// Giải Mã SSL Dùng File .crt để Giải mã //////////////
    function ssl_decrypt($pub_key,$string){
			openssl_get_publickey($pub_key);
			openssl_public_decrypt($string,$decrypttext,$pub_key);
			return $decrypttext;
    }
  }
	if(! function_exists('ssl_read_file')){
    function ssl_read_file($file_name){
			$fps=fopen ($file_name,"r");
			$pub_key=fread($fps,8192);
			fclose($fps);
			return $pub_key;
    }
  }
//////////////////////////////////////
