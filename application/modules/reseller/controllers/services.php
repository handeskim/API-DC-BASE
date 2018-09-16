<?php
class Services extends MY_Controller{
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
		$this->token_session = $this->session->userdata('token_session');
		if(isset($this->token_session)){  
			if($this->token_session==true){
				$this->data['profile'] = $this->session->userdata('data_user');
				$this->profile = $this->session->userdata('data_user');
				if(!empty($this->profile)){
					$this->client_id = ClientID($this->profile);
					$this->_role = (int)$this->profile['role'];
					if($this->_role > 3 || $this->_role == 0){
						redirect(base_url('thong-tin-tai-khoan.html'));
					}
				}else{redirect(base_url('thoat-tai-khoan.html'));}
			}else{redirect(base_url('thoat-tai-khoan.html'));}
		}else{redirect(base_url('reseller/sign.html'));}
	}
	public function update_payment(){
		if(!empty($_POST)){
			$this->obj = $_POST;
			$this->obj['token'] = $this->_token ;
			$this->obj['client_id'] = $this->client_id ;
			$config = $this->GlobalMD->query_result('apps/site/config_update_nganluong',$this->obj);
			redirect(base_url('reseller/services/nganluong.html'));
		}else{
			redirect(base_url('reseller/services/nganluong.html'));
		}
	}
	public function update_alego(){
		if(!empty($_POST)){
			$this->obj = $_POST;
			$this->obj['token'] = $this->_token ;
			$this->obj['client_id'] = $this->client_id ;
			$config = $this->GlobalMD->query_result('apps/site/config_update_alego',$this->obj);
			redirect(base_url('reseller/services.html'));
		}else{
			redirect(base_url('reseller/services.html'));
		}
	}	
	public function update_shopdoithe(){
		if(!empty($_POST)){
			$this->obj = $_POST;
			$this->obj['token'] = $this->_token ;
			$this->obj['client_id'] = $this->client_id ;
			$config = $this->GlobalMD->query_result('apps/site/config_update_shopdoithe',$this->obj);
			redirect(base_url('reseller/services.html'));
		}else{
			redirect(base_url('reseller/services.html'));
		}
	}

	public function index(){
		if($this->_role == 1 || $this->_role == 2 ){
			$this->obj['token'] = $this->_token ;
			$this->obj['client_id'] = $this->client_id ;
			$config = $this->GlobalMD->query_result('apps/site/config_services',$this->obj);
			$config_alego = $this->GlobalMD->query_result('apps/site/config_services_alego',$this->obj);
			$this->data['config'] = convert_obj($config->result);
			$this->data['config_alego'] = convert_obj($config_alego->result);
			$this->data['title'] = "cấu hình dịch vụ API Partner";
			$this->data['title_main'] = "cấu hình dịch vụ API Partner";
			$this->data['side_bar'] = 1;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/config_service_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function nganluong(){
		if($this->_role == 1 || $this->_role == 2 ){
			$this->obj['token'] = $this->_token ;
			$this->obj['client_id'] = $this->client_id ;
			$config = $this->GlobalMD->query_result('apps/site/config_nganluong',$this->obj);
			$this->data['config'] = convert_obj($config->result);
			$this->data['title'] = "Cấu hình thanh toán ngân lượng";
			$this->data['title_main'] = "Cấu hình thanh toán ngân lượng";
			$this->data['side_bar'] = 1;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/config_nganluong',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function is_profile(){
		redirect(base_url('thong-tin-tai-khoan.html'));
	}

	
}