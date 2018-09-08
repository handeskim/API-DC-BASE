<?php
class News extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->r = array('status'=>false,'result'=>null);
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
					if($this->_role > 1 || $this->_role == 2){
						$KCFINDER = array('KCFINDER'=> array( 'disabled' => false),);
						$this->session->set_userdata($KCFINDER);
					}
					if($this->_role > 3 || $this->_role == 0){
						redirect(base_url('thong-tin-tai-khoan.html'));
					}
				}else{redirect(base_url('thoat-tai-khoan.html'));}
			}else{redirect(base_url('thoat-tai-khoan.html'));}
		}else{redirect(base_url('reseller/sign.html'));}
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('reseller/news.html').'";</script>';
	}
	public function Update_post(){
		if(!empty($_POST)){
			if(!empty($_POST['VeryAdd'])){
				$_POST['VeryAdd'] = 'on';
				$this->obj = $_POST;
				$this->obj['token'] = $this->_token;
				$obj = $this->GlobalMD->pquery_result('apps/site/blogs_update',$this->obj);
				if(!empty($obj->result)){
					if($obj->result==true){
						$this->confirm('Thành công');
					}else{$this->confirm('lỗi');}
				}else{$this->confirm('lỗi');}
			}else{$this->confirm('lỗi');}
		}else{$this->confirm('lỗi');}
		
	}
	public function AddNews_post(){
		if(!empty($_POST)){
			if(!empty($_POST['VeryAdd'])){
				$_POST['VeryAdd'] = 'on';
				$this->obj = $_POST;
				if(empty($_POST['images'])){$this->obj['images'] = base_url('public/images/default-thumb.png');}
				$this->obj['token'] = $this->_token;
				$obj = $this->GlobalMD->pquery_result('apps/site/BlogsAdd',$this->obj);
				if(!empty($obj->result)){
					if($obj->result==true){
						$this->confirm('Thành công');
					}else{$this->confirm('lỗi');}
				}else{$this->confirm('lỗi');}
			}else{$this->confirm('lỗi');}
		}else{$this->confirm('lỗi');}
		
	}	
	public function info($id){
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			if(isset($id)){
				$this->obj['token'] = $this->_token;
				$this->obj['client_id'] = $this->client_id;
				$this->obj['keys'] = $id;
				$this->result = $this->GlobalMD->query_result('api/news_cms/info',$this->obj);
				if(isset($this->result->result)){
					if(!empty($this->result->result)){ $this->data['news'] = convert_object($this->result->result);}
				}
				$this->data['root_id'] = $id;
			}
			$this->data['title'] = 'News';
			$this->data['title_main'] = 'Detail News ID#'.$id;
			$this->data['side_bar'] = 4;
			$this->parser->parse('reseller/layout/apps/news/news_cms_info',$this->data);
		}else{
			$this->is_profile();
		}
	}
	
	public function add(){
		$_SESSION['KCFINDER'] = array( 'disabled' => false);
		$this->data['title_main'] = 'Thêm mới tin tức';
		$this->parser->parse('reseller/layout/apps/news/add_news',$this->data);
	}
	public function index(){
		// var_dump($this->session->userdata('KCFINDER'));
		if($this->_role == 1 || $this->_role == 2 || $this->_role ==3){
			$_SESSION['KCFINDER'] = array( 'disabled' => false);
			$KCFINDER = array('KCFINDER'=> array( 'disabled' => false),);
			$this->session->set_userdata($KCFINDER);
			$this->data['title'] = lang('withdrawal');
			$this->data['title_main'] = lang('withdrawal');
			$this->data['side_bar'] = 4;
			$this->parser->parse('reseller/header',$this->data);
			$this->parser->parse('reseller/sidebar',$this->data);
			$this->parser->parse('reseller/main',$this->data);
			$this->parser->parse('reseller/layout/apps/news_cms',$this->data);
			$this->parser->parse('reseller/footer',$this->data);
		}else{
			$this->is_profile();
		}
	}
	public function is_profile(){
		redirect(base_url('thong-tin-tai-khoan.html'));
	}

	
}