<?php
class Share extends MY_Controller{

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
			if(!empty($this->token_session)){
				$this->data['profile'] = $this->session->userdata('data_user');
				$this->profile = $this->session->userdata('data_user');
				$this->_role = (int)$this->profile['role'];
				if(!empty($this->profile)){
					$this->client_id = ClientID($this->profile);
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
				$clients_id = $clients_info['_id']['$id'];
				$reseller = $clients_info['reseller'];
				$this->data['clients_id'] = $clients_id;
				$this->data['resller_id'] = $reseller;
				$this->data['clients_username'] = $clients_info['username'];
				$this->data['title_main'] = 'ĐỔI THẺ CÀO';
				if(!empty($_GET['publisher'])){
					$p_publisher['keys'] = $_GET['publisher'];
					$p_publisher['client_id'] = $clients_id;
					$publisher = $this->GlobalMD->query_global('apps/site/info_publisher',$p_publisher);
					if(!empty($publisher)){
						$publisher_info = convert_object($publisher->result);
						$publisher_id = $publisher_info['_id']['$id'];
						$this->data['publisher_id'] = $publisher_id;
					}else{$this->data['publisher_id'] = $reseller;}
				}else{ $this->data['publisher_id'] = $reseller;}
				$this->parser->parse('default/layout/share/nap_ngay',$this->data);
			}
		}
		
	}
	
}
?>