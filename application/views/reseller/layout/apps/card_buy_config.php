<div style="background: #fff;width: 100%;float:  left;height: 100%;">
<div class="modal fade edit-status" id="modal-default" style="display:none">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" onclick="ClosesaveEdit()"  class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
					<h4 class="modal-title">Chỉnh sửa trạng thái</h4>
				</div>
				<div class="modal-body main-status-active">
					<input id="keys_edit" value="" type="hidden">
					<div class="input-group">
						 <span class="input-group-addon"><?php echo lang('status'); ?>  </span>
						<select id="status_edit" class="form-control" required>
							<option value="disable"> disable</option>
							<option value="active"> active</option>
						
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" onclick="ClosesaveEdit()" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="button" onclick="saveEdit()" class="btn btn-primary">Save changes</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<div style="background: #fff;width: 100%;float:  left;height: 100%;" id="card_details">
<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<h3 class="title"> {title_main} | <button class="btn btn-default" onclick="AddCardChange()" type="button"> Thêm thẻ </div></h3>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12 sub">
		
				<form id="AddCardChange" class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/card_buy_config/add" style="display:none">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('rose'); ?>  (%)</span>
                <input type="text" min="0" name="rose" value="0" class="form-control" placeholder="<?php echo lang('rose'); ?>" required>
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('deduct'); ?>  (%)</span>
                <input type="text" min="1" name="deduct" value="1" class="form-control" placeholder="<?php echo lang('deduct'); ?>" required>
              </div>
						</div>
						
					
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('title'); ?>  </span>
                <input type="text" name="title"  class="form-control" placeholder="<?php echo lang('title'); ?>" required>
              </div>
								
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
								 <span class="input-group-addon">Loại thẻ </span>
								<select name="types" class="form-control" required>
									<option value="DT">Điện Thoại</option>
									<option value="GAME">Game </option>
								
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
								 <span class="input-group-addon">Loại thẻ </span>
								<select name="type" class="form-control" required>
									<option value="TELCO_PINCODE"> TELCO_PINCODE</option>
									<option value="TELCO_TOPUP"> TELCO_TOPUP</option>
									<option value="TELCO_TOPUP_AFTER"> TELCO_TOPUP_AFTER</option>
								
								</select>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('name'); ?> Telco  </span>
                <input type="text" name="name"  class="form-control" placeholder="<?php echo lang('name'); ?>" required>
              </div>
							<small> VIẾT HOA CAPLOCK KHÔNG DẤU (ví dụ: VIETTEL)</small>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('telco'); ?>  </span>
                <input type="text" name="telco" value="VTT" class="form-control" placeholder="VTT" required>
              </div>
							<small> là  giá trị mà đơn vị mà API cung cấp đổi thẻ (duy nhất 1 trên hệ thống)</small>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('ProductCode'); ?>  </span>
                <input type="number" name="ProductCode" value="VTT" class="form-control" placeholder="500" required>
              </div>
							<small> là  giá trị mà đơn vị mà API cung cấp đổi thẻ (duy nhất 1 trên hệ thống)</small>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
								 <span class="input-group-addon"><?php echo lang('status'); ?>  </span>
								<select name="status" class="form-control" required>
									<option value="disable"> disable</option>
									<option value="active"> active</option>
								
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-success"> Thêm thẻ</button>
						<button type="button" onclick="CloseCardChange()" class="btn btn-default pull-right"> Đóng</button>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
					
				</form>
		
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<table  id="TableSLData"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							
							<td><?php echo 	lang('rose'); ?>(%)</td>
							<td><?php echo 	lang('deduct'); ?>(%)</td>
							<td><?php echo 	lang('telco'); ?></td>
							<td><?php echo 	lang('name'); ?></td>
							<td><?php echo 	lang('ProductCode'); ?></td>
							<td><?php echo 	lang('title'); ?></td>
							<td><?php echo 	lang('status'); ?></td>
							<td>Loại </td>
							<td>Sản phẩm </td>
							<th width="24px"></th>
					</thead>
					<tbody> 
						<tr> 
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
							<td>no </td>
						</tr>
					</tbody>
					<tfoot>
				
							<td><?php echo 	lang('rose'); ?></td>
							<td><?php echo 	lang('deduct'); ?></td>
							<td><?php echo 	lang('telco'); ?></td>
							<td><?php echo 	lang('name'); ?></td>
							<td><?php echo 	lang('ProductCode'); ?></td>
							<td><?php echo 	lang('title'); ?></td>
							<td><?php echo 	lang('status'); ?></td>
							<td>Loại </td>
							<td>Sản phẩm </td>
							<th width="24px"></th>
					</tfoot>
				</table>
			</div>
		</div>
</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>app/Core/Reseller/CMS/card_buy_config.js"> </script>
