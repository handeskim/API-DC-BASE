<?php
class Home extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$token_session = $this->session->userdata('access_token');
		if(isset($token_session)){ }
		
	}
		
	/////////////////////////////////
	
	public function index(){
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'home', 'dynx_totalvalue' => 0 );
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		// $this->parser->parse('default/layout/Index_Layout',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	
	}
	
	
	
	
}
?>