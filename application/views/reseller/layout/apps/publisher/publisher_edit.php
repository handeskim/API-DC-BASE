<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($publishcer)){?>
<div class="col-md-6 col-sm-6 col-xs-6 sub " >
	<div class="form-group">
		<label> Mức độ hoa hồng Nâng cấp User</label>
		<select id="levels" class="form-control" name="levels" required>
			<option value="1">Thường</option>
			<option value="2">VIP</option>
		</select>
	</div>
	<div class="form-group">
	<button class="btn btn-primary" type="button" onclick="save_status('{root_id}')"> Cập nhập Levels</button>
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