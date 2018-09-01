<?php
class Unknown extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$token_session = $this->session->userdata('access_token');
	}
	
	
	public function index(){
		// $this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'other', 'dynx_totalvalue' => 0 );
		// $sql = "SELECT * FROM `ask_sections` WHERE `types` = 1 AND `primary` = 0 ORDER BY sort ASC";
		// $this->data['section_site'] = $this->GlobalMD->query_global($sql);
		// $this->data['title_main'] = lang('unknown');
		// $this->parser->parse('layout/header',$this->data);
		// $this->parser->parse('layout/header_top',$this->data);
		// $this->parser->parse('layout/start_main',$this->data);
		// $this->parser->parse('layout/unknown',$this->data);
		// $this->parser->parse('layout/end_main',$this->data);
		// $this->parser->parse('layout/footer',$this->data);
	}
	
	
	
	
}
?>