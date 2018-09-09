<div class="main-profile-body-history col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
				GIAO DỊCH SỐ DƯ
		</div>
		<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
			
			<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
					<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
					LỊCH SỬ BIẾN ĐỘNG SỐ DƯ</span>  </h3>
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
									<th> No</th>
									<th> <?php echo lang('date_create');?> </th>
									<th> <?php echo lang('type');?> </th>
									<th> <?php echo lang('transaction');?> </th>
									<th> <?php echo lang('action_transfer');?> </th>
									<th> <?php echo lang('glosbe');?> </th>
									<th> <?php echo lang('balancer');?> </th>
									<th> <?php echo lang('beneficiary');?> </th>
									<th> <?php echo lang('payer_name');?> </th>
									<th> <?php echo lang('status');?> </th>
									<th>  </th>
								</tr>
						 </thead>
							<tbody>
								<tr>
									<th> No</th>
									<th> No </th>
									<th> No</th>
									<th> No </th>
									<th> No </th>
									<th> No </th>
									<th> No </th>
									<th> No </th>
									<th> No </th>
									<th> No </th>
								</tr>
						 </tbody>
						 <tfoot>
								<tr>
									<th> No</th>
									<td><input type="text" class="text_filter" placeholder="[ <?php echo lang('date_create');?>  ]"></td>
									<td> 
									<select class="select2 select_filter">
									<option value="">All</option>
									<option value="transfers" >Chuyển tiền </option>
									<option value="withdrawal" >Rút tiền</option>
									<option value="card_transfers" >Đổi Thẻ</option>
									<option value="bycard_transfers" >Mua Thẻ</option>
									</select>
									</td>
									<td>
									<select class="select2 select_filter">
									<option value="">All</option>
									<option value="hold" >hold</option>
									<option value="done" >done</option>
									<option value="reject" >reject</option>
									</select>
									</td>
									<td>
										<select class="select2 select_filter">
											<option value="">All</option>
											<option value="minus" >Chuyển </option>
											<option value="plus" >Nhận</option>
										</select>
									</td>
									<td> <?php echo lang('glosbe');?> </td>
									<td> <?php echo lang('balancer');?> </td>
									<td><input type="text" class="text_filter" placeholder="[<?php echo lang('beneficiary');?> ]"></td>
									<td><input type="text" class="text_filter" placeholder="[<?php echo lang('payer_name');?>  ]"></td>
									<th> <?php echo lang('status');?> </th>
									<th>  </th>
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
<script src="<?php echo base_url()?>app/Services/Public/history_balancer.js">  </script>