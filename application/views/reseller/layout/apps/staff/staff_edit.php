<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($withdrawal)){?>
<div class="col-md-6 col-sm-6 col-xs-6 sub " >
	<div class="form-group">
		<label>Active/Disable Users </label>
		<select id="update_status" class="form-control" name="status">
			<option value="Disable">Disable</option>
			<option value="Active">Active</option>
		</select>
	</div>
	<div class="form-group">
	<button class="btn btn-primary" type="button" onclick="save_status('{root_id}')"> Cập nhập Trạng Thái</button>
	</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6 sub " >
	<div class="form-group">
		<label>Rút số dư của khách hàng</label>
		<input class="form-control" type="nummber" id="money_transfer" name="money_transfer" value="10000" min="10000" max="50000000" />
	</div>
	<div class="form-group">
		<label>Ghi chú lý do</label>
		<input class="form-control" type="text" id="note" name="note" value="" />
	</div>
	<div class="form-group">
	<button class="btn btn-danger" type="button" onclick="transfer_out('{root_id}')"> Rút số dư</button>
	</div>
</div>
<?php } ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub bottom-form">
	<div class="form-group  col-md-6 col-sm-6 col-xs-12 sub ">
		<button type="button" onclick="printDiv('printDiv')" class="btn btn-primary pull-left"><i class="fa fa-print"> </i> IN </button>	
	</div>
	<div class="form-group  col-md-6 col-sm-6 col-xs-12 sub ">	
		
		<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> <i class="fa fa-close"> </i> Thoát  </button>
	</div>
</div>