<div class="main-profile-body-history col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
				GIAO DỊCH RÚT TIỀN
		</div>
		<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
			
			<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
					<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
					LỊCH SỬ BIẾN ĐỘNG RÚT TIỀN</span>  </h3>
					<div class="col-md-12 col-sm-12 col-xs-12 sub reset" > 
						<div id="LoadAjax" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
						<img src="<?php echo base_url();?>public/images/giphy.gif">
						</div>
					</div>
					<div class="main-profile-body-load col-md-12 col-sm-12 col-xs-12 sub "> 
					</div>
					<div class="main-profile-body-load-default col-md-12 col-sm-12 col-xs-12 sub "> 
					<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
						<div class="col-md-12 col-sm-12 col-xs-12 sub" >
						<div class="col-md-10 col-sm-10 col-xs-12 sub pull-left">
							<div class="input-group date col-md-6 col-sm-6 col-xs-12 sub pull-left">
									<div class="input-group-addon"><i class="fa fa-calendar"> <label> Ngày bắt đầu </label></i></div>
									<input type="date" name="date_start" class="form-control pull-left" id="date_start" style="">
							</div>
							<div class="input-group date col-md-6 col-sm-6 col-xs-12 sub pull-right" >
								<div class="input-group-addon"><i class="fa fa-calendar"> <label> Ngày kết thúc </label></i></div>
								<input type="date" name="date_end" class="form-control pull-left" id="date_end">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12  pull-right">
							<div class="input-group" >
								<button id="search_history_balancer" class="btn btn-primary"> Tra cứu </button>
							</div>
						</div>
						<div class="Loadding" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
								<img src="<?php echo base_url();?>public/images/giphy.gif">
						</div>
					</div>
						<table  id="TableExtReport" class="table table-bordered table-hover dataTable display" style="width:100%" role="grid">
							<thead>
							
							<td><?php echo 	lang('date_created'); ?></td>
							<td><?php echo 	lang('money_transfer'); ?></td>
							<td><?php echo 	lang('fee'); ?></td>
							<td><?php echo 	lang('total_transfer'); ?></td>
							<td><?php echo 	lang('transaction'); ?></td>
							<td><?php echo 	lang('bank_name'); ?></td>
							<td><?php echo 	lang('account_holders'); ?></td>
							<td><?php echo 	lang('bank_account'); ?></td>
							<td><?php echo 	lang('provinces_bank'); ?></td>
							<td><?php echo 	lang('branch_bank'); ?></td>
							<td><?php echo 	lang('type'); ?></td>
							<td><?php echo 	lang('client_name'); ?></td>
							<td><?php echo 	lang('client_id'); ?></td>
							<th width="24px"></th>
					</thead>
						<tbody> 
						<tr> 
							
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td>không có dữ liệu </td>
							<td width="24px">không có dữ liệu </td>
						</tr>
					</tbody>
						 	<tfoot>
					
						<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('date_created'); ?>]"></td>
						<td><?php echo 	lang('money_transfer'); ?></td>
						<td><?php echo 	lang('fee'); ?></td>
						<td><?php echo 	lang('total_transfer'); ?></td>
						<td>
							<select class="select2 select_filter">
							<option value="">All</option>
							<option value="hold" >hold</option>
							<option value="done" >done</option>
							<option value="reject" >reject</option>
							</select>
						</td>
					<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('bank_name'); ?>]"></td>
						<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('account_holders'); ?>]"></td>
						<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('bank_account'); ?>]"></td>
						<td><?php echo 	lang('provinces_bank'); ?></td>
						<td><?php echo 	lang('branch_bank'); ?></td>
						<td>
							<select class="select2 select_filter">
							<option value="">All</option>
								<option value="withdrawal" >withdrawal</option>
							<option value="transfer" >transfer</option>
						
							</select>
						</td>
							<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('client_name'); ?>]"></td>
						<td><input type="text" class="text_filter" placeholder="[<?php echo 	lang('client_id'); ?>]"></td>
						<th width="24px"> </th>
						 <tr>
								<td colspan="15" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
						</tr>
					</tfoot>
					</table>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/withdrawal_balancer.js">  </script>