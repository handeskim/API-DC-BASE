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
		$this->result = $this->GlobalMD->query_global('card',$this->obj);
		var_dump($this->result);
	}
	public function example_buygame_get(){
		$this->obj['keys'] = '5b9993bc72cfc835908e37b0';
		$this->obj['quantity'] = '1';
		$this->obj['cardprice'] = '20000';
		$this->obj['token'] = $this->_token;
		$this->result = $this->GlobalMD->query_global('card/buy/game',$this->obj);
		var_dump($this->result);
	}
	public function example_buy_get(){
		$this->obj['keys'] = '5b96e28072cfc835908e379a';
		$this->obj['quantity'] = '1';
		$this->obj['cardprice'] = '20000';
		$this->obj['mobile'] = '0972337122';
		$this->obj['token'] = $this->_token;
		$this->result = $this->GlobalMD->query_global('card/buy',$this->obj);
		var_dump($this->result);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function disable_notify_popup_get(){
		$this->session->set_userdata(array('notify_popup'=>1001));
		$_SESSION['notify_popup'] = 1001;
		$this->r['status'] = true;
		$this->response($this->r);
	}
	public function notify_popup_get(){
		if(!empty($_GET['e'])){
			if($_GET['e']==true){
				$obj = $this->GlobalMD->pquery_result('apps/site/site_notification',$this->obj);
				if(!empty($obj->result)){
					$this->session->set_userdata(array('notify_popup'=>1000));
					$this->r['data'] = $obj->result;
					$this->r['status'] = true;
				}else{
					$this->session->set_userdata(array('notify_popup'=>1000));
					$this->r['status'] = true;
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
							return $this->return_msg($this->result->result,$p['share_url']);
						}
					}
				}
			}
		}
	}
	public function return_msg($result,$share_url){
		 echo '<span class="label label-info">'.$result->msg .'<a href="'.$share_url.'"> nhấn vào đây để thực hiện lại</a></span>';
	}
	public function BuyPincode_post(){
		if(!empty($_POST)){
			$p = $_POST;
			if(!empty($p['keys']) || !empty($p['cardprice']) || !empty($p['quantity'])){
				$this->obj['keys'] = $p['keys'];
				$this->obj['cardprice'] = $p['cardprice'];
				$this->obj['quantity'] = $p['quantity'];
				$this->obj['token'] = $this->_token;
				if(!empty($p['share_client'])){$this->obj['client_id'] = handesk_decode($p['share_client']);}
				if(!empty($p['share_resller'])){$this->obj['reseller'] = handesk_decode($p['share_resller']);}
				if(!empty($p['share_publisher'])){$this->obj['publisher'] = handesk_decode($p['share_publisher']);}
				$this->result = $this->GlobalMD->query_result('card/buy',$this->obj);
				if(!empty($this->result->status)){
					if($this->result->status === 1000){
						$x = $this->result;
						if(!empty($x->trace)){
							if(!empty($x->trace->RespCode)){
								if( $x->trace->RespCode === '00'){
									if(!empty($x->trace->CardInfo)){
										$array = array(
											'response' => $x->trace->CardInfo,
											'share_url' => $p['share_url'],
										);
										$res = handesk_encode(json_encode($array));
										redirect(base_url('api/buy_card?token='.$res));
									}else{
										$array = array('message' => $x->trace->transaction, );
										$res = handesk_encode(json_encode($array));
										redirect(base_url('api/message_buy_card?token='.$res));
									}
								}else{
									$array = array('message' => 'lỗi mua thẻ',);
									$res = handesk_encode(json_encode($array));
									redirect(base_url('api/message_buy_card?token='.$res));
								}
							}else{
									$array = array('message' => 'lỗi mua thẻ',);
								$res = handesk_encode(json_encode($array));
								redirect(base_url('api/message_buy_card?token='.$res));
							}
						}else{
							$array = array('message' => 'lỗi mua thẻ',);
							$res = handesk_encode(json_encode($array));
							redirect(base_url('api/message_buy_card?token='.$res));
						}
					}else{
						$array = array('message' => 'lỗi mua thẻ',);
						$res = handesk_encode(json_encode($array));
						redirect(base_url('api/message_buy_card?token='.$res));
					}
				}else{
						$array = array('message' => 'lỗi mua thẻ',);
					$res = handesk_encode(json_encode($array));
					redirect(base_url('api/message_buy_card?token='.$res));
				}
			}else{
					$array = array('message' => 'lỗi mua thẻ',);
				$res = handesk_encode(json_encode($array));
				redirect(base_url('api/message_buy_card?token='.$res));
			}
		}else{
			$array = array('message' => 'lỗi mua thẻ',);
			$res = handesk_encode(json_encode($array));
			redirect(base_url('api/message_buy_card?token='.$res));
		}
	}
	public function message_buy_card_get(){
		$p = handesk_decode($_GET['token']);
		if(isset($p)){
			$x = json_decode($p);
			if(isset($x->message)){
				echo $x->message;
				echo '<a style="padding: 10px;background: #03A9F4;float:  left;width: 23.33%;text-align: center;color: #fff;text-transform: uppercase;font-size: 14px;font-weight: 800;text-decoration: dashed;" href="'.base_url() .'">nhấn vào đây trở về </a>';
			}
		}else{
			echo 'lỗi không xác định, <a style="padding: 10px;background: #03A9F4;float:  left;width: 23.33%;text-align: center;color: #fff;text-transform: uppercase;font-size: 14px;font-weight: 800;text-decoration: dashed;" href="'.base_url() .'">nhấn vào đây trở về </a>';
		}
		
	}
	public function buy_card_get(){
		$p = handesk_decode($_GET['token']);
		if(isset($p)){
			$x = json_decode($p);
			$response = $x->response;
			$share_url = $x->share_url;
			$temp = '<table style="border: 1px solid #333;">';
			$temp .= '<tr style="border: 1px solid #333;">';
			$temp .= '<td style="border: 1px solid #333;">Mã thẻ</td>';
			$temp .= '<td style="border: 1px solid #333;">Mã Seri</td>';
			$temp .= '<td style="border: 1px solid #333;">Hạn sử dụng</td>';
			$temp .= '</tr>';
			foreach($response as $v){
				if(isset($v->card_code)){ $card_code = $v->card_code; }else{ $card_code = null; }
				if(isset($v->card_serial)){ $card_serial = $v->card_serial; }else{ $card_serial = null; }
				if(isset($v->expiration_date)){ $expiration_date = $v->expiration_date; }else{ $expiration_date = null; }
				$temp .= '<tr style="border: 1px solid #333;">';
				$temp .= '<td style="border: 1px solid #333;">' . $card_code .'</td>';
				$temp .= '<td style="border: 1px solid #333;">' . $card_serial .'</td>';
				$temp .= '<td style="border: 1px solid #333;">'. $expiration_date .'</td>';
				$temp .= '</tr>';
			}
			$temp .= '</table>';
			echo $temp;
			echo '<a href="'.$share_url.'" style="padding: 10px;background: #03A9F4;float:  left;width: 23.33%;text-align: center;color: #fff;text-transform: uppercase;font-size: 14px;font-weight: 800;text-decoration: dashed;">nhấn vào đây để mua tiếp</a>';
		}else{
			echo 'lỗi không xác định, <a href="'.base_url() .'">nhấn vào đây trở về </a>';
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
	public function balancer_history_post(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_POST['s'])){ $date_start = $_POST['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_POST['e'])){ $date_end = $_POST['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$balancer_history = $this->GlobalMD->query_global('apps/api/history_balancer',$this->param);
				if(!empty($balancer_history)){
					$this->r = array('status'=>true,'result'=> $balancer_history);
				}
			}
		}
		$this->response($this->r);
	}
	public function history_naptien_post(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_POST['s'])){ $date_start = $_POST['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_POST['e'])){ $date_end = $_POST['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$history_naptien = $this->GlobalMD->pquery_global('apps/api/history_naptien',$this->param);
				if(!empty($history_naptien)){
					$this->r = array('status'=>true,'result'=> $history_naptien);
				}
			}
		}
		$this->response($this->r);
	}
	public function withdrawal_balancer_history_post(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_POST['s'])){ $date_start = $_POST['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_POST['e'])){ $date_end = $_POST['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$balancer_history = $this->GlobalMD->query_global('apps/api/history_withdrawal',$this->param);
				if(!empty($balancer_history)){
					$this->r = array('status'=>true,'result'=> $balancer_history);
				}
			}
		}
		$this->response($this->r);
	}	
	public function history_card_post(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_POST['s'])){ $date_start = $_POST['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_POST['e'])){ $date_end = $_POST['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$history_card = $this->GlobalMD->query_global('apps/api/history_card',$this->param);
				// var_dump($history_card);
				if(!empty($history_card)){
					$this->r = array('status'=>true,'result'=> $history_card);
				}
			}
		}
		$this->response($this->r);
	}
	public function history_buycard_post(){
		if(!empty($this->token_session)){
			if(!empty($this->ClientID)){
				if(!empty($_POST['s'])){ $date_start = $_POST['s'];}else{$date_start = date("Y-m-d",time());}
				if(!empty($_POST['e'])){ $date_end = $_POST['e'];}else{$date_end = date("Y-m-d",time());}
				$this->param = array( 'client_id'=>$this->ClientID,'token'=>$this->_token,'date_start'=>$date_start,'date_end'=>$date_end);
				$history_card = $this->GlobalMD->query_global('apps/api/history_buycard',$this->param);
				if(!empty($history_card)){
					$this->r = array('status'=>true,'result'=> $history_card);
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