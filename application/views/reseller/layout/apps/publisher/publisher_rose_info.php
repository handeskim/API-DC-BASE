<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($rose)){ ?>
<table class="table table-bordered table-striped">
<tr> 
	<td> <?php echo lang("type");?> </td>
	<td> <?php echo lang("date_create");?> </td>
	<td> <?php echo lang("card_amount");?></td>
	<td> <?php echo lang("card_deduct");?></td>
	<td> <?php echo lang("Telco");?></td>
	<td> <?php echo lang("CardQuantity");?></td>
	<td> <?php echo lang("total_transfer");?></td>
	<td> <?php echo lang("rose");?></td>
	<td> Tổng Hoa Hồng </td>
</tr>
<?php 
	$total_card_amount = array();
	$total_CardQuantity = array();
	$total_transfer = array();
	$total_rose = array();
	$total_money_rose = array();
?>
<?php foreach($rose as $k=>$v){ ?>
<tr> 
	<td> <?php echo $v->type;?></td>
	<td> <?php echo $v->date_create;?></td>
	<td> <?php echo number_format($v->card_amount,0,'.','.');?></td>
	<td> <?php echo $v->card_deduct;?></td>
	<td> <?php echo $v->Telco;?></td>
	<td> <?php echo number_format($v->CardQuantity,0,'.','.');?></td>
	<td> <?php echo number_format($v->total_transfer,0,'.','.');?></td>
	<td> <?php echo $v->rose;?></td>
	<td> <?php echo number_format($v->money_rose,0,'.','.');?></td>
</tr>
<tr> 
<?php 
	$total_card_amount[] = $v->card_amount;
	$total_CardQuantity[] = $v->CardQuantity;
	$total_transfer[] = $v->total_transfer;
	$total_rose[] = $v->rose;
	$total_money_rose[] = $v->money_rose;
?>
<?php } ?>
	<td> </td>
	<td> </td>
	<td> <?php echo number_format(array_sum($total_card_amount),0,'.','.');?></td>
	<td> </td>
	<td> </td>
	<td> <?php echo number_format(array_sum($total_CardQuantity),0,'.','.');?></td>
	<td> <?php echo number_format(array_sum($total_transfer),0,'.','.');?></td>
	<td>  </td>
	<td> <?php echo number_format(array_sum($total_money_rose),0,'.','.');?></td>
</tr>
</table>
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