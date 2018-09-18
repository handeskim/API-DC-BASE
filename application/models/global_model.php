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
			$param = array('username' => $this->username,'password' =>$this->password,'auth' => $this->auth,);
			$this->obj = $this->query_global('api/connect',$param);
			$p = (object)json_decode($this->obj);
			if(!empty($p->token)){
				$this->session->set_userdata('token',$p->token);
				return $p->token;
			}
		}
	}
	public  function _load_site_notification_top(){
		$this->result = $this->pquery_result('apps/site/site_notifacation_top',$this->obj);
		return $this->result;
	}
	public  function _load_info_rose_partner(){
		$this->result = $this->pquery_result('apps/site/info_rose_partner',$this->obj);
		if(!empty($this->result->rose_partner)){
			return $this->result->rose_partner * 100;
		}else{
			return 0;
		}
	}
		public  function _load_info_transfer_wget(){
		$this->result = $this->pquery_result('apps/site/info_transfer_wget',$this->obj);
		if(!empty($this->result->transfer_fee)){
			return $this->result->transfer_fee;
		}else{
			return 0;
		}
	}
	public  function _load_info_withdraw_wget(){
		$this->result = $this->pquery_result('apps/site/info_withdraw_wget',$this->obj);
		if(!empty($this->result->withdrawal_fee)){
			return $this->result->withdrawal_fee;
		}else{
			return 0;
		}
	}

	public  function _site_load_site_faq(){
		$this->result = $this->pquery_result('apps/site/site_load_site_faq',$this->obj);
		return $this->result;
	}
	public  function _site_load_card_default(){
		$this->result = $this->pquery_result('apps/site/site_load_card',$this->obj);
		return $this->result;
	}
	public  function _site_load_bycard_default(){
		$this->result = $this->pquery_result('apps/site/site_load_bycard',$this->obj);
		return $this->result;
	}
	public  function _site_load_site_news_box(){
		$this->result = $this->pquery_result('apps/site/news_box',$this->obj);
		return $this->result;
	}
	public function site_default(){
		// $token_site = $this->session->userdata('token_site');
		// if($token_site==true){
			// return $this->session->all_userdata();
		// }else{
			$this->result = $this->query_get('apps/site/info',$this->obj);
			$r = json_decode($this->result);
			if(!empty($r[0])){
				$this->obj = convert_obj($r[0]);
				// $this->session->set_userdata($this->obj);
				// $this->session->set_userdata(array('token_site'=>true));
				return $this->obj;
			}
		// }
	}
	
	public function query_get($url,$array){
		$this->_connect[] = $array;
		$this->obj = $this->rest->get($url,$this->_connect);
		return $this->response($this->obj);
	}
	public function nganluong_sevice(){
		$object_service['name_service'] = 'NGANLUONG';
		$object_name = $this->pquery_result('apps/site/info_service_payments',$object_service);
		return $object_name;
	}
	public function query_global($url,$param){
		$this->obj = $this->rest->get($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->_result($this->obj);
	}
	public function pquery_global($url,$param){
		$this->obj = $this->rest->post($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->_result($this->obj);
	}
	public function query_result($url,$param){
		$this->obj = $this->rest->get($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->obj;
	}
	public function pquery_result($url,$param){
		$this->obj = $this->rest->post($url,array($this->api_name => $this->secret_key,'param'=> encrypt_obj(json_encode($param),$this->secret_key,$this->priv_key),));
		return $this->obj;
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
						$this->obj = decrypt_obj($r->result,$this->secret_key,$this->priv_key);
					}
				}
			}
		}
		return $this->obj;
	}
	
	
/////////////////// End Noi dung ////////////

}
?>