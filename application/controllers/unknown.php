<?php
class Unknown extends MY_Controller{
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
	
	
	public function index(){
		$alias =  (string)$this->uri->segment(1);
		if(!empty($alias)){
			if($alias === 'khong-ton-tai-trang' || $alias === 'loi-truy-cap-trang' || $alias === 'unknown' || $alias === '404_override'){ 
				$this->index_details(); 
			}else{
				$alias_page = $this->alias($alias);
				if(!empty($alias_page->result)){
					$this->details($alias_page);
				}else{
					if(!empty($_GET['next'])){
							$limit = (int)$_GET['next'];
						}else{
							$limit = 1;
						}
					if($alias=='tin-tuc'){
						
						$alias_tin_tuc = $this->alias_tin_tuc('news',$limit);
					
						if(!empty($alias_tin_tuc->result)){
							$nextx = $alias_tin_tuc->next;
							$this->list_categories($alias_tin_tuc->result,$nextx);
						}else{
							$this->index_details();
						}
					}else if($alias=='faq'){
						$alias_tin_tuc = $this->alias_tin_tuc('faq',$limit);
						if(!empty($alias_tin_tuc->result)){
							$nextx = $alias_tin_tuc->next;
							$this->list_categories($alias_tin_tuc->result,$nextx);
						}else{
							$this->index_details();
						}
					}else{
						$this->index_details();
					}
				}
			}
		}else{
			$this->index_details();
		}
	}
	public function list_categories($param,$next){
		
			$this->data['related'] = $param;
			$this->data['next'] = $next;
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
			$this->parser->parse('default/col/col-8-start',$this->data);
			$this->parser->parse('default/layout/categories',$this->data);
			$this->parser->parse('default/col/col-end',$this->data);
			$this->parser->parse('default/col/end-main',$this->data);
			$this->parser->parse('default/footer',$this->data);
	}
	public function details($details){
		$p = convert_object($details->result[0]);
		if(!empty($details->related[0])){
			$related = convert_object($details->related);
			$this->data['related'] = $related;
		}
		if(!empty($p['keywords'])){$this->data['keywords_seo'] = $p['keywords'];}
		if(!empty($p['description'])){$this->data['description'] = $p['description'];}
		if(!empty($p['description_seo'])){$this->data['description_seo'] = $p['description_seo'];}
		if(!empty($p['images'])){$this->data['img_details'] = $p['images'];}
		if(!empty($p['images'])){$this->data['image_seo'] = $p['images'];}
		if(!empty($p['title'])){$this->data['title_seo'] = $p['title'];}
		if(!empty($p['title'])){$this->data['title'] = $p['title'];}
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'other', 'dynx_totalvalue' => 0 );
		$this->data['details'] = $p;
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
		$this->parser->parse('default/col/col-8-start',$this->data);
		$this->parser->parse('default/layout/details',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	public function alias($alias){
		$this->obj['alias'] = $alias;
		$this->result = $this->GlobalMD->pquery_result('apps/site/alias',$this->obj);
		return $this->result;
	}
	public function alias_tin_tuc($alias,$limit){
		if(!empty($limit)){
			if($limit < 1){
				$offset = 1;
			}else{
				$offset = (int)$limit;
			}
		}
		$this->obj['categories'] = $alias;
		$this->obj['limit'] = $offset;
		$this->result = $this->GlobalMD->pquery_result('apps/site/new_categories',$this->obj);
		return $this->result;
	}
	public function categories($categories){
		return $this->result;
	}
	public function index_details(){
	
		$this->data['remarketing'] = array('dynx_itemid' =>'','dynx_pagetype' => 'home', 'dynx_totalvalue' => 0 );
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/adson/faq_box',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-8-start',$this->data);
		$this->parser->parse('default/unknown',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	
	}
	
	
	
	
}
?>