<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			GIAO DỊCH 
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
				CHUYỂN TIỀN GIỮA TÀI KHOẢN </span>  </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
					<form class="from-edit-profile col-md-12 col-sm-12 col-xs-12 sub " method="post" action="<?php echo base_url('chuyen-khoan.html');?>" >
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('auth');?></span>
							<input type="password" name="auth" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('beneficiary_id');?></span>
							<input type="text" name="beneficiary_id" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('money_transfer');?></span>
							<input type="number" min="10000" max="10000000" name="money_transfer" class="form-control" placeholder="" value="" required>
						</div>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="is_checked"> Đồng ý cập nhập thông tin
							</label>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 sub ">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-primary pull-left"> THỰC HIỆN GIAO DỊCH </button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" class="btn btn-default pull-right close_expand_bank"> Đóng</button>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>
