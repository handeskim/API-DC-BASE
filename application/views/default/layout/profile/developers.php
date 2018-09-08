<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			THÔNG TIN TÀI KHOẢN  
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
				THÔNG TIN API KẾT NỐI</span>  </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
					<?php if(!empty($developer)){?>
						<div class="col-md-12 col-sm-12 col-xs-12 sub">
							<table class="table table-bordered table-striped"> 
								<tr> 
								<td> Merchant ID </td>
									<td><?php echo $developer[0]['merchant_id']?></td>
								</tr>
								<tr> 
									<td> Secret key </td>
									<td><textarea class="secret_key_developer" rows="4" readonly><?php echo $developer[0]['secret_key']?></textarea></td>
								</tr>
								<tr> 
									<td> Ngày Tạo </td>
									<td><?php echo $developer[0]['date_created']?></td>
								</tr>
								<tr> 
									<td> Trạng thái </td>
									<td><?php echo $developer[0]['level']?></td>
								</tr>
							</table>
						</div>
					<?php } ?>	
					<?php if(empty($developer)){?>
					<form class="from-edit-profile col-md-12 col-sm-12 col-xs-12 sub " method="post" action="<?php echo base_url();?>profile/developers_create" >
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('password');?></span>
							<input type="password" name="password_old" class="form-control" placeholder="" value="" required>
						</div>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="is_checked"> Đồng ý cập nhập thông tin
							</label>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 sub ">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-primary pull-left"> Khởi tạo API </button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" class="btn btn-default pull-right close_expand_bank"> Đóng</button>
							</div>
						</div>
					</form>
					<?php } ?>
				</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/profile_bank.js">  </script>