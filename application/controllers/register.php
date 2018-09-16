<?php
class Register extends MY_Controller{
	function __construct(){
		
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
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
					if(!empty($p['auth'])){
					if(!empty($p['auth_duplicate'])){
					if($p['auth'] === $p['auth_duplicate']){
					if(!empty($p['full_name'])){
					if(!empty($p['phone'])){
					// $recaptcha = $p['g-recaptcha-response'];
					// $response = $this->recaptcha->verifyResponse($recaptcha);
					// if(isset($response['success'])){
					// if($response['success']==true){
					$this->Prosesser($p);
					
					// }else{ echo $this->confirm('vui lòng điền recaptcha'); }
					// }else{ echo $this->confirm('vui lòng điền recaptcha '); }
					}else{ echo $this->confirm('vui lòng điền số điện thoại thiếu'); }
					}else{ echo $this->confirm('vui lòng điền họ và tên thiếu'); }
					}else{ echo $this->confirm('Mật khẩu cấp 2 không giống nhau'); }
					}else{ echo $this->confirm('xác nhận mật khẩu cấp 2 thiếu'); }
					}else{ echo $this->confirm('điền mật khẩu cấp 2 thiếu' ); }
					}else{ echo $this->confirm('mật khẩu không giống nhau'); }
					}else{ echo $this->confirm('xác nhận mật khẩu thiếu'); }
					}else{ echo $this->confirm('mật khẩu thiếu'); }
					}else{ echo $this->confirm('tên đăng nhập thiếu'); }
					}else{ echo $this->confirm('email nhập thiếu'); }
			}else{ echo $this->confirm('Lỗi đăng ký'); }
		}
	}
	public function confirm($msg){
		return '<script> confirm("'.$msg.'"); window.location.href = "'.base_url('đăng ký.html').'"; </script>';
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
		$this->obj = $this->GlobalMD->query_global('api/user/create',$this->param);
		if(!empty($this->obj)){
				$obj = json_decode($this->obj);
				if(!empty($obj[0])){
					$client_id = getObjectId($obj[0]);
					if(!empty($client_id)){
						$this->load_session($client_id);
					}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
				}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
		}else{ echo $this->confirm('đăng ký thất bại vui lòng thử lại'); } 
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