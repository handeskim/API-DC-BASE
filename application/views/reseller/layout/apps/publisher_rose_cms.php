<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
<div class="col-md-12 col-sm-12 col-xs-12 sub reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub reset">
		<h3> {title_main}</h3>
		<div class="col-md-12 col-sm-12 col-xs-12 sub reset">
				<div class="col-md-9 col-sm-9 col-xs-12 sub pull-left reset">
					<div class="DateSeletor col-md-12 col-sm-12 col-xs-12 sub reset" style="display:none;">
						<div class="input-group date col-md-6 col-sm-6 col-xs-12 sub pull-left reset">
								<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày bắt đầu </label></i></div>
								<input type="text" name="date_start" class="form-control pull-left" id="date_start"  >
						</div>
						<div class="input-group date  col-md-6 col-sm-6 col-xs-12 sub pull-right reset" >
							<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày kết thúc </label></i></div>
							<input type="text" name="date_end" class="form-control pull-left" id="date_end"  >
						</div>
						<div class="form-group">
							<input type="hidden" name="e" id="e" value="2">
							<button id="Search" class="btn btn-default pull-right" type="button" style="margin-top: 10px;"> Tra cứu</button>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-12 sub pull-right reset">
					<select class="form-control " id="selection_days">
						<option value="1">  Hôm nay </option>
						<option value="2">  7 Ngày</option>
						<option value="3">  15 ngày </option>
						<option value="4">  30 ngày </option>
						<option value="5">  Tùy Chọn </option>
					</select>
				</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12 sub reset" > 
			<div id="LoadAjax" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
			<img src="<?php echo base_url();?>public/images/giphy.gif">
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-action reset"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub loading-container-action reset"> 
				
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " id="ResponseTableStatic" style="display:block;"> 
				<table  id="TableSLData"  class="table table-striped table-bordered table-condensed table-hover display "style="width:100%" role="grid" cellspacing="0">
					<thead>
							<td><?php echo 	lang('no'); ?></td>
							<td><?php echo 	lang('client_id'); ?></td>
							<td><?php echo 	lang('username'); ?></td>
							<td><?php echo 	lang('cart_rose'); ?></td>
							<td><?php echo 	lang('card_change_rose'); ?></td>
							<td><?php echo 	lang('total_rose'); ?></td>
							<td><?php echo 	lang('partner'); ?></td>
							<td><?php echo 	lang('total_rose_partner'); ?></td>
							<td><?php echo 	lang('date_start'); ?></td>
							<td><?php echo 	lang('date_end'); ?></td>
							<td></td>
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
							<td></td>
						</tr>
					</tbody>
					<tfoot>
						<td><?php echo 	lang('no'); ?></td>
						<td><?php echo 	lang('client_id'); ?></td>
						<td><?php echo 	lang('username'); ?></td>
						<td><?php echo 	lang('cart_rose'); ?></td>
						<td><?php echo 	lang('card_change_rose'); ?></td>
						<td><?php echo 	lang('total_rose'); ?></td>
						<td><?php echo 	lang('partner'); ?></td>
						<td><?php echo 	lang('total_rose_partner'); ?></td>
						<td><?php echo 	lang('date_start'); ?></td>
						<td><?php echo 	lang('date_end'); ?></td>
						<td></td>
						 <tr>
								<td colspan="11" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
						</tr>
					</tfoot>
				</table>
				<blockquote>
				<small> <?php echo 	lang('total_rose_partner'); ?> Là (%) Của <?php echo 	lang('total_rose'); ?> (x) <?php echo 	lang('rose_partner'); ?> Trong cấu hình</small><br>
				<small> <?php echo 	lang('total_rose'); ?> Là  <?php echo 	lang('card_change_rose'); ?> (+) <?php echo 	lang('cart_rose'); ?></small><br>
				<small> <?php echo 	lang('cart_rose'); ?> và  <?php echo 	lang('card_change_rose'); ?> được tính là tổng doanh thu của CTV (x) cấp độ theo <?php echo 	lang('rose_reseller'); ?> hoặc <?php echo 	lang('rose_client'); ?>  Trong cấu hình </small>
				</blockquote>
			</div>
		</div>
	</div>
</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>app/Core/Reseller/CMS/publisher_rose_cms.js"> </script>
