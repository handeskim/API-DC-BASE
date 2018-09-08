<?php
require APPPATH . '/libraries/REST_Controller.php';
class Service extends REST_Controller {
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
		$this->_token = $this->GlobalMD->_token();
		$this->data['msg'] = null;
		$this->api_name = $this->config->item('api_name');
		$this->secret_key = $this->config->item('secret_key');
		$this->priv_key = $this->config->item('priv_key');
		$this->token_session = $this->session->userdata('token_session');
		if($this->token_session){
			$this->data['profile'] = $this->session->userdata('data_user');
			$this->profile = $this->session->userdata('data_user');
			$this->client_id = ClientID($this->profile);
			$this->role = $this->profile['role'];
			if(!empty($this->profile)){
				$this->ClientID = ClientID($this->profile);
			}
		}
	}
	public function developer_edit_post(){
		if(!empty($_POST)){
			$this->obj = $_POST;
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$update = $this->GlobalMD->query_result('api/developer/update',$this->obj);
			$this->r = array('status'=>true,'data'=> $update);
		}
		$this->response($this->r);
	}
	public function developer_del_get(){
		if(!empty($_GET['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_GET['e'];
			$developer = $this->GlobalMD->query_result('api/developer/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function bank_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/bank_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}	
	public function card_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/card_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}		
	public function card_cms_cancel_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/card_cms/cancel',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}	
	public function card_cms_agreed_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/card_cms/agreed',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}	
	public function transfer_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/transfer_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function withdrawal_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/withdrawal_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
		public function withdrawal_cms_agree_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/withdrawal_cms/agree',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function withdrawal_cms_cancel_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/withdrawal_cms/cancel',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function bank_config_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/bank_cms/bank_config_cms_del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function cms_staff_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/staff_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}

	public function developer_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$developer = $this->GlobalMD->query_result('api/developer',$this->param);
					if(!empty($developer)){
						if((int)$developer->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $developer->result);
						}
					}
			}
		}
		$this->response($this->r);
	}	
	public function card_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$developer = $this->GlobalMD->query_result('api/card_cms',$this->param);
					if(!empty($developer)){
						if((int)$developer->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $developer->result);
						}
					}
			}
		}
		$this->response($this->r);
	}
	public function news_cms_del_post(){
		if(!empty($_POST['e'])){
			$this->obj['token'] = $this->_token;
			$this->obj['client_id'] = $this->client_id;
			$this->obj['keys'] = $_POST['e'];
			$developer = $this->GlobalMD->query_result('api/news_cms/del',$this->obj);
			$this->r = array('status'=>true,'data'=> $developer);
		}
		$this->response($this->r);
	}
	public function news_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$developer = $this->GlobalMD->query_result('api/news_cms',$this->param);
					if(!empty($developer)){
						if((int)$developer->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $developer->result);
						}
					}
			}
		}
		$this->response($this->r);
	}
	public function withdrawal_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$developer = $this->GlobalMD->query_result('api/withdrawal_cms',$this->param);
					if(!empty($developer)){
						if((int)$developer->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $developer->result);
						}
					}
			}
		}
		$this->response($this->r);
	}		
	public function transfer_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$developer = $this->GlobalMD->query_result('api/transfer_cms',$this->param);
					if(!empty($developer)){
						if((int)$developer->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $developer->result);
						}
					}
			}
		}
		$this->response($this->r);
	}	
	public function bank_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$bank_cms = $this->GlobalMD->query_result('api/bank_cms',$this->param);
					if(!empty($bank_cms)){
						if((int)$bank_cms->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $bank_cms->result);
						}
					}
			}
		}
		$this->response($this->r);
	}		
	public function bank_config_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token);
					$bank_config_cms = $this->GlobalMD->query_result('api/bank_cms/config',$this->param);
					if(!empty($bank_config_cms)){
						if((int)$bank_config_cms->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $bank_config_cms->result);
						}
					}
			}
		}
		$this->response($this->r);
	}	
	public function staff_cms_get(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
					if(!empty($_GET['sd'])){ $date_start = $_GET['sd'];}else{$date_start = date("Y-m-d",time());}
					if(!empty($_GET['ed'])){ $date_end = $_GET['ed'];}else{$date_end = date("Y-m-d",time());}
					$this->param = array('client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
					if(!empty($_GET['date_start'])){ }
					if(!empty($_GET['date_start'])){ }
					$staff_cms = $this->GlobalMD->query_result('api/staff_cms',$this->param);
					if(!empty($staff_cms)){
						if((int)$staff_cms->status->status == 1000){
							$this->r = array('status'=>true,'data'=> $staff_cms->result);
						}
					}
			}
		}
		$this->response($this->r);
	}
	
}


?>