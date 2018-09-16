<div class="col-md-12 col-sm-12 col-xs-12 change_card">

<div class="col-md-12 col-sm-12 col-xs-12 change_card_main">
<form method="post" action="<?php echo base_url('nap-so-du.html')?>">
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;"> {title_main} </h1>
</div>
<?php if(!empty($info_card)){ ?>
<div class="form-group">
<label> Chọn Cổng Thanh Toán</label> 
<select name="name_service" id="name_service" class="form-control txt">
<?php foreach($info_card as $v_card){?>
<option value="<?php echo $v_card->name_service; ?>"> <?php echo $v_card->name_service; ?></option>
<?php } ?>
</select>
<?php } ?>
</div>
<div class="form-group"> 
<label> Số Tiền nạp</label> 
<select name="money_transfer" id="money_transfer" class="form-control txt">
	<option value="20000"> 20.000</option>
	<option value="50000"> 50.000</option>
	<option value="100000"> 100.000</option>
	<option value="200000"> 200.000</option>
	<option value="500000"> 500.000</option>
	<option value="1000000"> 1.000.000</option>
	<option value="2000000"> 2.000.000</option>
	<option value="5000000"> 5.000.000</option>
</select>
</div> 
<button type="submit" class="btn btn-danger"> THỰC HIỆN GIAO DỊCH</button>
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
</form>
</div>
</div>

