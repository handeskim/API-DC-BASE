<div class="col-md-12 col-sm-12 col-xs-12 main-dich-vu" >
<div class="col-md-6 col-sm-6 col-xs-6 main-dich-vu-sub card-box">
<form method="post" action="<?php echo base_url('api/card')?>">
<div class="col-md-12 col-sm-12 col-xs-12 sub main-dich-vu-title">
	<h1> {title_main} </h1>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub home-body-main">
	<?php if(!empty($info_card)){ 
	?>
	<label> Tài khoản hưởng thụ:  {clients_username} </label>
	<div class="form-group">
		<select id="card_type" name="card_type" class="form-control txt">
			<?php foreach($info_card as $v){?>
				<option value="<?php if(!empty($v['card_type'])){ echo $v['card_type'];}?>"><?php if(!empty($v['name'])){ echo $v['name'].'('.$v['deduct'].'%)';}?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">  
		<label> Số Seri </label>
		<input type="text" class="form-control" name="card_seri" max="25" value="" required="" placeholder="là dãy mã bên ngoài">
	</div> 
	<div class="form-group">  
		<label> Mã thẻ</label>
		<input type="text" class="form-control" name="card_code" max="25" value="" required="" placeholder="là dãy mã bên trong lớp bạc" >
	</div>
	<div class="form-group">  
		<label>Mệnh giá</label>
		<select name="card_amount" required=""  class="form-control" > 
			<option value=""> Chọn mệnh giá</option>
			<option value="10000">10.000 vnđ</option>
			<option value="20000">20.000 vnđ</option>
			<option value="50000">50.000 vnđ</option>
			<option value="100000">100.000 vnđ</option>
			<option value="200000">200.000 vnđ</option>
			<option value="500000">500.000 vnđ</option>
			<option value="1000000">1.000.000 vnđ</option>
		</select>
	</div>  
	<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
	<button class="btn btn-danger pull-left" type="submit"> Thực hiện </button>
	<input type="hidden" name="share_url" value="<?php echo base_url().uri_string();?>.html" />
	<?php } ?>
	<?php if(!empty($clients_id)){ ?>
	<input type="hidden" name="share_client" value="<?php echo handesk_encode($clients_id);?>" />
	<?php } ?>
	<?php if(!empty($resller_id)){ ?>
	<input type="hidden" name="share_resller" value="<?php echo handesk_encode($resller_id);?>" />
	<?php } ?>
	<?php if(!empty($publisher_id)){ ?>
	<input type="hidden" name="share_publisher" value="<?php echo handesk_encode($publisher_id);?>" />
	<?php } ?>
	</form>
	</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-6 sub main-dich-vu-sub card-desc">
	<div class="col-md-12 col-sm-12 col-xs-12 sub main-dich-vu-title">
		<h1> HƯỚNG DẪN ĐỔI THẺ CÀO </h1> 
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 sub home-body-main">
		<p>Đổi thẻ cào sang tiền mặt nhanh chóng chỉ cần 2 bước Đổi thẻ và Rút tiền, chiết khấu lên tới 90%, hỗ trợ đổi tất cả các loại thẻ cào điện thoai, thẻ cào game ra tiền.</p>
		<p>Là cổng thanh toán thu mua thẻ cào trực tuyến Uy Tín - Đảm Bảo. Nhận được sự tín nhiệm của hàng trăm ngàn khách hàng thường xuyên sử dụng dịch vụ. hỗ trợ tất cả các loại thẻ cào : viettel - vinaphone - mobifone - Megacard … với tất cả các mệnh giá.</p>
		<p>Khi quý khách có nhu cầu quy đổi các loại thẻ cào sang tiền mặt online thì dịch vụ của Doicar là lựa chọn tối ưu bởi hình thức thuận tiện, thanh toán nhanh chóng , mức chiết khấu ưu đãi nhất. Hỗ trợ rút tiền nhanh chóng tất cả các ngày trong tuần kể cả ngày nghỉ lễ tết.</p>
		
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub ">
<p style="box-sizing: border-box;text-align: center;padding: 14px;font-size: 17px;font-weight: 600;font-family:  serif;">Nhanh chóng - An toàn - Chiết khấu ưu đãi nhất - Hỗ trợ khách hàng 24/7</p>
</div>
</div>
