<?php
require APPPATH . '/libraries/REST_Controller.php';
class Api extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->r = array('status'=>false,'result'=>null);
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
		$this->token_session = $this->session->userdata('token_session');
		if($this->token_session){
			$this->data['profile'] = $this->session->userdata('data_user');
			$this->profile = $this->session->userdata('data_user');
			if(!empty($this->profile)){
				$this->ClientID = ClientID($this->profile);
			}
		}
	}
	public function bank_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_GET['t'])){
					$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'bank_id'=>$_GET['t']);
					$balancer = $this->GlobalMD->query_global('api/user/bank_del',$this->param);
					if(!empty($balancer)){
						$this->r = array('status'=>true,'result'=> (int)$balancer);
					}
				}
			}
		}
		$this->response($this->r);
	}
	public function balancer_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token);
				$balancer = $this->GlobalMD->query_global('api/balancer',$this->param);
				if(!empty($balancer)){
					$this->r = array('status'=>true,'result'=> (int)$balancer);
				}
			}
		}
		$this->response($this->r);
	}
	public function bank_option_get(){
		if(!empty($_GET['t'])){
			$this->param = array( 'type_bank'=> $_GET['t']);
			$bank_option = $this->GlobalMD->query_global('api/bank',$this->param);
			$bank_option = convert_obj($bank_option);
			if(!empty($bank_option)){
				$this->r = array('status'=>true,'result'=> $bank_option['bank_option']);
			}
		}
		$this->response($this->r);
	}
	public function balancer_history_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token);
				$balancer_history = $this->GlobalMD->query_global('apps/api/history_balancer',$this->param);
				if(!empty($balancer_history)){
					$this->r = array('status'=>true,'result'=> $balancer_history);
				}
			}
		}
		$this->response($this->r);
	}
	
}


?>