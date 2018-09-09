<?php
class Profile extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = array();
		$this->data['remarketing'] = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->GlobalMD->_token();
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->token_session = $this->session->userdata('token_session');
		if(isset($this->token_session)){  
			if($this->token_session==true){
				$this->profile = $this->session->userdata('data_user');
				$this->_role = (int)$this->profile['role'];
				if(!empty($this->profile)){
					$this->data['token_session'] = $this->session->userdata('token_session');
					$this->data['profile'] = $this->session->userdata('data_user');
					$this->client_id = ClientID($this->profile);
					$this->data['client_id'] = $this->client_id;
				}else{redirect(base_url('thoat-tai-khoan.html'));}
			}else{redirect(base_url('thoat-tai-khoan.html'));}
		}else{redirect(base_url('dang-ky.html'));}
	}
	
	public function update_info(){
			if(isset($_POST['is_checked'])){ if($_POST['is_checked'] == 'on'){
					if(!empty($_POST['email'])){ $this->obj['email'] = $_POST['email']; }
					if(!empty($_POST['full_name'])){ $this->obj['full_name'] = $_POST['full_name'];	}
					if(!empty($_POST['phone'])){ $this->obj['phone'] = $_POST['phone'];	}
					if(!empty($_POST['address'])){ $this->obj['address'] = $_POST['address'];	}
					if(!empty($_POST['city'])){ $this->obj['city'] = $_POST['city'];	}
					if(!empty($_POST['birthday'])){ $this->obj['birthday'] = $_POST['birthday'];	}
					if(!empty($_POST['country'])){ $this->obj['country'] = $_POST['country'];	}
					if(!empty($_POST['auth'])){
							$this->obj['token'] = $this->_token;
							$this->obj['client_id'] = $this->client_id;
							$this->obj['auth'] = $_POST['auth'];
							$client_info = $this->GlobalMD->query_global('api/user/update',$this->obj);
							if(!empty($client_info)){
								
								$this->load_session($this->client_id);
							}else{
								$this->confirm('Cập nhập thất bại'); 
							}
					}else{ $this->confirm('vui lòng nhập mật khẩu cấp 2 (mã bảo mật của bạn)'); }
				}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
			}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('thong-tin-ca-nhan.html').'";</script>';
	}
	public function index(){
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'profile', 'dynx_totalvalue' => 0 );
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/sidebar_profile',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/Index_Profile_details',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}

	public function activation(){
		if(!empty($_GET['key_verify'])){
				$key_activation = json_decode(handesk_decode($_GET['key_verify']));
				if(isset($key_activation)){
					if(!empty($key_activation->time_active)){
							$time_key = (int)$key_activation->time_active;
							if(time() <= $time_key){
								if(!empty($key_activation->auth_new)){
								$this->obj['token'] = $this->_token;
								$this->obj['client_id'] = (string)$key_activation->client_id;
								$this->obj['auth'] = (string)$key_activation->auth_new;
								$client_info = $this->GlobalMD->query_global('api/user/update',$this->obj);
									if(!empty($client_info)){
									$p = json_decode($client_info);
										if($p[0]==true){
											$this->confirm('Cập nhập thành công');
										}else{ $this->confirm('Cập nhập thất bại'); }
									}else{ $this->confirm('Cập nhập thất bại'); }
								}else{ $this->confirm('Cập nhập thất bại'); }
							}else{$this->confirm('key hết hạn vui lòng thử lại');}
					}else{$this->confirm('Sai key vui lòng thử lại');}
				}else{$this->confirm('Sai key vui lòng thử lại');}
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
				}else{ redirect(base_url('thong-tin-ca-nhan.html')); } 
			}else{ redirect(base_url('thong-tin-ca-nhan.html')); } 
		}else{ redirect(base_url('thong-tin-ca-nhan.html')); } 
	}
	public function bank_add(){
			if(isset($_POST['is_checked'])){ if($_POST['is_checked'] == 'on'){
					if(!empty($_POST['bank_option'])){ $this->obj['bank_option'] = $_POST['bank_option']; }
					if(!empty($_POST['bank_name'])){ $this->obj['bank_name'] = $_POST['bank_name']; }
					if(!empty($_POST['bank_id'])){ $this->obj['bank_id'] = $_POST['bank_id']; }
					if(!empty($_POST['account_holders'])){ $this->obj['account_holders'] = $_POST['account_holders']; }
					if(!empty($_POST['bank_account'])){ $this->obj['bank_account'] = $_POST['bank_account']; }
					if(!empty($_POST['branch_bank'])){ $this->obj['branch_bank'] = $_POST['branch_bank']; }
					if(!empty($_POST['provinces_bank'])){ $this->obj['provinces_bank'] = $_POST['provinces_bank']; }
					if(!empty($_POST['bank_name'])){
							$this->obj['token'] = $this->_token;
							$this->obj['client_id'] = $this->client_id;
							$this->obj['auth'] = $_POST['auth'];
							$client_info = $this->GlobalMD->query_global('api/user/bank',$this->obj);
							$banks = convert_obj(json_decode($client_info));
							if(!empty($banks[0]['bank_id'])){
								 $this->confirm('Thêm thành công');
								}else{ $this->confirm('không hợp lệ vui lòng thử lại'); }
						}else{ $this->confirm('vui lòng chọn ngân hàng'); }
				}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
			}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
	}
	
	public function bank_info(){
		$bank_info =  $this->bank();
		if(!empty($bank_info)){
			$this->data['bank_info'] = $this->bank();
		}
		$this->data['bank_option'] = $this->bank_option();
		$this->parser->parse('default/layout/profile/bank_info',$this->data);
	}
	private function bank(){
		$this->obj['token'] = $this->_token;
		$this->obj['client_id'] = $this->client_id;
		$bank = $this->GlobalMD->query_global('api/user/bank_info',$this->obj);
		if(!empty($bank)){
			if(($bank->status == 1000)){
				if(!empty($bank->info_bank)){
					$this->result = $bank->info_bank;
				}
			};
		}
		return $this->result;
	}
	public function unlock(){
			if(isset($_POST['is_checked'])){ 
				if($_POST['is_checked'] == 'on'){
					if(!empty($_POST['password_new']) || !empty($_POST['password_old']) || !empty($_POST['password_duplicate'])){
							$password_new = md5($_POST['password_new']);
							$password_duplicate = md5($_POST['password_duplicate']);
							if($password_new === $password_duplicate){
								$this->obj['token'] = $this->_token;
								$this->obj['client_id'] = $this->client_id;
								$this->obj['password_new'] = $_POST['password_new'];
								$this->obj['password_old'] =$_POST['password_old'];
								$unlock = $this->GlobalMD->query_global('api/user/change_password',$this->obj);
								if(!empty($unlock)){
									$v = convert_obj(json_decode($unlock));
									if($v[0]["status"]==1000){
										$this->confirm('thay đổi thành công');
									}else{ $this->confirm('thay đổi thất bại'); }
								}else{ $this->confirm('thay đổi thất bại'); }
							}else{ $this->confirm('mật khẩu không giống nhau'); }
					}else{ $this->confirm('vui lòng không bỏ trống trường'); }
				}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
			}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
	}
	public function forgot(){
			if(!empty($_POST['password_old'])){
					$this->obj['time_active'] = time() + 72000;
					$this->obj['token'] = $this->_token;
					$this->obj['client_id'] = $this->client_id;
					$this->obj['password_old'] = $_POST['password_old'];
					$this->obj['auth_new'] = $_POST['auth_new'];
					$key_verify = handesk_encode(json_encode($this->obj));
					$body = '<p> Ai đó Yêu cầu thay đổi mật khẩu của bạn trên hệ thống '.base_url().'. Vui lòng cân nhắc nhấn vào đường link dưới để thay đổi</p>';
					$body .= '<p> Đồng ý thay đổi mật khẩu, bạn  <a href="'.base_url('profile/activation?key_verify='.$key_verify).'"> nhấn vào đây  </a> để thay đổi mật khẩu</p>';
					$subject = 'Khôi phục mật khẩu cấp 2 của bạn trên hệ thống '.base_url();
					$this->load->library('email');
					$config['protocol']    = 'smtp';
					$config['smtp_host']    =  $this->session->userdata('smtp_host');
					$config['smtp_port']    =  $this->session->userdata('smtp_port');
					$config['smtp_crypto'] = 	$this->session->userdata('smtp_crypto');
					$config['smtp_timeout'] = '7';
					$config['smtp_user']    =  $this->session->userdata('smtp_user');
					$config['smtp_pass']    =  $this->session->userdata('smtp_password');
					$config['charset']    = 'utf-8';
					$config['newline']    = "\r\n";
					$config['mailtype'] = 'html';
					$config['validation'] = TRUE; 
					$this->email->initialize($config);
					$this->email->from($this->session->userdata('email_brand'));
					$this->email->to($this->profile['email']);
					$this->email->subject($subject);
					$this->email->message($body);
					if($this->email->send()==true){
						$this->confirm('đã gửi thư xác nhận vào email vui lòng kiểm tra email.');
					}
			}else{ $this->confirm('vui lòng nhập mật khẩu cấp 1'); }
	}
	public function auth(){
			if(isset($_POST['is_checked'])){ 
				if($_POST['is_checked'] == 'on'){
					if(!empty($_POST['password_new']) || !empty($_POST['password_old']) || !empty($_POST['password_duplicate'])){
							$password_new = md5($_POST['password_new']);
							$password_duplicate = md5($_POST['password_duplicate']);
							if($password_new === $password_duplicate){
								$this->obj['token'] = $this->_token;
								$this->obj['client_id'] = $this->client_id;
								$this->obj['password_new'] = $_POST['password_new'];
								$this->obj['password_old'] =$_POST['password_old'];
								$unlock = $this->GlobalMD->query_global('api/user/change_auth',$this->obj);
								if(!empty($unlock)){
									$v = convert_obj(json_decode($unlock));
									if($v[0]["status"]==1000){
										$this->confirm('thay đổi thành công');
									}else{ $this->confirm('thay đổi thất bại'); }
								}else{ $this->confirm('thay đổi thất bại'); }
							}else{ $this->confirm('mật khẩu không giống nhau'); }
					}else{ $this->confirm('vui lòng không bỏ trống trường'); }
				}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
			}else{ $this->confirm('vui lòng đồng ý cập nhập'); }
	}
	private function bank_option(){
		$this->param = array();
		$bank_option = $this->GlobalMD->query_global('api/bank/option',$this->param);
		return convert_obj($bank_option);
	}
	public function edit_profile(){
		$this->parser->parse('default/layout/profile/edit_profile',$this->data);
	}
	public function unlock_auth(){
		$this->parser->parse('default/layout/profile/unlock_auth',$this->data);
	}
	public function withdrawal_info($id){
		if(isset($id)){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $id;
			$this->result = $this->GlobalMD->query_result('api/withdrawal/info',$this->obj);
			if(isset($this->result->result)){
				if(!empty($this->result->result)){
					$this->data['withdrawal'] = convert_object($this->result->result);
				}
			}
			$this->data['root_id'] = $id;
		}
		$this->data['title'] = lang('withdrawal');
		$this->data['title_main'] = 'Chi tiết giao dịch ID#'.$id;
		$this->data['side_bar'] = 4;
		$this->parser->parse('default/layout/profile/transfer_info',$this->data);
	}	
	public function history_card_info($id){
		if(isset($id)){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $id;
			$this->result = $this->GlobalMD->query_result('api/withdrawal/info',$this->obj);
			if(isset($this->result->result)){
				if(!empty($this->result->result)){
					$this->data['withdrawal'] = convert_object($this->result->result);
				}
			}
			$this->data['root_id'] = $id;
		}
		$this->data['title'] = lang('withdrawal');
		$this->data['title_main'] = 'Chi tiết giao dịch ID#'.$id;
		$this->data['side_bar'] = 4;
		$this->parser->parse('default/layout/profile/transfer_info',$this->data);
	}
	public function transfer_info($id){
		if(isset($id)){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $id;
			$this->result = $this->GlobalMD->query_result('api/transfer/info',$this->obj);
			if(isset($this->result->result)){
				if(!empty($this->result->result)){
					$this->data['withdrawal'] = convert_object($this->result->result);
				}
			}
			$this->data['root_id'] = $id;
		}
		$this->data['title'] = lang('withdrawal');
		$this->data['title_main'] = 'Chi tiết giao dịch ID#'.$id;
		$this->data['side_bar'] = 4;
		$this->parser->parse('default/layout/profile/transfer_info',$this->data);
	}
	public function forgot_auth(){
		$this->parser->parse('default/layout/profile/forgot_auth',$this->data);
	}
	public function developers_create(){
		$this->obj['token'] = $this->_token;
		$this->obj['client_id'] = $this->client_id;
		$developers = $this->GlobalMD->query_global('api/user/developer_create',$this->obj);
		if(!empty($developer)){
			$this->confirm('thao tác thành công vui lòng xem lại ở menu nhà phát triển');
		}else{
			$this->confirm('thao tác thành công vui lòng xem lại ở menu nhà phát triển');
		}
	}
	public function developers(){
		$this->obj['token'] = $this->_token;
		$this->obj['client_id'] = $this->client_id;
		$developers = $this->GlobalMD->query_global('api/user/developer',$this->obj);
		$p = convert_obj(json_decode($developers));
		if(!empty($p[0])){ if(!empty($p[0]["merchant_id"])){$this->data['developer'] = $p;}}
		$this->parser->parse('default/layout/profile/developers',$this->data);
	}
	public function unlock_password(){
		$this->parser->parse('default/layout/profile/unlock_password',$this->data);
	}
	public function default_profile(){
		$this->parser->parse('default/layout/profile/default_profile',$this->data);
	}
	public function transfer_success(){
			$this->confirm('Giao dịch thành công');
	}
	/////////////////////////Balancer////////////////////////////////
	public function transfer_confirm(){
		if(isset($_POST['is_checked'])){ 
			if($_POST['is_checked'] == 'on'){
				if(!empty($_POST['password'])){
						if(!empty($_POST['authentication'])){
							$this->obj['token'] = $this->_token;
							$this->obj['client_id'] = $this->client_id;
							$this->obj['password'] = $_POST['password'];
							$this->obj['authentication'] = $_POST['authentication'];
							$transfer = $this->GlobalMD->query_result('api/balancer/transfer_confirm',$this->obj);
							if(!empty($transfer->status)){
								if($transfer->status==1999){
										redirect(base_url('giao-dich-thanh-cong.html'));
								}else{ $this->confirm('giao dịch thất bại'); }
							}else{ $this->confirm('giao dịch thất bại'); }
						}else{ $this->confirm('giao dịch thất bại'); }
				}else{ $this->confirm('vui lòng nhập mật khẩu cấp 1'); }
			}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
		}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
	}
	
	public function transfer(){
		if(isset($_POST['is_checked'])){ 
			if($_POST['is_checked'] == 'on'){
			if(!empty($_POST['auth'])){
				if(!empty($_POST['beneficiary_id'])){
					if(!empty($_POST['money_transfer'])){
						$this->obj['token'] = $this->_token;
						$this->obj['client_id'] = $this->client_id;
						$this->obj['beneficiary_id'] = $_POST['beneficiary_id'];
						$this->obj['money_transfer'] = $_POST['money_transfer'];
						$this->obj['auth'] = $_POST['auth'];
						$transfer = $this->GlobalMD->query_result('api/balancer/transfer',$this->obj);
						if(!empty($transfer)){
						if($transfer->status == 1000){
								$p = convert_obj($transfer);
							
								if(isset($p)){
								if($p["status"]==1000){
									$this->data['confim_transfer'] = $p;
										$this->parser->parse('default/header',$this->data);
										$this->parser->parse('default/header-top',$this->data);
										$this->parser->parse('default/col/start-main',$this->data);
										$this->parser->parse('default/col/col-4-start',$this->data);
										$this->parser->parse('default/adson/sidebar_profile',$this->data);
										$this->parser->parse('default/adson/support',$this->data);
										$this->parser->parse('default/col/col-end',$this->data);
										$this->parser->parse('default/col/col-8-start',$this->data);
										$this->parser->parse('default/layout/Index_confim_transfer',$this->data);
										$this->parser->parse('default/col/col-end',$this->data);
										$this->parser->parse('default/col/end-main',$this->data);
										$this->parser->parse('default/footer',$this->data);
								}else{ $this->confirm('Giao dịch lỗi Thử lại giao dịch'); }
								}else{ $this->confirm('Giao dịch lỗi Thử lại giao dịch'); }
							}else{ $this->confirm($transfer->msg); }
						}else{ $this->confirm('Giao dịch lỗi Thử lại giao dịch'); }
					}else{ $this->confirm('vui lòng không bỏ trống số tiền chuyển'); }
				}else{ $this->confirm('vui lòng không bỏ trống tài khoản nhận'); }
			}else{ $this->confirm('vui lòng không bỏ trống mã bảo mật cấp 2'); }
			}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
		}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
	}	

	public function transfer_withdrawal(){
		if(isset($_POST['is_checked'])){ 
			if($_POST['is_checked'] == 'on'){
			if(!empty($_POST['auth'])){
				if(!empty($_POST['bank_id'])){
					if(!empty($_POST['money_transfer'])){
						$this->obj['token'] = $this->_token;
						$this->obj['client_id'] = $this->client_id;
						$this->obj['bank_id'] = $_POST['bank_id'];
						$this->obj['auth'] = $_POST['auth'];
						$this->obj['money_transfer'] = $_POST['money_transfer'];
						$this->obj['bank_name'] = $_POST['bank_name'];
						$this->obj['account_holders'] = $_POST['account_holders'];
						$this->obj['bank_account'] = $_POST['bank_account'];
						$this->obj['provinces_bank'] = $_POST['provinces_bank'];
						$this->obj['branch_bank'] = $_POST['branch_bank'];
						$transfer = $this->GlobalMD->query_global('api/balancer/withdrawal',$this->obj);
						if(isset($transfer->status)){
							if($transfer->status === 1999){
								redirect(base_url('giao-dich-thanh-cong.html'));
							}else{ $this->confirm($transfer->msg); }
						}else{ $this->confirm($transfer->msg); }
					}else{ $this->confirm('vui lòng không bỏ trống số tiền chuyển'); }
				}else{ $this->confirm('vui lòng không bỏ trống tài khoản nhận'); }
			}else{ $this->confirm('vui lòng không bỏ trống mã bảo mật cấp 2'); }
			}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
		}else{ $this->confirm('vui lòng đồng ý giao dịch'); }
	}
	public function balancer_transfer(){
		$this->parser->parse('default/layout/profile/balancer/transfer',$this->data);
	}
	public function history_balancer(){
		$this->parser->parse('default/layout/profile/balancer/history_balancer',$this->data);
	}
	public function withdrawal(){
		$min_transfer = $this->GlobalMD->query_global('apps/site/min_transfer',$this->obj);
		$this->data['min_transfer'] = $min_transfer->result;
		$this->parser->parse('default/layout/profile/balancer/withdrawal',$this->data);
	}
	
}
?>