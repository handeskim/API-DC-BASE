<?php
class Reseller extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->GlobalMD->_token();
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->token_session = $this->session->userdata('token_session');
		if(isset($this->token_session)){  
			if($this->token_session==true){
				$this->data['profile'] = $this->session->userdata('data_user');
				$this->profile = $this->session->userdata('data_user');
				if(!empty($this->profile)){
					$this->client_id = ClientID($this->profile);
					$this->_role = (int)$this->profile['role'];
					if($this->_role > 3 || $this->_role == 0){
						redirect(base_url('thong-tin-tai-khoan.html'));
					}
				}else{redirect(base_url('thoat-tai-khoan.html'));}
			}else{redirect(base_url('thoat-tai-khoan.html'));}
		}else{redirect(base_url('reseller/sign.html'));}
	}
	
	
	public function index(){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			$this->obj['token'] = $this->_token;
			$info = $this->GlobalMD->query_result('apps/site/system_info',$this->obj);
			$this->data['title_main'] = ' Dashboard Control panel';
			$this->data['card_change'] = $info->card_change;
			$this->data['withdrawal'] = $info->withdrawal;
			$this->data['transfer_log'] = $info->transfer_log;
			$this->data['history_payments'] = $info->history_payments;
			$this->data['card_change_sum'] = convert_object($info->card_change_hod);
			$this->data['api_group'] = convert_object($info->api_group);
			$this->data['withdrawal_group'] = convert_object($info->withdrawal_group);
			$this->data['transfer_log_group'] = convert_object($info->transfer_log_group);
			$this->data['withdrawal_transaction'] = convert_object($info->withdrawal_transaction);
			$this->data['transfer_transaction'] = convert_object($info->transfer_transaction);
			$this->data['history_payments_transaction'] = convert_object($info->history_payments_transaction);
			$this->data['card_transaction'] = convert_object($info->card_transaction);
			$this->data['user_info'] = $info->user;
			$this->data['side_bar'] = 0;
			$task_work = $this->GlobalMD->pquery_result('apps/site/realtime_task',$this->obj);
			$this->data['task_work'] = convert_obj($task_work->result);
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/main_system_info',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
			
		}else{
			$this->is_profile();
		}
	}
	public function is_profile(){
		redirect(base_url('thong-tin-tai-khoan.html'));
	}

	
}