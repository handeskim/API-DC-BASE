<?php

class Global_model extends CI_Model{
	function __construct(){
		parent::__construct();
		// $this->load->driver('cache');
		$this->param = array();
		$this->obj = array();
		////////////////////////////////////////////////////////
		$this->load->library('rest');
		$this->provide_service = $this->config->item('provide_service');
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->username = $this->config->item('username');
		$this->password = $this->config->item('password');
		$this->auth = $this->config->item('auth');
		$this->app_id = $this->config->item('app_id');
		$this->_token = $this->_token();
		//////////////////////////////////////////////
		$config =  array('server' => $this->provide_service);
		$this->rest->initialize($config);
		$this->_connect =  array($this->api_name =>$this->secret_key);
		
		
		////////////////////////////////////////////////////////
	}

	public function _token(){
		$sesion_token = $this->session->userdata('token');
		if($sesion_token==true){
			return $this->session->userdata('token');
		}else{
			$param = array('username' => $this->username,'password' =>$this->password,'auth' => $this->auth);
			$this->obj = $this->query_global('api/connect',$param);
			$p = (object)json_decode($this->obj);
			if(!empty($p->token)){
				$this->session->set_userdata('token',$p->token);
				return $p->token;
			}
		}
	}
	public function site_default(){
		$token_site = $this->session->userdata('token_site');
		if($token_site==true){
			return $this->session->all_userdata();
		}else{
			$this->result = $this->query_get('apps/site/info',$this->obj);
			$r = json_decode($this->result);
			if(!empty($r[0])){
				$this->obj = convert_obj($r[0]);
				$this->session->set_userdata($this->obj);
				$this->session->set_userdata(array('token_site'=>true));
				return $this->obj;
			}
		}
	}
	public function query_get($url,$array){
		$this->_connect[] = $array;
		$this->obj = $this->rest->get($url,$this->_connect);
		return $this->response($this->obj);
	}
	public function query_global($url,$param){
		$this->obj = $this->rest->get($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->_result($this->obj);
	}
	public function query_obj($url,$param){
		$this->obj = $this->rest->get($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->obj;
	}
	public function _result($r){
		if(!empty($r)){
			if(!empty($r->status)){
				if($r->status==1000){
					if(!empty($r->result)){
						return $this->obj = decrypt_obj($r->result,$this->secret_key,$this->priv_key);
					}else{ $this->obj= $r; }
				}else{ $this->obj= $r; }
			}else{ $this->obj= $r; }
		}else{ $this->obj= $r; }
		return $this->obj;
	}
	public function response($r){
		if(!empty($r)){
			if(!empty($r->status)){
				if($r->status==1000){
					if(!empty($r->result)){
						return $this->obj = decrypt_obj($r->result,$this->secret_key,$this->priv_key);
					}
				}
			}
		}
		return $this->obj;
	}
	
	
/////////////////// End Noi dung ////////////

}
?>