<div class="col-md-12 col-sm-12 col-sx-12 sub action-module">
<div class="col-md-12 col-sm-12 col-sx-12 sub action-module-header">
	<h3 class="title"> {title_main}</h3>
<div>
<form id="frm-edit" method="post" >
<div class="col-md-12 col-sm-12 col-sx-12 sub action-module-main">
		<div class="col-md-6 col-sm-6 col-sx-6 sub">
			<div class="form-group">
				<label><?php echo lang('role');?></label>
				<select name="role" class="form-control">
				<option value="1" > No Active</option>
				<option value="4"> Active </option>
				</select>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-sx-6 sub">
			<div class="form-group">
				<label><?php echo lang('level');?></label>
				<select name="level" class="form-control">
					<option value="4"> Clients </option>
				</select>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-sx-12 sub">
				<button type="button" onclick="EditAcion('{root_id}')" class="btn btn-success pull-left"> Cập nhập  </button>
				<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> Thoát  </button>
		</div>
		<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
		<input type="hidden" name="root_id" value="{root_id}" >
		<input type="hidden" name="keys" value="{root_id}" >
<div>
</form>
<div>