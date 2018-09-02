<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			GIAO DỊCH SỐ DƯ
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
				LỊCH SỬ BIẾN ĐỘNG SỐ DƯ</span>  </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
					<table  id="TableExtReport" class="table table-bordered table-hover dataTable display" style="width:100%" role="grid">
					 <thead>
							<tr>
								<th> No</th>
								<th> <?php echo lang('date_create');?> </th>
								<th> <?php echo lang('action_transfer');?> </th>
								<th> <?php echo lang('glosbe');?> </th>
								<th> <?php echo lang('balancer');?> </th>
								<th> <?php echo lang('beneficiary');?> </th>
								<th> <?php echo lang('payer_name');?> </th>
								<th> <?php echo lang('status');?> </th>
								<th>  </th>
							</tr>
					 </thead>
				</table>
				</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>public/dist/adson/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/jszip.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/jquery.canvasjs.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>app/Services/Public/history_balancer.js">  </script>