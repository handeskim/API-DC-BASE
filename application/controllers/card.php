<?php
class Card extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->param = array();
		$this->result = array();
		$this->profile = array();
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
				$this->obj['card_amount'] = (int)$p['card_amount'];
				$this->obj['token'] = $this->_token;
				if(!empty($p['share_client'])){
					if(!empty($this->client_id)){
						$this->obj['client_id'] = $this->client_id;
					}else{
						$this->obj['client_id'] = handesk_decode($p['share_client']);
					}
				}
				if(!empty($p['share_publisher'])){
					if(!empty($this->publisher)){
						$this->obj['publisher'] = $this->publisher;
					}else{
						$this->obj['publisher'] = handesk_decode($p['share_publisher']);
					}
				}
				$this->result = $this->GlobalMD->query_global('card',$this->obj);
				if(isset($this->result->result)){
					if(isset($this->result->result->status)){
						if(!empty($this->result->result->msg)){
							 $this->confirm($this->result->result->msg);
						}else{ $this->confirm('lỗi thử lại'); }
					}else{ $this->confirm('lỗi thử lại'); }
				}else{ $this->confirm('lỗi thử lại'); }
			}else{ $this->confirm('lỗi thử lại'); }
		}else{ $this->confirm('lỗi thử lại'); }
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('doi-the-cao.html').'";</script>';
	}
	public function index(){
		$this->obj = $this->GlobalMD->query_result('apps/site/info_card',$this->obj);
		$this->data['info_card'] = convert_object($this->obj->result);
		$this->data['title'] = 'Đổi thẻ cào sang tiền mặt nhanh chóng';
		$this->data['title_main'] = 'ĐỔI THẺ CÀO';
		if(!empty($this->client_id)){
			$this->data['clients_id'] = $this->client_id;
			if(isset($this->profile['full_name'])){
					$this->data['clients_username'] = $this->profile['full_name'];
			}
		}else{
			$this->data['clients_username'] = 'vui lòng đăng nhập sau đó thực hiện chuyển đổi thẻ cào';
		}
		if(isset($this->profile['publisher_id'])){
			$this->data['publisher_id'] = $this->profile['publisher_id'];
		}
		if(isset($this->profile['reseller'])){
			$this->data['resller_id'] = $this->profile['reseller'];
		}
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/adson/faq_box',$this->data);
		$this->parser->parse('default/adson/new_box',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/share/doi_ngay_main',$this->data);
		$this->parser->parse('default/layout/deduct',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	
}
?>