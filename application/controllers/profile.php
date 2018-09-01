<?php
class Profile extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->session->userdata('token');
		if($this->_token==false){	
			$this->_token = $this->GlobalMD->_token();
		}
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$token_session = $this->session->userdata('token_session');
		if($token_session){  
		
		}else{
			redirect(base_url('dang-ky.html'));
		}
	}
	
	public function index(){
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'profile', 'dynx_totalvalue' => 0 );
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-4-start',$this->data);
		$this->parser->parse('default/adson/sidebar_profile',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-8-start',$this->data);
		$this->parser->parse('default/layout/Index_Profile_details',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
}
?>