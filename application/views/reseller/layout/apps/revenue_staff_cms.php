<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub">
			<div class="col-md-4 col-sm-12 col-xs-12 sub pull-left">
				<h2 style="font-size: 16px;" id="title_main"> {title_main} : <span > </span></h2>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12 sub "> 
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
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-action"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub loading-container-action"> 
				
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<table  id="TableSLData"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<th><?php echo 	lang('no'); ?></th>
							<th><?php echo 	lang('client_id'); ?> </th>
							<th><?php echo 	lang('username'); ?> </th>
							<th><?php echo 	lang('card_total_transfer'); ?></th>
							<th><?php echo 	lang('card_money_transfer'); ?></th>
							<th><?php echo 	lang('cart_total_transfer'); ?></th>
							<th><?php echo 	lang('cart_money_transfer'); ?></th>
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
						</tr>
					</tbody>
					<tfoot>
							<th><?php echo 	lang('no'); ?></th>
							<th><?php echo 	lang('client_id'); ?></th>
							<th><?php echo 	lang('username'); ?></th>
							<th><?php echo 	lang('card_total_transfer'); ?></th>
							<th><?php echo 	lang('card_money_transfer'); ?></th>
							<th><?php echo 	lang('cart_total_transfer'); ?></th>
							<th><?php echo 	lang('cart_money_transfer'); ?></th>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>app/Core/Reseller/CMS/revenue_staff_cms.js"> </script>
