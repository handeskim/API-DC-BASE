<div class="col-md-12 col-sm-12 col-xs-12 change_card">
<?php 
$info_card = $this->GlobalMD->pquery_result('apps/site/load_bycard',array());
if(!empty($info_card->result)){ ?>
<div class="col-md-6 col-sm-6 col-xs-6 change_card_main">
<form method="post" action="<?php echo base_url('mua-the.html')?>">
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;"> MUA MÃ THẺ ĐIỆN THOẠI</h1>
</div>
<div class="form-group">
<label> CHỌN NHÀ CUNG CẤP</label> 
<select name="keys" id="telco" class="form-control txt" required>
<?php foreach($info_card->result as $v_card){?>
<option value="<?php echo getObjectid($v_card->_id); ?>">Thẻ <?php echo $v_card->type; ?> <?php echo $v_card->name .'  ('.$v_card->deduct .'%)'; ?></option>
<?php } ?>
</select>

</div>
<div class="form-group">
<label>Số lượng thẻ</label> 
<select name="CardQuantity" id="quantity" class="form-control txt" required>
	<?php for($i=1; $i<11; $i++){?>
	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php } ?>
</select>
</div> 
<div class="form-group"> 
<label>Mệnh giá</label> 
<select name="CardPrice" id="CardPrice" class="form-control txt" required>
	<option value="10000"> 10.000</option>
	<option value="20000"> 20.000</option>
	<option value="50000"> 50.000</option>
	<option value="100000"> 100.000</option>
	<option value="200000"> 200.000</option>
	<option value="500000"> 500.000</option>
</select>
</div> 
<button type="submit" class="btn btn-danger"> THỰC HIỆN MUA</button>
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
<input type="hidden" name="Type" value="TELCO_PINCODE" required>
</form>
</div>
<?php } ?>
<?php 
$info_cards = $this->GlobalMD->pquery_result('apps/site/load_bycard_topup',array());
if(!empty($info_cards->result)){ ?>
<div class="col-md-6 col-sm-6 col-xs-6 change_card_main">
<form method="post" action="<?php echo base_url('mua-the.html')?>">
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;"> NẠP ĐIỆN THOẠI</h1>
</div>


<div class="form-group">
<label> CHỌN NHÀ CUNG CẤP </label> 
<select name="keys" id="telco" class="form-control txt" required>
<?php foreach($info_cards->result as $v_card){?>
<option value="<?php echo getObjectid($v_card->_id); ?>"> <?php echo $v_card->type; ?> <?php echo $v_card->name  .'  ('.$v_card->deduct .'%)' ; ?></option>
<?php } ?>
</select>

</div>
<div class="form-group">
<label>Số lượng thẻ</label> 
<select name="CardQuantity" id="quantity" class="form-control txt" required>
	<?php for($i=1; $i<10; $i++){?>
	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php } ?>
</select>
</div> 
<div class="form-group"> 
<label>Mệnh giá</label> 
<select name="CardPrice" id="CardPrice" class="form-control txt" required>
	<option value="20000"> 20.000</option>
	<option value="50000"> 50.000</option>
	<option value="100000"> 100.000</option>
	<option value="200000"> 200.000</option>
	<option value="500000"> 500.000</option>
</select>
</div> 
<div class="form-group"> 
<label> Số điện thoại nạp</label>
<input type="number" value="" name="CustMobile" placeholder="098xxxx888"  class="form-control txt" required>
</div>
<button type="submit" class="btn btn-primary pull-right"> THỰC HIỆN MUA</button>
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
</form>
</div>
<?php } ?>
<div class="col-md-12 col-sm-12 col-xs-12 sub" style="text-align: center;padding-bottom: 13px;">
<small>
		(*) vui lòng đăng ký, hoặc đăng nhập tài khoản trước khi mua hàng
		</small>
</div>
</div>

