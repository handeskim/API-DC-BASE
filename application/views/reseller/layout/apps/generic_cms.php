<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms" style="background: #fff;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
		{title_main}
	</div>
	<form class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/generic/update">
	<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv" >
	<?php if(!empty($generic)){?>

	<?php foreach($generic as $k=>$v){?>

	<?php 
	if(is_array($v)) {
			// displayRecursiveResults($data);
	} elseif(is_object($v)) {
			// displayRecursiveResults($data);
	} else { 
		if($k=='keys'){
			
		}else{
	?>
		<div class="col-md-6 col-sm-6 col-xs-6 sub">
			<div class="form-group">
				<label><?php echo lang($k); ?></label>
				<input type="text" class="form-control" name="<?php echo $k; ?>" value="<?php echo $v; ?>"  placeholder="<?php echo $v; ?>" required="">
			</div>
		</div>
	<?php } ?>
	<?php } ?>

	<?php } ?>

	<?php } ?>
	<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
	<input type="hidden" name="keys" value="<?php echo $generic['_id']['$id'];?>" >
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 sub bottom-form">
		<div class="form-group col-md-2 col-sm-6 col-xs-12 sub">	
			<button type="submit" class="btn btn-success "> Lưu Thay Đổi</button>
		</div>
	</div>
</div>
</form>