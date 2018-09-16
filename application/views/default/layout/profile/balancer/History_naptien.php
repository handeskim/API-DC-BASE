<div class="main-profile-body-history col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
				GIAO DỊCH NẠP TIỀN
		</div>
		<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
			
			<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
					<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
					LỊCH SỬ BIẾN ĐỘNG SỐ DƯ NẠP TIỀN</span>  </h3>
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
								<tr>
									<th> <?php echo lang('date_create');?> </th>
									<th> <?php echo lang('payment_method');?> </th>
									<th> <?php echo lang('buyer_fullname');?> </th>
									<th> <?php echo lang('buyer_email');?> </th>
									<th> <?php echo lang('payment_type');?> </th>
									<th> <?php echo lang('total_amount');?> </th>
									<th> <?php echo lang('bank_code');?> </th>
									<th> <?php echo lang('service_name');?> </th>
									<th> <?php echo lang('transaction');?> </th>
									<th> <?php echo lang('token_service');?> </th>
									<th>  </th>
								</tr>
						 </thead>
							<tbody>
								<tr>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
									<th> No</th>
								</tr>
						 </tbody>
						 <tfoot>
								<tr>
									<td><input type="text" class="text_filter" placeholder="[ <?php echo lang('date_create');?>  ]"></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
								</tr>
									 <tr>
											<td colspan="11" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
									</tr>
						 </tfoot>
					</table>
					</div>
					</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/history_naptien.js">  </script>