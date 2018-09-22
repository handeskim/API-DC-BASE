<?php
class Register extends MY_Controller{
	function __construct(){
		
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->publisher = null;
		$this->partner = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->GlobalMD->_token();
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$token_session = $this->session->userdata('token_session');
		if($token_session){  redirect(base_url('thong-tin-ca-nhan.html'));}
	}
	
	public function index(){
		session_destroy();
		$this->session->sess_destroy();
		$this->session->unset_userdata('data_user');
		$this->session->unset_userdata('token_session');
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'register', 'dynx_totalvalue' => 0 );
		if(!empty($_GET['pub'])){ $this->data['pub'] = $_GET['pub'];}
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/adson/faq_box',$this->data);
		$this->parser->parse('default/adson/new_box',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/Index_Layout_Register',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	
	public function signup(){
			if(isset($_POST['is_register'])){ if($_POST['is_register'] == 'on'){
					$p = $_POST;
					if(!empty($p['email'])){
					if(!empty($p['username'])){
					if(!empty($p['password'])){
					if(!empty($p['password_duplicate'])){
					if($p['password'] === $p['password_duplicate']){
					if(!empty($p['full_name'])){
					if(!empty($p['phone'])){
						$p['auth'] = random_pas();
						$this->Prosesser($p);
					}else{ echo $this->confirm('vui lòng điền số điện thoại thiếu'); }
					}else{ echo $this->confirm('vui lòng điền họ và tên thiếu'); }
					}else{ echo $this->confirm('mật khẩu không giống nhau'); }
					}else{ echo $this->confirm('xác nhận mật khẩu thiếu'); }
					}else{ echo $this->confirm('mật khẩu thiếu'); }
					}else{ echo $this->confirm('tên đăng nhập thiếu'); }
					}else{ echo $this->confirm('email nhập thiếu'); }
			}else{ echo $this->confirm('Lỗi đăng ký'); }
		}
	}
	public function confirm($msg){
		return '<script> confirm("'.$msg.'"); window.location.href = "'.base_url('dang-ky.html').'"; </script>';
	}
	public function Prosesser($p){
		
		$this->param = array(
			'token'=> $this->_token,
			'email'=> (string)$p['email'],
			'password'=> (string)$p['password'],
			'username'=> (string)$p['username'],
			'auth'=> (string)$p['auth'],
			'full_name'=> (string)$p['full_name'],
			'phone'=> (string)$p['phone'],
		);
		if(!empty($p['publisher'])){ $this->param['partner'] = $p['publisher']; } 
		$this->obj = $this->GlobalMD->query_result('api/user/create',$this->param);
		if(!empty($this->obj)){
			if($this->obj->status == '1000'){
				$this->obj = $this->GlobalMD->_result($this->obj);
				$obj = json_decode($this->obj);
				if(!empty($obj[0])){
					$client_id = getObjectId($obj[0]);
					if(!empty($client_id)){
						$this->sendemailPassAuth($p);
						$this->load_session($client_id);
					}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
				}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
			}else{
				echo $this->confirm($this->obj->msg);
			}
		}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
	}
	public function sendemailPassAuth($info_clients){
		
		$body = '<p> Bạn đã đăng ký thành công tài khoản trên hệ thống: </p></br>';
		$body .= '<p> Mật khẩu cấp 2 của bạn là: '. $info_clients['auth'] .'</p></br>';
		$body .= '<p> Mật khẩu cấp 2 để bạn thực hiện giao dịch chuyển tiền. lưu ý không tiết lộ mật khẩu cấp 2 nhằm đảm bảo an toàn cho tài khoản của bạn</p>';
		$subject = 'Đăng ký thành công tài khoản trên hệ thống '.base_url();
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host']    =  $this->data['smtp_host'];
		$config['smtp_port']    =  $this->data['smtp_port'];
		$config['smtp_crypto'] = 	$this->data['smtp_crypto'];
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    =  $this->data['smtp_user'];
		$config['smtp_pass']    = $this->data['smtp_password']; 
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = TRUE; 
		$this->email->initialize($config);
		$this->email->from($this->session->userdata('email_brand'));
		$this->email->to($info_clients['email']);
		$this->email->subject($subject);
		$this->email->message($body);
		if($this->email->send()==true){
			return true;
		}else{
			return false;
		}
			
	}
	public function load_session($client_id){
		$this->param = array( 'client_id'=>$client_id, );
		$client_info = $this->GlobalMD->query_global('api/user/info',$this->param);
		if(!empty($client_info)){
			$p = json_decode($client_info);
			$data_user = convert_obj($p[0]);
			if(!empty($data_user)){
				$this->session->set_userdata(array('data_user'=>$data_user));
				$this->session->set_userdata(array('token_session'=>true));
				redirect(base_url('thong-tin-ca-nhan.html'));
				if(!empty($set)){
						redirect(base_url('thong-tin-ca-nhan.html'));
				}else{ echo $this->confirm('vui lòng đăng nhập bằng tài khoản vừa đăng ký, nếu hệ thống không tự chuyển'); } 
			}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
		}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
	}
	
	
}
?>