<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($withdrawal)){?>

<?php foreach($withdrawal as $k=>$v){?>

<?php 
if(is_array($v)) {
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