<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($withdrawal)){?>

<?php foreach($withdrawal as $k=>$v){?>

<?php 
if(is_array($v)) {
foreach($v as $ks=>$v_a){ 
if(!empty($v_a['CardInfo'])){ ?>
<table class="table table-bordered table-striped">
<tr>
<td> Mã Thẻ</td>
<td> Số Seri</td>
<td> Ngày hết hạn</td>
</tr>
<?php  foreach($v_a['CardInfo'] as $kcard => $card_value){ ?>
	<tr>
	<td> <?php if(!empty($card_value['card_code'])){ echo $card_value['card_code']; }?></td>
	<td> <?php if(!empty($card_value['card_serial'])){ echo $card_value['card_serial']; }?></td>
	<td> <?php if(!empty($card_value['expiration_date'])){ echo $card_value['expiration_date']; }?></td>
	</tr>
<?php  } ?>
</table>
<?php } ?>
<?php }
} elseif(is_object($v)) {
} else { ?>
	<div class="col-md-6 col-sm-6 col-xs-12 item-info">
		<div class="form-group">
			<label><?php echo lang($k); ?></label>
			<?php if(is_numeric($v)){?>
				<input type="text" class="form-control" placeholder="<?php echo number_format($v,0,'.','.'); ?>" disabled="">
			<?php }else{ ?>
				<input type="text" class="form-control" placeholder="<?php echo $v; ?>" disabled="">
			<?php } ?>
		</div>
	</div>
<?php } ?>

<?php } ?>

<?php } ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub bottom-form">
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="printDiv('printDiv')" class="btn btn-primary pull-left"><i class="fa fa-print"> </i> IN </button>	
	</div>
	<div class="form-group  col-md-10 col-sm-6 col-xs-12 sub ">	
		<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> <i class="fa fa-close"> </i> Thoát  </button>
	</div>
</div>