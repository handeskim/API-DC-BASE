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
		$this->msg = null;
		$this->lang_details = 'en';
		$this->title = null;
		$this->keywords = null;
		$this->description = null;
		$this->title_main = null;
		$this->data = array(
			'title' => $this->msg,
			'msg' => $this->msg,
		);
	}
	
	public function index(){
		// session_destroy();
		// $this->session->sess_destroy();
		$this->session->unset_userdata('data_user');
		redirect(base_url());
	}
	
	
	

	
	
	
}
?>