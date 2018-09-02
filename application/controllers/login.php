<?php
class Login extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->session->userdata('token');
		if(isset($this->_token)==true){	
			$this->_token = $this->session->userdata('token');
		}else{
			$this->_token = $this->GlobalMD->_token();
		}
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->token_session = $this->session->userdata('token_session');
		if($this->token_session){  
			redirect(base_url('thong-tin-ca-nhan.html'));
		}
	}

	public function index(){
		
		if(!empty($_POST['username'])){
			if(!empty($_POST['password'])){
				$this->obj = array(
					'username' => $_POST['username'],
					'password' => $_POST['password'],
					'token' => $this->_token,
				);
				$client_info = $this->GlobalMD->query_global('api/user/login',$this->obj);
				$info = json_decode($client_info);
				if(!empty($info[0])){
					$client_id = getObjectId($info[0]);
					if(!empty($client_id)){
						$this->load_session($client_id);
						redirect(base_url('thong-tin-ca-nhan.html'));
					}else{ 
						redirect(base_url('thong-tin-ca-nhan.html'));
					}
				}else{redirect(base_url('dang-ky.html')); }
			}else{redirect(base_url('dang-ky.html')); }
		}else{redirect(base_url('dang-ky.html')); }
	}
	public function load_session($client_id){
		$this->param = array( 'client_id'=>$client_id, );
		$client_info = $this->GlobalMD->query_global('api/user/info',$this->param);
		if(!empty($client_info)){
			$p = json_decode($client_info);
			$data_user = convert_obj($p[0]);
			if(!empty($data_user)){
				$this->session->set_userdata(array('data_user'=>$data_user));
				$this->session->set_userdata(array('token_session'=>true));
				redirect(base_url('thong-tin-ca-nhan.html'));
			}else{ redirect(base_url('thong-tin-ca-nhan.html')); } 
		}else{ redirect(base_url('thong-tin-ca-nhan.html')); } 
	}
}
?>