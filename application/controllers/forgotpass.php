<?php
class Forgotpass extends MY_Controller{
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
		if(!empty($_POST)){
			$p = $_POST;
			if(!empty($p['email'])){
				$email = $p['email'];
				$info_clients = $this->_load_info_clients($email);
				if(!empty($info_clients)){
					$this->forgot($info_clients);
				}else{ $this->confirm('lỗi, không tồn tại dữ liệu người dùng');}
			}else{ $this->confirm('lỗi, không tồn tại dữ liệu email');}
		}else{ $this->confirm('lỗi, không tồn tại dữ liệu');}
	}
	public function confirm($msg){
		// echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('dang-ky.html').'";</script>';
		$this->data['msg'] = $msg;
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/Index_Forgotpass',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	private function _load_info_clients($email){
		$this->obj['email'] = $email;
		$this->result = $this->GlobalMD->pquery_result('apps/site/info_client_fogot',$this->obj);
		if(!empty($this->result->result)){
			return $this->result->result;
		}else{ return array();}
	}
	public function activation(){
		if(!empty($_GET['key_verify'])){
				$key_activation = json_decode(handesk_decode($_GET['key_verify']));
				if(isset($key_activation)){
					if(!empty($key_activation->time_active)){
							$time_key = (int)$key_activation->time_active;
							if(time() <= $time_key){
								if(!empty($key_activation->password_new)){
								$this->obj['token'] = $this->_token;
								$this->obj['client_id'] = (string)$key_activation->client_id;
								$this->obj['password'] = (string)$key_activation->password_new;
								$client_info = $this->GlobalMD->query_global('api/user/Passwdupdate',$this->obj);
								if(!empty($client_info)){
									$p = json_decode($client_info);
										if($p[0]==true){
												$this->data['password_new'] = $key_activation->password_new;
												$this->parser->parse('default/header',$this->data);
												$this->parser->parse('default/header-top',$this->data);
												$this->parser->parse('default/adson/header_top',$this->data);
												$this->parser->parse('default/adson/header_nav',$this->data);
												$this->parser->parse('default/col/start-main',$this->data);
												$this->parser->parse('default/col/col-3-start',$this->data);
												$this->parser->parse('default/adson/support',$this->data);
												$this->parser->parse('default/col/col-end',$this->data);
												$this->parser->parse('default/col/col-9-start',$this->data);
												$this->parser->parse('default/layout/Index_Forgotpass',$this->data);
												$this->parser->parse('default/col/col-end',$this->data);
												$this->parser->parse('default/col/end-main',$this->data);
												$this->parser->parse('default/footer',$this->data);
										}else{ $this->confirm('Cập nhập thất bại'); }
									}else{ $this->confirm('Cập nhập thất bại'); }
								}else{ $this->confirm('Cập nhập thất bại'); }
							}else{$this->confirm('key hết hạn vui lòng thử lại');}
					}else{$this->confirm('Sai key vui lòng thử lại');}
				}else{$this->confirm('Sai key vui lòng thử lại');}
		}
	}
	public function forgot($info_clients){
		
		$this->obj['time_active'] = time() + 72000;
		$this->obj['token'] = $this->_token;
		$this->obj['client_id'] = getObjectID($info_clients->_id);
		$this->obj['password_new'] = random_pas();
		$key_verify = handesk_encode(json_encode($this->obj));
		$body = '<p> Ai đó Yêu cầu thay đổi mật khẩu của bạn trên hệ thống '.base_url().'. Vui lòng cân nhắc nhấn vào đường link dưới để thay đổi</p>';
		$body .= '<p> Đồng ý thay đổi mật khẩu, bạn  <a href="'.base_url('forgotpass/activation?key_verify='.$key_verify).'"> nhấn vào đây  </a> để thay đổi mật khẩu</p>';
		$subject = 'Khôi phục mật khẩu cấp 1 của bạn trên hệ thống '.base_url();
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
		$this->email->to($info_clients->email);
		$this->email->subject($subject);
		$this->email->message($body);
		if($this->email->send()==true){
			$this->confirm('đã gửi thư xác nhận vào email vui lòng kiểm tra email.');
		}else{
			$this->confirm('chưa gửi được, lỗi không xác định vui lòng thử lại.');
		}
			
	}
	
}
?>