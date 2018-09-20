<input id="root_id" type="hidden" value="{root_id}">
<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub">
			<div class="col-md-12 col-sm-12 col-xs-12 sub pull-left">
				<h2 style="font-size: 16px;" id="title_main"> Chi tiết hoạt động User #ID {root_id}: <span > </span></h2>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub "> 
				<div class="col-md-10 col-sm-10 col-xs-12 pull-left">
					<div class="DateSeletor" style="display:none;">
						<div class="input-group date col-md-6 col-sm-6 col-xs-12 sub pull-left">
								<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày bắt đầu </label></i></div>
								<input type="text" name="date_start" class="form-control pull-left" id="date_start"  >
						</div>
						<div class="input-group date  col-md-6 col-sm-6 col-xs-12 sub pull-right" >
							<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày kết thúc </label></i></div>
							<input type="text" name="date_end" class="form-control pull-left" id="date_end"  >
						</div>
						<div class="form-group">
							<input type="hidden" name="e" id="e" value="2">
							<button id="Search" class="btn btn-default" type="button" style="margin-top: 10px;"> Tra cứu</button>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-12 sub pull-right">
					<select class="form-control " id="selection_days">
						<option value="1">  Hôm nay </option>
						<option value="2">  7 Ngày</option>
						<option value="3">  15 ngày </option>
						<option value="4">  30 ngày </option>
						<option value="5">  Tùy Chọn </option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12 sub " > 
			<div id="LoadAjax" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
			<img src="<?php echo base_url();?>public/images/giphy.gif">
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStaticCard" style="display:block;"> 
				<h2> Chi tiết đổi thẻ</h2>
				<table  id="TableSLDataCard"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('card_seri'); ?></th>
							<th><?php echo 	lang('card_code'); ?></th>
							<th><?php echo 	lang('card_type'); ?></th>
							<th><?php echo 	lang('card_amount'); ?></th>
							<th><?php echo 	lang('card_deduct'); ?></th>
							<th><?php echo 	lang('card_message'); ?></th>
							<th><?php echo 	lang('publisher'); ?></th>
					</thead>
					<tbody> 
						<tr> 
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
						</tr>
					</tbody>
					<tfoot>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('card_seri'); ?></th>
							<th><?php echo 	lang('card_code'); ?></th>
							<th><?php echo 	lang('card_type'); ?></th>
							<th><?php echo 	lang('card_amount'); ?></th>
							<th><?php echo 	lang('card_deduct'); ?></th>
							<th><?php echo 	lang('card_message'); ?></th>
							<th><?php echo 	lang('publisher'); ?></th>
					</tfoot>
				</table>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<h2> Chi tiết mua thẻ</h2>
				<table  id="TableSLDataCart"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('Type'); ?></th>
							<th><?php echo 	lang('CardName'); ?></th>
							<th><?php echo 	lang('deduct'); ?></th>
							<th><?php echo 	lang('CardQuantity'); ?></th>
							<th><?php echo 	lang('TotalOder'); ?></th>
							<th><?php echo 	lang('MoneyTransfer'); ?></th>
					</thead>
					<tbody> 
						<tr> 
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
						</tr>
					</tbody>
					<tfoot>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('Type'); ?></th>
							<th><?php echo 	lang('CardName'); ?></th>
							<th><?php echo 	lang('deduct'); ?></th>
							<th><?php echo 	lang('CardQuantity'); ?></th>
							<th><?php echo 	lang('TotalOder'); ?></th>
							<th><?php echo 	lang('MoneyTransfer'); ?></th>
					</tfoot>
				</table>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<h2> Chi tiết Rút tiền</h2>
				<table  id="TableSLDataWithdraw"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('money_transfer'); ?></th>
							<th><?php echo 	lang('fee'); ?></th>
							<th><?php echo 	lang('total_transfer'); ?></th>
							<th><?php echo 	lang('bank_name'); ?></th>
							<th><?php echo 	lang('account_holders'); ?></th>
							<th><?php echo 	lang('provinces_bank'); ?></th>
							<th><?php echo 	lang('bank_account'); ?></th>
							<th><?php echo 	lang('branch_bank'); ?></th>
					</thead>
					<tbody> 
						<tr> 
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
						</tr>
					</tbody>
					<tfoot>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('money_transfer'); ?></th>
							<th><?php echo 	lang('fee'); ?></th>
							<th><?php echo 	lang('total_transfer'); ?></th>
							<th><?php echo 	lang('bank_name'); ?></th>
							<th><?php echo 	lang('account_holders'); ?></th>
							<th><?php echo 	lang('provinces_bank'); ?></th>
							<th><?php echo 	lang('bank_account'); ?></th>
							<th><?php echo 	lang('branch_bank'); ?></th>
					</tfoot>
				</table>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<h2> Chi tiết Giao dịch</h2>
				<table  id="TableSLDataTransfer"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('action'); ?></th>
							<th><?php echo 	lang('money_transfer'); ?></th>
							<th><?php echo 	lang('fee'); ?></th>
							<th><?php echo 	lang('total_transfer'); ?></th>
							<th><?php echo 	lang('type'); ?></th>
							<th><?php echo 	lang('payer_name'); ?></th>
					</thead>
					<tbody> 
						<tr> 
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
							<td>No</td>
						</tr>
					</tbody>
					<tfoot>
							<th><?php echo 	lang('date_create'); ?></th>
							<th><?php echo 	lang('transaction'); ?></th>
							<th><?php echo 	lang('action'); ?></th>
							<th><?php echo 	lang('money_transfer'); ?></th>
							<th><?php echo 	lang('fee'); ?></th>
							<th><?php echo 	lang('total_transfer'); ?></th>
							<th><?php echo 	lang('type'); ?></th>
							<th><?php echo 	lang('payer_name'); ?></th>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>app/Core/Reseller/CMS/staff_details_cms.js"> </script>
