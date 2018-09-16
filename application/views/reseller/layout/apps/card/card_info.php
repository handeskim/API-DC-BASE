<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($card)){?>
<?php foreach($card as $k=>$v){?>

<?php 
if(is_array($v)) { } elseif(is_object($v)) {} else { ?>
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
<?php if(!empty($card)){?>
<?php if(!empty($card['transaction_card'])){
	if($card['transaction_card'] === 'hold'){ ?> 
	<div class="form-group col-md-2 col-sm-6 col-xs-12 sub">	
		<button type="button" onclick="Agreed_transactions('{root_id}')" class="btn btn-success "><i class="fa fa-check-square"> </i>  XÁC NHẬN THẺ </button>
	</div>
	<?php } 
	if($card['transaction_card'] === 'done'){?>
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="Cancel_transaction('{root_id}')" class="btn btn-warning "> <i class="fa fa-ban"> </i> THU HỒI THẺ </button>	
	</div>
	<?php	} 
}  ?> 
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="Delete_transaction('{root_id}')" class="btn btn-danger"><i class="fa fa-trash"> </i> XÓA THẺ  </button>	
	</div>	
<?php	}   ?> 
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="printDiv('printDiv')" class="btn btn-primary pull-right"><i class="fa fa-print"> </i> IN </button>	
	</div>
	<div class="form-group  col-md-4 col-sm-6 col-xs-12 sub ">	
		
		<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> <i class="fa fa-close"> </i> Thoát  </button>
	</div>
</div>