<?php
class Deduct extends MY_Controller{
	
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
				}
			}
		}
		
	}
	
	
	
	public function index(){

		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'home', 'dynx_totalvalue' => 0 );
		$this->data['title'] = "BẢNG GIÁ CHIẾT KHẨU ĐỔI THẺ CÀO";
		$this->data['title_main'] = "BẢNG GIÁ CHIẾT KHẨU ĐỔI THẺ CÀO";
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
		$this->parser->parse('default/col/col-8-start',$this->data);
			$this->parser->parse('default/layout/deduct',$this->data);
			$this->parser->parse('default/layout/buycard',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	
	}
	
	
	
	
}
?>