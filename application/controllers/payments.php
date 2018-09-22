<?php
require APPPATH .'/libraries/include/NL_Checkoutv3.php';
class Payments extends MY_Controller{
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
		
		$this->object_name = $this->GlobalMD->nganluong_sevice();
		
		
		if(isset($this->token_session)){  
			if($this->token_session==true){
				$this->profile = $this->session->userdata('data_user');
				$this->_role = (int)$this->profile['role'];
				if(!empty($this->profile)){
					$this->data['token_session'] = $this->session->userdata('token_session');
					$this->data['profile'] = $this->session->userdata('data_user');
					$this->client_id = ClientID($this->profile);
					$this->data['client_id'] = $this->client_id;
				}else{redirect(base_url('thoat-tai-khoan.html'));}
			}else{redirect(base_url('thoat-tai-khoan.html'));}
		}else{redirect(base_url('dang-ky.html'));}
	}
	
	public function pay_nganluong_confim(){
		try {
			if(!empty($_GET['error_code'])){
				if(!empty($_GET['pid'])){
					if(!empty($_GET['token'])){
						$error_code = $_GET['error_code'];
						$token = $_GET['token'];
						$order_id = handesk_decode($_GET['pid']);
						if(!empty($order_id)){
							$MERCHANT_ID = $this->object_name->result->merchant_id;
							$MERCHANT_PASS = $this->object_name->result->merchant_pass;
							$RECEIVER = $this->object_name->result->receiver;
							$URL_API = $this->object_name->result->url_api;
							$nlcheckout = new NL_CheckOutV3($MERCHANT_ID,$MERCHANT_PASS,$RECEIVER,$URL_API);
							$nl_result = $nlcheckout->GetTransactionDetail($token);
							if($nl_result){
								$nl_errorcode           = (string)$nl_result->error_code;
								$nl_transaction_status  = (string)$nl_result->transaction_status;
								if($nl_errorcode == '00') {
									if($nl_transaction_status == '00') {
										$this->obj['error_code'] = $error_code;
										$this->obj['token_transfer'] = $token;
										$this->obj['token'] = $this->_token;
										$this->obj['order_code'] = $order_id;
										$this->obj['transaction'] = 'done';
										$this->obj['client_id'] = $this->client_id;
										$object = $this->GlobalMD->pquery_result('apps/site/payment_confim',$this->obj);
										if($object->status==true){
											if($object->result==true){
												$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp số dư giao dịch');
											}else{
												$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp số dư giao dịch');
											}
										}
										if($object->status==100){
											$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp số dư giao dịch');
										}
									}else{
										$this->obj['error_code'] = $error_code;
										$this->obj['token'] = $token;
										$this->obj['order_id'] = $order_id;
										$this->obj['transaction'] = 'reject';
										$object = $this->GlobalMD->pquery_result('apps/site/payment_reject',$this->obj);
										if($object->status==true){
											if($object->result==true){
												$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
											}else{
												$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
											}
										}
										if($object->status==100){
											$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
										}
									}
								}else{
									$this->obj['error_code'] = $error_code;
									$this->obj['token'] = $token;
									$this->obj['order_id'] = $order_id;
									$this->obj['transaction'] = 'reject';
									$object = $this->GlobalMD->pquery_result('apps/site/payment_reject',$this->obj);
									if($object->status==true){
										if($object->result==true){
											$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
										}else{
											$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
										}
									}
									if($object->status==100){
										$this->confirm('đơn hàng xử lý thành công vui kiểm tra lại lịch sử nạp giao dịch');
									}
								}
							}
						}
					}
				}
			}
		}catch(Exception $e) { }
	}
	public function pay_nganluong_cancel(){
			if(isset($_GET['token'])){
				$p = handesk_decode($_GET['token']);
				if(!empty($p)){
					$this->obj['id_clients'] = $this->client_id;
					$this->obj['order_code'] = $p;
					$object = $this->GlobalMD->pquery_result('apps/site/cancel_payments',$this->obj);
					if($object->result==true){
						$this->confirm('hủy đơn hàng thành công');
					}else{
						$this->confirm('lỗi không xác định vui lòng thử lại');
					}
				}else{ $this->confirm('lỗi không có token'); }
			}else{ $this->confirm('lỗi không có token'); }
	}
	public function pay_nganluong(){
		if(!empty( $this->object_name)){
			$cart = $_POST;
			if(isset($cart)){
					if(isset($_POST['bankcode'])){
						if(isset($_POST['money_transfer'])){
							if(isset($_POST['option_payment'])){
								$MERCHANT_ID = $this->object_name->result->merchant_id;
								$MERCHANT_PASS = $this->object_name->result->merchant_pass;
								$RECEIVER = $this->object_name->result->receiver;
								$URL_API = $this->object_name->result->url_api;
								$nlcheckout = new NL_CheckOutV3($MERCHANT_ID,$MERCHANT_PASS,$RECEIVER,$URL_API);
								$order_code = $this->client_id .'-'.core_token_csrf().'-'.time();
								$total_amount= $_POST['money_transfer'];
								$payment_method = $_POST['option_payment'];
									
								$bank_code = $_POST['bankcode'];
								$tax_amount = 0;
								$fee_shipping = 0;
								$discount_amount = 0;
								$buyer_address = $this->profile['address'];
								$payment_type = 1;
								$order_description = 'NẠP SỐ DƯ TÀI KHOẢN# '.$this->client_id;
								$buyer_fullname = $this->profile['full_name'];
								$buyer_email = $this->profile['email'];
								$buyer_mobile = $this->profile['phone'];
								$return_url = base_url().'payments/pay_nganluong_confim?pid='.handesk_encode($order_code);
								$cancel_url = urlencode(base_url().'payments/pay_nganluong_cancel?token='.handesk_encode($order_code)); 
								
								$array_items[0]= array('item_name1' => $order_description, 'item_quantity1' => 1,'item_amount1' => $total_amount, 'item_url1' =>  base_url());
								
								if($payment_method !='' && $buyer_email !="" && $buyer_mobile !="" && $buyer_fullname !="" && filter_var( $buyer_email, FILTER_VALIDATE_EMAIL )  ){
								if($payment_method =="VISA"){
								$nl_result= $nlcheckout->VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
								$fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
								$buyer_address,$array_items,$bank_code);
								}elseif($payment_method =="NL"){
								$nl_result= $nlcheckout->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
								$fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
								$buyer_address,$array_items);
								}elseif($payment_method =="ATM_ONLINE" && $bank_code !='' ){
								$nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
								$fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
								$buyer_address,$array_items) ;
								}
								elseif($payment_method =="NH_OFFLINE"){
								$nl_result= $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
								}
								elseif($payment_method =="ATM_OFFLINE"){
								$nl_result= $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
								}
								elseif($payment_method =="IB_ONLINE"){
								$nl_result= $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
								}
								elseif ($payment_method == "CREDIT_CARD_PREPAID") {
								$nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
								}
								// var_dump($nl_result);
								// die;
								if ($nl_result->error_code =='00'){
									$this->obj = array(
										'order_code' => $order_code,
										'id_clients' => $this->client_id,
										'payment_method' => $payment_method,
										'buyer_fullname' => $buyer_fullname,
										'buyer_email' => $buyer_email,
										'buyer_mobile' => $buyer_mobile,
										'payment_type' => $payment_type,
										'order_description' => $order_description,
										'total_amount' => (int)$total_amount,
										'bank_code' => $bank_code,
										'date_create' => date('Y-m-d H:i:s',time()),
										'time_crate' => time(),
										'service_name' => 'NGANLUONG',
										'transaction' => 'hold',
										'status' => true,
										'token_service' => urlencode($nl_result->token),
										'error_code' => $nl_result->error_code,
										'checkout_url' => urlencode($nl_result->checkout_url),
									);
								$install_transaction = $this->GlobalMD->pquery_result('apps/site/transaction_payment_init',$this->obj);
								if($install_transaction==true){
								$this->session->set_userdata(array('order_payments' => $install_transaction));
									$checkout_url = (string)$nl_result->checkout_url;
										header("Location: $checkout_url");
								} else{$this->confirm('lỗi, hệ thống không trả lời giao dịch');}
								}else{$this->confirm('lỗi, không xác nhận giao dịch');}
								}else{$this->confirm('lỗi, chưa chọn cổng thanh toán');}
							}else{$this->confirm('lỗi, chưa chọn cổng thanh toán');}
						}else{$this->confirm('lỗi, chưa chọn cổng thanh toán');}
					}else{$this->confirm('lỗi, chưa chọn phương thức thanh toán');}
			}else{$this->confirm('lỗi, chưa tồn tại đơn hàng');}
		}else{$this->confirm('Hệ thống tạm ngưng giao dịch với cổng thanh toán này vui lòng thử lại');}
	}
	public function pay(){
		if(!empty($_POST['name_service'])){
			if($_POST['name_service']=="NGANLUONG"){
					$this->data['money_transfer'] = $_POST['money_transfer'];
					$this->data['title_main'] = 'NẠP TIỀN VÀO SỐ DƯ TÀI KHOẢN BẰNG NGÂN LƯỢNG';
					$this->data['title'] = 'NẠP TIỀN VÀO SỐ DƯ TÀI KHOẢN KHOẢN BẰNG NGÂN LƯỢNG';
					$this->parser->parse('default/header',$this->data);
					$this->parser->parse('default/header-top',$this->data);
					$this->parser->parse('default/adson/header_top',$this->data);
					$this->parser->parse('default/adson/header_nav',$this->data);
					$this->parser->parse('default/col/start-main',$this->data);
					$this->parser->parse('default/col/col-3-start',$this->data);
					$this->parser->parse('default/adson/support',$this->data);
					$this->parser->parse('default/adson/faq_box',$this->data);
					$this->parser->parse('default/col/col-end',$this->data);
					$this->parser->parse('default/col/col-9-start',$this->data);
					$this->parser->parse('default/layout/share/ngan_luong_pay',$this->data);
					$this->parser->parse('default/col/col-end',$this->data);
					$this->parser->parse('default/col/end-main',$this->data);
					$this->parser->parse('default/footer',$this->data);
			}
		}else{$this->confirm('lỗi, chưa chọn cổng thanh toán');}
	}
	public function confirm($msg){
		echo '<script> alert("'.$msg.'"); window.location.href = "'.base_url('nap-tai-khoan.html').'";</script>';
	}
	public function index(){
		$this->obj = $this->GlobalMD->query_global('apps/site/info_service_payments',$this->obj);
		$this->data['info_card'] = $this->obj->result;
		$this->data['title_main'] = 'NẠP TIỀN VÀO SỐ DƯ TÀI KHOẢN';
		$this->data['title'] = 'NẠP TIỀN VÀO SỐ DƯ TÀI KHOẢN';
		$this->parser->parse('default/header',$this->data);
		$this->parser->parse('default/header-top',$this->data);
		$this->parser->parse('default/adson/header_top',$this->data);
		$this->parser->parse('default/adson/header_nav',$this->data);
		$this->parser->parse('default/col/start-main',$this->data);
		$this->parser->parse('default/col/col-3-start',$this->data);
		$this->parser->parse('default/adson/support',$this->data);
		$this->parser->parse('default/adson/faq_box',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/col-9-start',$this->data);
		$this->parser->parse('default/layout/share/nap_ngay_main',$this->data);
		$this->parser->parse('default/col/col-end',$this->data);
		$this->parser->parse('default/col/end-main',$this->data);
		$this->parser->parse('default/footer',$this->data);
	}
	
}
?>