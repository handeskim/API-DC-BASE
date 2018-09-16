<?php
class Publisher extends MY_Controller{
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
		if($this->_role == 1 || $this->_role == 2){
			if(isset($id)){
				$this->obj['token'] = $this->_token;
				$this->obj['client_id'] = $this->client_id;
				$this->obj['keys'] = $id;
				$this->result = $this->GlobalMD->query_result('api/publisher_cms/info',$this->obj);
				if(isset($this->result->result)){
					if(!empty($this->result->result)){ $this->data['publishcer'] = convert_object($this->result->result);}
				}
				$this->data['root_id'] = $id;
			}
			$this->data['title'] = lang('Publisher');
			$this->data['title_main'] = 'Edit Publisher ID#'.$id;
			$this->data['side_bar'] = 2;
			$this->parser->parse('reseller/layout/apps/publisher/publisher_edit',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function index(){
		if($this->_role == 1 || $this->_role == 2 ){
			$this->data['title'] ='CTV';
			$this->data['title_main'] = 'CTV';
			$this->data['side_bar'] = 2;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/publisher_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function rose_info($str){
		if($this->_role == 1 || $this->_role == 2 ){
			if(isset($str)){
				$pub = explode('-',$str);
				if(!empty($pub[0])){
					if(!empty($pub[1])){
						if(!empty($pub[2])){
							$this->obj['token'] = $this->_token;
							$this->obj['client_id'] = $this->client_id;
							$this->obj['keys'] = $pub[0];
							$this->obj['date_start'] = $pub[1];
							$this->obj['date_end'] = $pub[2];
							$this->result = $this->GlobalMD->query_result('api/publisher_cms/info_rose',$this->obj);
							if(!empty($this->result)){
								if(isset($this->result->result[0]->details)){
									if(!empty($this->result->result[0]->details)){
										$this->data['rose'] = $this->result->result[0]->details;
									}
								}
								$this->data['title'] = lang('Publisher');
								$this->data['title_main'] = 'Details Publisher Rose ID#'.$str;
								$this->data['side_bar'] = 2;
								$this->parser->parse('reseller/layout/apps/publisher/publisher_rose_info',$this->data);
							}
						}
					}
				}
				
			}
		}
	}
	public function rose(){
		if($this->_role == 1 || $this->_role == 2 ){
			$this->data['title'] ='Hoa Hồng  CTV';
			$this->data['title_main'] = 'Hoa Hồng CTV';
			$this->data['side_bar'] = 2;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/publisher_rose_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function is_profile(){
		redirect(base_url('thong-tin-tai-khoan.html'));
	}

	
}