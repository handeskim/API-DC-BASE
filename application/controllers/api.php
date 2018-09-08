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
		$this->response = array();
		$this->data = $this->GlobalMD->site_default();
		$this->_token = $this->GlobalMD->_token();
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
	public function example_token_get(){
		$this->obj['username'] = 'Administrator';
		$this->obj['password'] = '123456';
		$this->result = $this->GlobalMD->query_result('card/token',$this->obj);
		$this->results = $this->GlobalMD->_result($this->result);
		$token = json_decode($this->results);
		$this->param['token'] = $token->token;
		$this->response = $this->GlobalMD->query_result('card/token/check',$this->param);
		var_dump($this->response);
	}
	
	public function example_balancer_get(){
		$this->obj['token'] = $this->_token;
		$this->result = $this->GlobalMD->query_result('card/balancer',$this->obj);
		var_dump($this->result);
	}

	public function example_bycard_get(){
		$this->obj['card_seri'] = '10001386133102';
		$this->obj['card_code'] = '219173947533410';
		$this->obj['card_type'] = '1';
		$this->obj['card_amount'] = '20000';
		$this->obj['token'] = $this->_token;
		$this->obj['client_id'] = $this->ClientID;
		$this->result = $this->GlobalMD->query_global('card/bycard',$this->obj);
		var_dump($this->result);
	}
	
	public function disable_notify_popup_get(){
		$this->session->set_userdata(array('notify_popup'=>false));
		$_SESSION['notify_popup'] = false;
		$this->r['status'] = true;
		$this->response($this->r);
	}
	public function notify_popup_get(){
		if(!empty($_GET['e'])){
			
			if($_GET['e']==true){
				$obj = $this->GlobalMD->pquery_result('apps/site/site_notification',$this->obj);
				if(!empty($obj->result)){
					$this->session->set_userdata(array('notify_popup'=>false));
					$this->r['data'] = $obj->result;
					$this->r['status'] = true;
				}else{
					$this->session->set_userdata(array('notify_popup'=>false));
					$this->r['status'] = false;
				}
			}
		}
		$this->response($this->r);
	}
	
	public function ServicesSlugBlogs_get(){
		if(!empty($_GET['c'])){
			$this->obj['token'] = $this->_token;
			
			$c = slugify(url_encoded($_GET['c']));
			$this->obj['alias'] = $c;
			$obj = $this->GlobalMD->query_result('apps/site/SlugBlogs',$this->obj);
			if(!empty($obj->result)){
				$this->r['status'] = true;
					$this->r['result'] = $c.'-'.time();
			}else{
				$this->r['result'] = $c;
				$this->r['status'] = true;
			}
		}
		$this->response($this->r);
	}	
	
	
	
	public function card_post(){
		if(!empty($_POST)){
			$p = $_POST;
			if(!empty($p['card_seri']) || !empty($p['card_code']) || !empty($p['card_amount']) || !empty($p['card_type'])){
				$this->obj['card_seri'] = $p['card_seri'];
				$this->obj['card_code'] = $p['card_code'];
				$this->obj['card_type'] = $p['card_type'];
				$this->obj['card_amount'] = $p['card_amount'];
				$this->obj['token'] = $this->_token;
				if(!empty($p['share_client'])){
					$this->obj['client_id'] = handesk_decode($p['share_client']);
				}
				if(!empty($p['share_resller'])){
					$this->obj['reseller'] = handesk_decode($p['share_resller']);
				}
				if(!empty($p['share_publisher'])){
					$this->obj['publisher'] = handesk_decode($p['share_publisher']);
				}
				$this->result = $this->GlobalMD->query_global('card',$this->obj);
				if(isset($this->result->result)){
					if(isset($this->result->result->status)){
						if(!empty($this->result->result->msg)){
							 echo '<span class="label label-info">'.$this->result->result->msg .'<a href="'.$p['share_url'].'"> nhấn vào đây để thực hiện lại</a></span>';
						}
					}
				}
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
				if(!empty($_GET['s'])){ $date_start = $_GET['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_GET['e'])){ $date_end = $_GET['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$balancer_history = $this->GlobalMD->query_global('apps/api/history_balancer',$this->param);
				if(!empty($balancer_history)){
					$this->r = array('status'=>true,'result'=> $balancer_history);
				}
			}
		}
		$this->response($this->r);
	}
	public function bank_withdrawal_info_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_GET['bank_id'])){
					$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'bank_id'=>$_GET['bank_id']);
					$bank_withdrawal = $this->GlobalMD->query_global('api/balancer/bank_withdrawal_info',$this->param);
					if(!empty($bank_withdrawal)){
						$this->r = array('status'=>true,'result'=> json_decode($bank_withdrawal));
					}
				}
			}
		}
		$this->response($this->r);
	}
	public function bank_withdrawal_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token);
				$bank_withdrawal = $this->GlobalMD->query_global('api/balancer/bank_withdrawal',$this->param);
				if(!empty($bank_withdrawal)){
					$this->r = array('status'=>true,'result'=> json_decode($bank_withdrawal));
				}
			}
		}
		$this->response($this->r);
	}
}


?>