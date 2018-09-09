<?php
class Exits extends MY_Controller{
	public $lang_details;
	public $msg;
	public $data;
	public $title_main;
	public $title;
	public $keywords;
	public $description;
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	

	}
	
	public function index(){
		session_destroy();
		$this->session->sess_destroy();
		$this->session->unset_userdata('data_user');
		$this->session->unset_userdata('token_session');
		foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
		redirect(base_url());
	}
	
	
	

	
	
	
}
?>