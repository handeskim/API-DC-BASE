<?php
class Staff extends MY_Controller{
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
	public function edit($id){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			if(isset($id)){
				$this->obj['token'] = $this->_token;
				$this->obj['client_id'] = $this->client_id;
				$this->obj['keys'] = $id;
				$this->result = $this->GlobalMD->query_result('api/staff_cms/info',$this->obj);
				if(isset($this->result->result)){
					if(!empty($this->result->result)){ $this->data['withdrawal'] = convert_object($this->result->result);}
				}
				$this->data['root_id'] = $id;
			}
			$this->data['title'] = lang('withdrawal');
			$this->data['title_main'] = 'Edit Account ID#'.$id;
			$this->data['side_bar'] = 4;
			$this->parser->parse('reseller/layout/apps/staff/staff_edit',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function index(){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			$this->data['title'] = lang('staff');
			$this->data['title_main'] = lang('staff');
			$this->data['side_bar'] = 3;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/staff_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
			
		}else{
			$this->is_profile();
		}
	}	
	public function details(){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			if(!empty($_GET['keys'])){
					$this->data['title'] = lang('staff');
					$this->data['title_main'] = lang('staff');
					$this->data['side_bar'] = 3;
					$this->data['root_id'] = $_GET['keys'];
					$this->parser->parse('reseller/header',$this->data);
					$this->parser->parse('reseller/sidebar',$this->data);
					$this->parser->parse('reseller/main',$this->data);
					$this->parser->parse('reseller/layout/apps/staff_details_cms',$this->data);
					$this->parser->parse('reseller/footer',$this->data);
			}else{
				redirect(base_url('reseller/staff.html'));
			}
		}else{ $this->is_profile();}
	}	
	public function addmoney(){
		if($this->_role == 1 || $this->_role == 2){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->result = $this->GlobalMD->query_result('apps/site/addmoney',$this->obj);
			$this->confirm($this->result->result);
		}else{
			$this->is_profile();
		}
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('reseller.html').'";</script>';
	}
	public function revenue(){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			$this->data['title'] = lang('revenue');
			$this->data['title_main'] = lang('revenue');
			$this->data['side_bar'] = 3;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/revenue_staff_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
			
		}else{
			$this->is_profile();
		}
	}
	public function is_profile(){
		redirect(base_url('thong-tin-tai-khoan.html'));
	}

	
}