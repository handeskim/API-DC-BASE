<input type="hidden" id="site_load" name="site_load" value="0"> 
		<div id="main-profile" class="col-md-12 col-sm-12 col-xs-12 sub">
			
					<div class="LoaddingCharAnalytics" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
							<img src="<?php echo base_url();?>public/images/giphy.gif">
					</div>
					<div class="main-profile  col-md-12 col-sm-12 col-xs-12 sub"> 
						<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
						<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
								GIAO DỊCH 
						</div>
						<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
							<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
									<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
									XÁC NHẬN GIAO DỊCH CHUYỂN TIỀN </span>  </h3>
									<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
										<?php  if(!empty($confim_transfer)){?>
										<div class="col-md-12 col-sm-12 col-xs-12 sub" >
											<h4> Thông tin chi tiết giao dịch</h4>
											<table class="table">
												<tr><td> <?php echo lang('beneficiary_email'); ?></td> <td>  <?php echo $confim_transfer['beneficiary_email']; ?> </td></tr>
												<tr><td> <?php echo lang('beneficiary_id'); ?></td> <td>  <?php echo $confim_transfer['beneficiary_id']; ?> </td></tr>
												<tr><td> <?php echo lang('beneficiary'); ?></td> <td>  <?php echo $confim_transfer['beneficiary']; ?> </td></tr>
												<tr><td> <?php echo lang('money_transfer'); ?></td> <td>  <?php echo number_format($confim_transfer['money_transfer'],0,'.','.'); ?> vnđ</td></tr>
												<tr><td> <?php echo lang('fee'); ?></td> <td>  <?php echo number_format($confim_transfer['fee'],0,'.','.'); ?> vnđ</td></tr>
												<tr><td> <?php echo lang('total_transfer'); ?></td> <td>  <?php echo number_format($confim_transfer['total_transfer'],0,'.','.'); ?> vnđ</td></tr>
												<tr><td> <?php echo lang('client_id_transfer'); ?></td> <td>  <?php echo $confim_transfer['client_id']; ?> </td></tr>
												<tr><td> <?php echo lang('client_id_name'); ?></td> <td>  <?php echo $confim_transfer['client_name']; ?> </td></tr>
												<tr><td> <?php echo lang('balancer'); ?></td> <td>  <?php echo number_format($confim_transfer['balancer'],0,'.','.'); ?> vnđ</td></tr>
												<tr><td> <?php echo lang('balancer_update'); ?></td> <td>  <?php echo number_format($confim_transfer['balancer_update'],0,'.','.'); ?> vnđ</td></tr>
												<tr><td> <?php echo lang('date_create'); ?></td> <td>  <?php echo $confim_transfer['date_create']; ?> </td></tr>
												<tr><td> <?php echo lang('time_die'); ?></td> <td>  <?php echo date("Y-m-d H:i:s A",$confim_transfer['time_die']); ?> </td></tr>
											</table>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12 sub" >
											
											<form class="from-edit-profile col-md-12 col-sm-12 col-xs-12 sub " method="post" action="<?php echo base_url('xac-nhan-giao-dich.html');?>" >		
												<div class="input-group">
													<span class="input-group-addon"><?php echo lang('password');?></span>
													<input type="password" name="password" class="form-control" placeholder="" value="" required>
												</div>
												<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
												<input type="hidden" name="authentication" value="<?php echo $confim_transfer['authentication']; ?>">
												<input type="hidden" name="transaction" value="<?php echo $confim_transfer['time_die']; ?>">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="is_checked"> Đồng ý giao dịch
													</label>
													<p> <small> Vui lòng không tắt trình duyệt hoặc thiết bị,chuyển trang trước khi quá trình giao dịch thành công.  </small></p>
												</div>
												<div class="col-md-12 col-sm-12 col-xs-12 sub ">
													<div class="col-md-6 col-sm-6 col-xs-12">
														<button type="submit" class="btn btn-primary pull-left"> HOÀN TẤT GIAO DỊCH</button>
													</div>
												</div>
											</form>
										</div>
										<?php } ?>
									</div>
							</div>
						</div>
					</div>
		</div>
</div>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url()?>app/Services/Public/profile.js">  </script>