<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/ugroup_global.css">
<div ng-app="ugfrmsign" class="limiter" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<div id="logo_inex" style="margin-top: 55px;">
						<a href="<?php echo base_url();?>" title="uGroup ID Member System">
							<img style="border-radius: 207px;width: 93%;margin: 0px auto;" src="<?php echo base_url();?>public/logo_member_ugroup_asia.png" alt="uGroup ID Member System">
						</a>
					</div>
				</div>
				<div class="col-md-6">
				<div class="col-md-12"> 
					{msg}
				</div>
					<form action="#" method="post" class="login100-form validate-form">
						<span class="login100-form-title">
								<h1 class="title_main">{title_main}</h1>
						</span>

						<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@uGroup.asia">
							<input class="input100" name="EmailTxt" type="text" id="EmailTxt" placeholder="Email:  ex@uGroup.asia" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Password is required">
							<input class="input100" name="PasswordTxt" type="password" id="PasswordTxt" placeholder="Password: **********" required>
						<span class="focus-input100"></span>
							<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
						</div>
						<div class="container-login100-form ">
							<div class="g-recaptcha" data-sitekey="6LcKd2wUAAAAAO-ebaApoUbUjoHMeTPxPfFN2pGE"></div>
						</div>
						<div class="container-login100-form-btn">
							<button id="frmBtnSignIn" class="login100-form-btn">
								<input type="hidden" name="cmd" class="form-control" value="cmdSign" required />
								Sign in</input></button>
						</div>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
						<div class="text-center w-full p-t-10 p-b-22">
							<a href="<?php echo base_url();?>register" class="btn-face m-b-22 button button-flat button-overlay button-link" style="float: right !important; width: 100% !important;height: 50px;border-radius: 25px; background: #3c763d;line-height: 48px;color: white;font-size: 15px;font-weight: bold;">
								Create your uGroup&nbsp;ID </a>
						</div>
						<div class="text-center p-t-12">
							<a class="btn btn-link txt2" href="<?php echo base_url();?>lost_password">
									Forgotten account?
								</a>
						</div>
						<div class="text-center p-t-82"></div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
		
	 