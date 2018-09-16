<div class="col-md-12 col-sm-12 col-xs-12 sub">
	<div class="col-md-12 col-sm-12 col-xs-12 sub form_register">
		<div class="col-md-12 col-sm-12 col-xs-12 sub ">
			<div class="col-md-12 col-sm-12 col-xs-12 sub form_title">
              <h3 >ĐĂNG KÝ TÀI KHOẢN</h3>
            </div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub">
				{msg}
            </div>
		</div> 
		<div class="col-md-12 col-sm-12 col-xs-12 sub form_body">
			<form method="POST" action="<?php echo base_url('register/signup');?>">
			<div class="col-md-12 col-sm-12 col-xs-12 sub">
				<div class="input-group ">
					<span class="input-group-addon">Email Đăng ký</span>
					<input type="email" class="form-control" name="email" placeholder="your emai@gmail.com" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Tên đăng nhập</span>
					<input type="text" class="form-control" name="username" placeholder="username0123" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Mật khẩu</span>
					<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Nhập lại mật khẩu</span>
					<input type="password" class="form-control" name="password_duplicate" placeholder="Nhập lại mật khẩu" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Mật khẩu cấp 2 (Mã bảo mật)</span>
					<input type="password" class="form-control" name="auth" placeholder="Mật khẩu cấp 2" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Nhập lại mật khẩu cấp 2 (Mã bảo mật)</span>
					<input type="password" class="form-control" name="auth_duplicate" placeholder="Nhập lại mật khẩu cấp 2" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Họ và Tên</span>
					<input type="text" class="form-control" name="full_name" placeholder="Họ và Tên" required="">
				</div>
				<div class="input-group">
					<span class="input-group-addon">Số điện thoại</span>
					<input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required="">
				</div>
		    </div>
			<!--<div class="col-md-12 col-sm-12 col-xs-12 sub">
				<div class="col-md-12 col-sm-12 col-xs-12 sub">
					<div class="g-recaptcha" data-sitekey="6LcKd2wUAAAAAO-ebaApoUbUjoHMeTPxPfFN2pGE"></div>
				</div>
			</div>-->
			<div class="col-md-12 col-sm-12 col-xs-12 sub">
				<div class="form-group">
					<div class="checkbox"><label><input type="checkbox" name="is_register"> Tôi đã đọc và đồng ý với các <a href="{policy_url}">điều khoản dịch vụ</a> </label></div>
				</div>
			</div>
			<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
			<div class="col-md-12 col-sm-12 col-xs-12 sub">
				<button type="submit" class="btn btn-primary pull-left">ĐĂNG KÝ</button>
			</div>
			</form>
		</div> 
	</div>
</div>
