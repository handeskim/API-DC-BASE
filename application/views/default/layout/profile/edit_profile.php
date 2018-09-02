<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			CHỈNH SỬA THÔNG TIN
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> CHỈNH SỬA THÔNG TIN CÁ NHÂN <span> </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub">
					<form class="from-edit-profile" method="post" action="<?php echo base_url();?>profile/update_info">
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('email');?></span>
								<input type="email" name="email" class="form-control" placeholder="" value="<?php echo $profile['email']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('full_name');?></span>
								<input type="text" name="full_name" class="form-control" placeholder="" value="<?php echo $profile['full_name']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('address');?></span>
								<input type="text" name="address" class="form-control" placeholder="" value="<?php echo $profile['address']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('phone');?></span>
								<input type="number" name="phone" class="form-control" placeholder="" value="<?php echo $profile['phone']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('birthday');?></span>
								<input type="date" name="birthday" class="form-control" placeholder="" value="<?php echo $profile['birthday']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('city');?></span>
								<input type="text" name="city" class="form-control" placeholder="" value="<?php echo $profile['city']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('country');?></span>
								<input type="text" name="country" class="form-control" placeholder="" value="<?php echo $profile['country']; ?>" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('auth');?></span>
								<input type="text" name="auth" class="form-control" placeholder="" value="" required>
								<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="is_checked"> Đồng ý cập nhập thông tin
							</label>
						</div>
						<div class="input-group">
							<button type="submit" class="btn btn-primary"> CẬP NHẬP THÔNG TIN</button>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>