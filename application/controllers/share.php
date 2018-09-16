<?php
class Share extends MY_Controller{

	function __construct(){
		parent::__construct();
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
							return $this->return_msg($this->result->result,$p['share_url']);
						}
					}
				}
			}
		}
	}
	public function index(){
		$alias =  (string)$this->uri->segment(2);
		if(isset($alias)){
			$p_clients['keys'] = $alias;
			$clients = $this->GlobalMD->query_global('apps/site/info_clients',$p_clients);
			if(!empty($clients)){
				$this->obj = $this->GlobalMD->query_global('apps/site/info_card',$this->obj);
				$this->data['info_card'] = convert_object($this->obj->result);
				$clients_info = convert_object($clients->result);
				$clients_id = $alias;
				$reseller = $clients_info['reseller'];
				$this->data['clients_id'] = $clients_id;
				$this->data['resller_id'] = $reseller;
				$this->data['clients_username'] = $clients_info['full_name'];
				$this->data['title_main'] = 'ĐỔI THẺ CÀO';
				if(!empty($_GET['pub'])){
					$this->data['pub'] = $_GET['pub'];
					$p_publisher['keys'] = $_GET['pub'];
					$p_publisher['partner'] = $alias;
					$publisher = $this->GlobalMD->query_global('apps/site/info_publisher',$p_publisher);
					if(!empty($publisher)){
						$publisher_info = convert_object($publisher->result);
						$this->data['publisher_id'] = $publisher_info['client_id'];
					}else{
						$this->data['pub'] = null;
						$this->data['publisher_id'] = $reseller;
					}
				}else{ 
					$this->data['pub'] = null;
					$this->data['publisher_id'] = $reseller;
				}
				$this->parser->parse('default/layout/share/nap_ngay_publisher',$this->data);
			}
		}
		
	}
	
	public function buy(){
		$alias =  (string)$this->uri->segment(2);
		if(isset($alias)){
			$p_clients['keys'] = $alias;
			if(isset($this->client_id)){
				if($this->client_id === $alias){
					$clients = $this->GlobalMD->query_global('apps/site/info_clients',$p_clients);
					if(!empty($clients)){
						$this->obj = $this->GlobalMD->pquery_result('apps/site/load_bycard',array());
						$clients_info = convert_object($clients->result);
						$clients_id = $alias;
						$reseller = $clients_info['reseller'];
						$this->data['clients_id'] = $clients_id;
						$this->data['resller_id'] = $reseller;
						$this->data['clients_username'] = $clients_info['full_name'];
						$this->data['title_main'] = 'ĐỔI THẺ CÀO';
						if(!empty($_GET['pub'])){
							$this->data['pub'] = $_GET['pub'];
							$p_publisher['keys'] = $_GET['pub'];
							$p_publisher['partner'] = $alias;
							$publisher = $this->GlobalMD->query_global('apps/site/info_publisher_buy',$p_publisher);
							if(!empty($publisher)){
								$publisher_info = convert_object($publisher->result);
								$this->data['publisher_id'] = $publisher_info['client_id'];
							}else{
								$this->data['pub'] = null;
								$this->data['publisher_id'] = $reseller;
							}
						}else{ 
							$this->data['pub'] = null;
							$this->data['publisher_id'] = $reseller;
						}
						$this->parser->parse('default/layout/share/mua_ngay_publisher',$this->data);
					}
				}else{ echo 'không tồn tại tài khoản vui lòng đăng nhập thực hiện mua thẻ ! <a href="'.base_url().'"> Nhấn vào đây quay trở lại</a>';}
			}else{ echo 'vui lòng đăng nhập trước khi thực hiện mua thẻ ! <a href="'.base_url().'"> Nhấn vào đây quay trở lại</a>';}
		}
		
	}
}
?>