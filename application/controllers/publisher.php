<?php
class Publisher extends MY_Controller{

	function __construct(){
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = array();
		$this->data['remarketing'] = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->GlobalMD->_token();
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->token_session = $this->session->userdata('token_session');
		if(isset($this->token_session)){  
			if($this->token_session==true){
				$this->profile = $this->session->userdata('data_user');
				$this->_role = (int)$this->profile['role'];
				if(!empty($this->profile)){
					$this->data['token_session'] = $this->session->userdata('token_session');
					$this->data['profile'] = $this->session->userdata('data_user');
					$this->client_id = ClientID($this->profile);
					$this->data['client_id'] = $this->client_id;
				}
			}
		}
	}
	
	public function index(){
		$alias =  (string)$this->uri->segment(2);
		if(!empty($alias)){
			if(!empty($this->client_id)){
				$client_id = (string)$this->client_id;
				if($alias != $client_id){
					$this->obj['publisher'] = $alias;
					$this->obj['profile'] = $this->profile;
					$this->obj['client_id'] = $this->client_id;
					$object = $this->GlobalMD->pquery_result('apps/site/publisher',$this->obj);
					if(!empty($object)){
						if(!empty($object->result)){
							$this->confirms("bạn đã trở thành cộng tác viên, hãy bắt đầu kiếm doanh thu của mình");
						}else{$this->confirms("không tồn tại thành viên, hoặc thành viên đã là cộng tác viên trên hệ thống");}
					}else{$this->confirms("không tồn tại thành viên, hoặc thành viên đã là cộng tác viên trên hệ thống");}
				}else{ redirect(base_url('cong-tac-vien.html'));}
			}else{$this->confirm("đăng nhập trước khi xác nhận cộng tác viên");}
		}else{$this->confirm("không tồn tại thành viên, hoặc thành viên đã là cộng tác viên trên hệ thống");}
	}
	public function share(){
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'profile', 'dynx_totalvalue' => 0 );
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/sidebar_profile',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/Index_Profile_publisher',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}

	public function confirms($msg){
		$this->param = array( 'client_id'=>$this->client_id, );
		$client_info = $this->GlobalMD->query_global('api/user/info',$this->param);
		if(!empty($client_info)){
			$p = json_decode($client_info);
			$data_user = convert_obj($p[0]);
			if(!empty($data_user)){
			$param = array(
				'token_session'=> true,
				'data_user'=>$data_user
			);
			$this->session->set_userdata($param);
			echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('cong-tac-vien.html').'";</script>';
			}
		}
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('khong-ton-tai-trang.html').'";</script>';
	}
}
?>