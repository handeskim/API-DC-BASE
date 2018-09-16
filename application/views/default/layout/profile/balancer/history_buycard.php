<div class="main-profile-body-history col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
				MUA THẺ CÀO
		</div>
		<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
			
			<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
					<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
					LỊCH SỬ MUA CARD</span>  </h3>
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
							<td><?php echo 	lang('transaction_card'); ?></td>
							<td><?php echo 	lang('Telco'); ?></td>
							<td><?php echo 	lang('Type'); ?></td>
							<td><?php echo 	lang('PriceDiscount'); ?></td>
							<td><?php echo 	lang('CardName'); ?></td>
							<td><?php echo 	lang('CardPrice'); ?></td>
							<td><?php echo 	lang('CardQuantity'); ?></td>
							<td><?php echo 	lang('MoneyTransfer'); ?></td>
							<td><?php echo 	lang('TotalOder'); ?></td>
							<td><?php echo 	lang('email'); ?></td>
							<td></td>
						</thead>
					<tbody> 
						<tr> 
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
							<td>No </td>
						</tr>
					</tbody>
					<tfoot>
						
						<td><?php echo 	lang('date_created'); ?></td>
						<td><?php echo 	lang('transaction_card'); ?></td>
						<td><?php echo 	lang('Telco'); ?></td>
						<td><?php echo 	lang('Type'); ?></td>
						<td><?php echo 	lang('PriceDiscount'); ?></td>
						<td><?php echo 	lang('CardName'); ?></td>
						<td><?php echo 	lang('CardPrice'); ?></td>
						<td><?php echo 	lang('CardQuantity'); ?></td>
						<td><?php echo 	lang('MoneyTransfer'); ?></td>
						<td><?php echo 	lang('TotalOder'); ?></td>
						<td><?php echo 	lang('email'); ?></td>
						<th> </th>
						 <tr>
								<td colspan="12" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
						</tr>
					</tfoot>
					</table>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/history_buycard.js">  </script>