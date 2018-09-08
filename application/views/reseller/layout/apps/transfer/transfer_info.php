<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($withdrawal)){?>

<?php foreach($withdrawal as $k=>$v){?>

<?php 
if(is_array($v)) {
		// displayRecursiveResults($data);
} elseif(is_object($v)) {
		// displayRecursiveResults($data);
} else { ?>
	<div class="col-md-3 col-sm-3 col-xs-6 sub">
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
<?php if(!empty($withdrawal['transaction'])){
	if($withdrawal['transaction'] === 'done'){ ?> 
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="Delete_transaction('{root_id}')" class="btn btn-danger"><i class="fa fa-trash"> </i> XÓA GIAO DỊCH  </button>	
	</div>	
	<?php	} }  ?> 
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="printDiv('printDiv')" class="btn btn-primary pull-right"><i class="fa fa-print"> </i> IN </button>	
	</div>
	<div class="form-group  col-md-4 col-sm-6 col-xs-12 sub ">	
		
		<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> <i class="fa fa-close"> </i> Thoát  </button>
	</div>
</div>