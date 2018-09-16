<?php
class Buycard extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('global_model', 'GlobalMD');	
		$this->msg = null;
		$this->obj = array();
		$this->objects = array();
		$this->cart = array();
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
	public function nl_payment(){
		
	}
	public function payments(){
		if(!empty($_POST)){
			$p = $_POST;
			if(!empty($p['type_payment'])){
				if(isset($this->token_session)){
					if($this->token_session==true){
						$this->profile = $this->session->userdata('data_user');
						if(!empty($this->profile)){
							if($p['type_payment'] = 1000){
									$this->obj['client_id'] = $this->client_id; 
									$client = $this->GlobalMD->pquery_result('apps/site/info_client_payment',$this->obj);
									if(!empty($client->result)){
										$cart = $this->session->userdata('cart');
										if(!empty($cart)){
											$balancer = (int)$client->result;
											if($balancer >  1000){
												$MoneyTransfer = (int)$cart['MoneyTransfer'];
												if($balancer > $MoneyTransfer){
													$cart['token'] = $this->_token;
													$PaymentCode = $this->GlobalMD->pquery_result('apps/site/payment_buycard_orders',$cart);
													if(!empty($PaymentCode)){
														if($PaymentCode->status==1000){
															if(!empty($PaymentCode->result)){
																$cart['RefNumber'] = $PaymentCode->result;
																if($cart['Type']==='TELCO_PINCODE'){
																	$BuyService = $this->GlobalMD->pquery_result('card/bycard/pincode',$cart);
																}else{
																	$BuyService = $this->GlobalMD->pquery_result('card/bycard/topup',$cart);
																}
																$redirect = base_url()."xac-nhan-don-hang.html?transaction=".handesk_encode(json_encode($BuyService)).'&pay='.$p['type_payment'].'&service='.$cart['Type'];
																header('Location: '.$redirect);
															}
														}else{ $this->confirm('Đơn hàng này đã tồn tại vui lòng kiểm tra lại lịch sử mua hàng'); }
													}else{ $this->confirm('Đơn hàng này đã tồn tại vui lòng kiểm tra lại lịch sử mua hàng'); }
												}else{$this->confirm('số dư tối thiểu của bạn dưới 10.000 vnđ chúng tôi không thể thực hiện lượt mua hàng này. vui lòng thử lại bằng cổng thanh toán hoặc nạp thêm số dư');}
											}else{$this->confirm('số dư tối thiểu của bạn dưới 10.000 vnđ chúng tôi không thể thực hiện lượt mua hàng này. vui lòng thử lại bằng cổng thanh toán hoặc nạp thêm số dư');}
										}else{$this->confirm('rất tiếc đơn hàng chưa được khởi tạo, bạn vui lòng thao tác lại');}
									}else{$this->confirm('tài khoản của bạn không đủ để thực hiện mua sản phẩm vui lòng chọn phương thức thanh toán khác hoặc nạp thêm số dư');}
							}else{ $this->confirm('lỗi giao dịch không tồn tại, vui lòng thử lại'); }
						}else{ $this->confirm('vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng'); }
					}else{ $this->confirm('vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng'); }
				}else{ $this->confirm('vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng'); }
			}else{ $this->confirm('lỗi chưa chọn phương thức thanh toán, vui lòng thử lại'); }
		}else{ $this->confirm('lỗi chưa chọn phương thức thanh toán, vui lòng thử lại'); }
	}
	public function complete(){
		if(isset($_GET['transaction'])){
			if(!empty($_GET['transaction'])){
				$p = json_decode(handesk_decode($_GET['transaction']));
				if(isset($p)){
					if((int)$p->status === 1000){
						if(isset($_GET['service'])){
							if($_GET['service']==='TELCO_PINCODE'){
									if(isset($_GET['pay'])){
										if((int)$_GET['pay'] === 1000){
												$this->complete_view($p);
										}else{ 
											$this->sendemail($p);
										}
									}else{ $this->complete_view($p);}
							}else{ $this->complete_view($p);}
						}else{ $this->complete_view($p);}
					}else{ $this->confirm($p->msg); }
				}else{ $this->confirm('lỗi giao dịch không tồn tại, vui lòng thử lại'); }
			}else{ $this->confirm('lỗi giao dịch không tồn tại, vui lòng thử lại'); }
		}else{ $this->confirm('lỗi giao dịch không tồn tại, vui lòng thử lại'); }
	}
	private function sendemail($p){
		
	}
	public function complete_view($p){
		$this->data['response'] = json_encode($p);
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
		$this->parser->parse('default/layout/share/complete_view_buycard',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	public function buy(){
		if(!empty($_POST)){
			$cart = $_POST;
			if(!empty($cart)){
				if(isset($this->token_session)){
					if($this->token_session==true){
						$CardQuantity = (int)$cart['CardQuantity'];
						$CardPrice = (int)$cart['CardPrice'];
						$TotalOder = $CardQuantity * $CardPrice;
						$this->param['keys'] = $cart['keys'];
						$TelcoInfo = $this->GlobalMD->pquery_result('apps/site/load_bycard_telco_info',$this->param);
						if(!empty($TelcoInfo->result)){
								$cart['Telco'] = $TelcoInfo->result->telco;
								$cart['Type'] = $TelcoInfo->result->type;
								$cart['ProductCode'] = $TelcoInfo->result->ProductCode;
								$deduct = (($TelcoInfo->result->deduct)/100);
								$rose = (($TelcoInfo->result->rose)/100);
								$PriceDiscount = $TotalOder * $deduct;
								$MoneyAfterDiscount = $TotalOder - $PriceDiscount;
								$PriceRose = $MoneyAfterDiscount * $rose;
								$MoneyTransfer = $MoneyAfterDiscount - $PriceRose;
								$this->cart = $cart;
								$this->cart['OrderID'] = $cart['Telco'].'-'.md5($this->client_id .sha1('-'.time().'-'.$cart['Type'])).time();
								$this->cart['PriceDiscount'] = $PriceDiscount;
								$this->cart['deduct'] = $deduct;
								$this->cart['rose'] = $TelcoInfo->result->rose;
								$this->cart['CardPrice'] = $CardPrice;
								$this->cart['CardName'] = $TelcoInfo->result->name;
								$this->cart['CardTitle'] = $TelcoInfo->result->title;
								$this->cart['PriceRose'] = $PriceRose;
								$this->cart['MoneyTransfer'] = $MoneyTransfer;
								$this->cart['TotalOder'] = $TotalOder;
								$this->cart['CardQuantity'] = $CardQuantity;
								$this->cart['client_id'] = $this->client_id;
								$this->cart['full_name'] = $this->profile['full_name'];
								$this->cart['email'] = $this->profile['email'];
								$this->cart['phone'] = $this->profile['phone'];
								$this->session->set_userdata('cart',$this->cart);
								$this->objects = $this->session->userdata('cart');
								if(!empty($this->objects)){
									if(is_array($this->objects)){
										$this->data['cart'] = $this->objects;
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
										$this->parser->parse('default/layout/share/thanh-toan-cart',$this->data);
										$this->parser->parse('default/layout/buycard',$this->data);
										$this->parser->parse('default/col/col-end',$this->data);
										$this->parser->parse('default/col/end-main',$this->data);
										$this->parser->parse('default/footer',$this->data);
									}else{ $this->confirm('lỗi vui lòng thử lại'); }
								}else{ $this->confirm('lỗi vui lòng thử lại'); }
						}else{ $this->confirm('xin lỗi chúng tôi đã tạm ngưng bán thẻ của nhà cung cấp này'); }
					}else{ $this->confirm('vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng'); }
				}else{ $this->confirm('vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng'); }
			}else{ $this->confirm('lỗi vui lòng thử lại'); }
		}else{ $this->confirm('lỗi vui lòng thử lại'); }
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('mua-the-dien-thoai.html').'";</script>';
	}
	public function code(){
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
		$this->parser->parse('default/layout/share/mua_ngay_main',$this->data);
		$this->parser->parse('default/layout/buycard',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	
}
?>