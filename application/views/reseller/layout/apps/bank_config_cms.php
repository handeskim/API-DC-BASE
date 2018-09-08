<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub">
			<div class="col-md-4 col-sm-12 col-xs-12 sub pull-left">
				<h2 style="font-size: 16px;" id="title_main"> {title_main} : <span > </span></h2>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 sub pull-left">
				<h2 style="font-size: 16px;" id="title_main"> <button class="btn btn-default" id="addBanking"> Thêm Ngân hàng</button></h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub frmBankAdd" style="display:none;" > 
			<form method="post" action="<?php echo base_url('reseller/bank/addNew');?>">
					<div class="form-group">
						<label>Loại Ngân Hàng</label>
						<select name="type_bank" class="form-control" required="">
							<option value="5b8a7363167b196c2a18c5fb">NGÂN HÀNG THƯƠNG MẠI NHÀ NƯỚC</option>
							<option value="5b8a739e167b196c2a18c5fc">NGÂN HÀNG THƯƠNG MẠI CỔ PHẦN</option>
						</select>
					</div>
					<div class="input-group">
						<span class="input-group-addon">Tên Ngân hàng</span>
						<input type="text" name="name" class="form-control" placeholder="Tên Ngân hàng" required="" >
					</div>
					<div class="form-group">
					
					</div>
						<button type="submit" class="btn btn-primary"> Thêm ngân hàng</button>
						<button type="button" class="btn close_add_bank pull-right"> Đóng</button>
					<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>"/>
			</form>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub " > 
			<div id="LoadAjax" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
			<img src="<?php echo base_url();?>public/images/giphy.gif">
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-action"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub loading-container-action"> 
				
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<table  id="TableSLData"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<td><?php echo 	lang('no'); ?></td>
							<th><?php echo 	lang('id'); ?> </th>
							<th><?php echo 	lang('name'); ?> </th>
							<th></th>
					</thead>
					<tbody> 
						<tr> 
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
						</tr>
					</tbody>
					<tfoot>
							<td><?php echo 	lang('no'); ?></td>
							<th><?php echo 	lang('id'); ?> </th>
							<th><?php echo 	lang('name'); ?> </th>
						<th> </th>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>app/Core/Reseller/CMS/bank_config_cms.js"> </script>
