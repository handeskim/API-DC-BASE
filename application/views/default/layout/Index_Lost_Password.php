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
								<h1> {title_main} </h1>
						</span>
						
						
						<div class="wrap-input100 validate-input" data-validate="What Email Account Registration?: example@uGroup.asia">
							<input class="input100" name="email" type="text" id="emailTxt" placeholder="Valid email is required: example@uGroup.asia" required>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
						</div>
						<div class="container-login100-form ">
							<div class="g-recaptcha" data-sitekey="6LeRvlMUAAAAAPmbP-AUjDpf6V_rKP9VY8tfyDad"></div>
						</div>
						
						<div class="container-login100-form-btn">
							<button id="frmBtnSignIn" class="login100-form-btn"><input type="hidden" name="cmd" class="form-control" value="cmdSign" required />
								Lost Password</input></button>
						</div>
						<div class="text-center w-full p-t-10 p-b-22">
							<a href="<?php echo base_url();?>sign" class="btn-face m-b-22" style="float: right !important; width: 100% !important;height: 50px;border-radius: 25px; background: #754c24;line-height: 48px;color: white;font-size: 15px;font-weight: bold;">
							 Back to sign in</a>
						</div>
						<div class="text-center p-t-82"></div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
		
	 