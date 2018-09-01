<?php
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->r = array('status'=>200,'result'=>null);
		$this->obj_core = array();
		$this->load->model('global_model', 'GlobalMD');	
		$this->load->library('rest');
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
		// $this->client_id = $this->session->userdata('token_session');
		
	}
	public function balancer_get(){
		var_dump($this->session->all_userdata());
		// $this->param = array( 'client_id'=>$client_id, );
		// $balancer = $this->GlobalMD->query_global('api/balancer',$this->param);
		// if(!empty($balancer)){
			// $this->r = array('status'=>true,'result'=>$balancer);
		// }
		// $this->response($this->r);
	}
	
	
}


?>