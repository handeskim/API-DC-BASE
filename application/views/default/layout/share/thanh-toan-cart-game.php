<div class="col-md-12 col-sm-12 col-xs-12 change_card">

<div class="col-md-12 col-sm-12 col-xs-12 change_card_main">
<form method="post" action="<?php echo base_url('thanh-toan-mua-the-game.html')?>">
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;">THANH TOÁN ĐƠN HÀNG</h1>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<?php if(!empty($cart)){?>
	<h5>Tóm tắt đơn hàng</h5>
	<blockquote style="background: #fff;padding: 9px;list-style:  none;"> 
		<ul style="padding: 10px;"> 
				<li class="info-blockquote-cart"> <span> Loại thẻ: </span> <?php echo $cart['CardTitle'];?></li> 
				<li class="info-blockquote-cart"> <span> Số lượng: </span> <?php echo $cart['CardQuantity'];?></li> 
				<li class="info-blockquote-cart"> <span> Mệnh Giá: </span>	<?php echo number_format($cart['CardPrice'],0,'.','.');?> vnđ</li> 
				<li	class="info-blockquote-cart"> <span> Kiểu Loại: </span><?php echo $cart['Type'];?> </li> 
				<li	class="info-blockquote-cart"> <span> Mã đơn hàng: </span><?php echo $cart['OrderID'];?> </li> 
				<li	class="info-blockquote-cart"> <span> Tổng đơn hàng: </span><?php echo  number_format($cart['TotalOder'],0,'.','.');?> vnđ</li> 
				<li	class="info-blockquote-cart"> <span> Hoa Hồng: +</span><?php echo  number_format($cart['PriceRose'],0,'.','.');?> vnđ </li> 
				<li	class="info-blockquote-cart"> <span> Giảm Giá: -</span><?php echo  number_format($cart['PriceDiscount'],0,'.','.');?> vnđ </li> 
				<li	class="info-blockquote-cart"> <span> Tổng Thanh Toán: </span><?php echo  number_format($cart['MoneyTransfer'],0,'.','.');?> vnđ </li> 
		</ul>
		
	</blockquote>
	<?php } ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="form-group"> 
<label>Phương Thức Thanh Toán</label> 
<div class="">
	<label>
		<input type="radio" name="type_payment" value="1000" checked required> Thanh toán bằng số dư tài khoản
	</label>
</div>
<!--<div class="">
	<label>
		<input  type="radio" name="type_payment" value="1001" required> Thanh toán Online Bằng Cổng Thanh Toán
	</label>
</div>-->
</div>
<div class="form-group"> 
<div class="form-group"> 
<label> Trã mả thẻ tại </label> 
<div class="">
	<label>
		<input type="radio" name="send_card" value="1000" checked required> hiển thị tại đơn hàng
	</label>
</div>
<div class="">
	<label>
		<input  type="radio" name="send_card" value="1001" required> Gửi vào email
	</label>
</div>
</div>
</div>
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
<button type="submit" class="btn btn-warning pull-left"> THỰC HIỆN THANH TOÁN</button>
<a href="<?php echo base_url('mua-the-dien-thoai.html')?>" title="Mua thẻ điện thoại hoặc nạp tiền điện thoại online" class="btn btn-default pull-right"> QUAY LẠI CHỌN MUA</a>

</form>
</div>

</div>
</div>

