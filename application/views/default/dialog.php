<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/dialog.css">
<title> uGroup</title>
<div id="booklet">
	<div id="pageheader">
		<div class="clearfix" id="header_container">
				<div class="lfloat _ohe">
					<h1 id="homelink">uGroup</h1>
				</div>
		</div>
	</div>
	<div id="content" class="fb_content clearfix">Log in to use your uGroup account with <span class="_50f7"> Rell</span>.
		<div class="login_form_container">
			<div class="login_form_container">
				<form id="login_form" action="#" method="post">
					<div id="loginform">
						<div class="clearfix form_row" id="email_container">
							<div>
								<label class="login_form_label">Email address or phone number:</label>
									<input type="text" class="inputtext _55r1 inputtext inputtext" name="email" id="email" tabindex="1" value="" autofocus="1">
							</div>
						</div>
						<div class="clearfix form_row"><div>
							<label class="login_form_label">Password:</label>
								<input type="password" class="inputtext _55r1 inputtext inputtext" name="pass" id="pass" tabindex="1">
							</div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
							<input type="hidden" name="redirect_uri" value="{redirect_uri}">
							<input type="hidden" name="cmd" value="dialog">
						</div>
						<div id="buttons" class="form_row clearfix">
							<label class="login_form_label"></label>
							<label class="uiButton uiButtonConfirm uiButtonLarge" id="loginbutton" for="u_0_0">
							<input id="btn_login" value="Log In" name="login" type="submit" tabindex="1" id="u_0_0"></label>
						</div>
						<p class="reset_password form_row" id="login_link">
							<a href="<?php echo base_url();?>lost_password" id="forgot-password-link" target="_blank" title="uGroup ID Forgotten account?" >Forgotten account?</a>
						</p>
						<div ><a role="button" id="btn_register" class="_42ft _4jy0 _4jy3 _4jy2 selected _51sy"  title="uGroup ID Create New Account?" href="<?php echo base_url();?>register" target="_blank">Create New Account</a></div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>