<?php
class Activation extends MY_Controller{
	public $responses;
	public $provide_service; 
	public $token;
	public $keys;
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
		$this->load->library('rest');
		$this->provide_service  = $this->config->item('provide_service');
		$config =  array('server' => $this->provide_service);
		$this->rest->initialize($config);
		$this->keys = CORE_KEY();
		$this->consumer_key = CONSUMER_KEY();
		$this->consumer_secret = CONSUMER_SECRET();
		$this->consumer_ttl = CONSUMER_TTL();
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
	
	private function active($x){
		try{
			$param = array('param' => json_encode(array('username' => $x->email,'password' => $x->password, 'status'=> 2,)),);
			$response = $this->rest->get('token/create',$param);
			if(isset($response->responses->result->data->access_token->code->code)){
				if(!empty($response->responses->result->data->access_token->code->code)){
					$code = $response->responses->result->data->access_token->code->code;
					if($code == 1000){
						$access_token = $response->responses->result->data->access_token->results;
						$active_last = $this->update_active($access_token);
						if($active_last==true){
							$this->session->set_userdata(array('access_token'=>$access_token));
							$check_session_access_token = $this->session->userdata('access_token');
							if(isset($check_session_access_token)){
								if($check_session_access_token==true){
									return $active_last;
								}else{return false;}
							}else{return false;}
						}else{return false;}
					}else{return false;}
				}else{return false;}
			}else{
			
				return false;
			}
		}catch (Exception $e){ return false; }
	}
	
	private function update_active($access_token){
		try{
			$param = array(
				'param' => json_encode(array(
					'access_token' => $access_token,
				)),
			);
			$response = $this->rest->get('token/activation',$param);
			if(isset($response)){
				if(!empty($response->responses->responses->data->activation_validate)){
					if($response->responses->responses->data->activation_validate == true){
						return true;
					}else{ return false; }
				}else{ return false; }
			}else{ return false; }
		}catch (Exception $e) {return false;}
	}
	
	public function index(){
		if(isset($_GET['token'])){
			$x = core_decode($_GET['token']);
			if(!empty($x)){
				$verify_active = $this->active(json_decode($x));
				if($verify_active==true){
					$this->msg = $this->temp_error();
				}else{
					$this->msg = $this->temp_success();
				}
			}
		}
		$lang_details = $this->session->userdata('lang_details');
		if(!empty($lang_details)){
			$this->title_main = "Kích Hoạt Tài Khoản";
		}else{
			$this->title_main = "Activation uGroup Account";
			$this->title = "Activation Account";
		}
		$this->data = array(
			'msg' => $this->msg,
			'title'=> $this->title,
			'keywords'=> $this->keywords,
			'description' => $this->description,
			'title_main' => $this->title_main,
		);
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/layout/Upgrade_System',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	
	private function temp_success(){
		$temp = '<div class="alert alert-success  bg-orange alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-success"></i> Success!</h4>
						Activation Success. Please Back To Sign;
					</div>';
		return $temp;
	}
	
	private function temp_error(){
		$temp = '<div class="alert alert-danger  bg-orange alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Error!</h4>
						Error Activation? Please Try Again. 
					</div>';
		return $temp;
	}
	

	
	
	
}
?>