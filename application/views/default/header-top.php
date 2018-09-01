<div id="header_controller" class="header_controller">
	<div id="header" class="header" style="display: block;">
		<div class="container">
			<div class="top-nav">
			<div class="top-nav-body">
				<div class="top-nav-body-s col-md-12 col-xs-12 col-sm-12">
					<div class="top-nav-body-s-left col-md-4 col-xs-12 col-sm-12">
						<span class="header-note" id="header_note_top">
							<i class="fa fa-lg fa-whatsapp"></i><span id="header_phone"><a href="tel:<?php if(!empty($hotline)){ echo $hotline; }?>"> <?php if(!empty($hotline)){ echo $hotline; }?> </a></span><i class="fa fa-envelope"></i><span id="header_email"><a href="mailto:<?php if(!empty($email_brand)){ echo $email_brand; }?>"> <?php if(!empty($email_brand)){ echo $email_brand; }?></a></span>
						</span>
					</div>
					<div class="top-nav-body-s-right col-md-8 col-xs-12 col-sm-12">
						<ul class="menu-top">
							<li class="head_notify"> <a rel="nofollow" href="tel:<?php if(!empty($hotline)){ echo $hotline; }?>" style="color: #eaeaea;">Khiếu nại, báo lỗi: <?php if(!empty($hotline)){ echo $hotline; }?></a></li>
							<li class="menu-home"><a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
							<li class="menu-news"><a href="<?php echo base_url(); ?>tin-tuc.html">Tin tức</a></li>
							<li class="menu-faq"><a rel="nofollow" href="<?php echo base_url(); ?>tin-moi/faq.html">FAQ</a></li>
							<?php if(isset($token_session)){ ?>
							<li class="menu-faq"><a rel="nofollow" href="<?php echo base_url('thong-tin-ca-nhan.html'); ?>tin-moi/faq.html"><i class="fa fa-money"></i> Số Dư: <span class="balancer"><?php if(!empty($balancer)){ echo $balancer;} ?>100.000.000</span></a></li>
							<li id="QuickLogin">
								<a rel="nofollow" href="<?php echo base_url('thong-tin-ca-nhan.html');?>" title="Tài khoản của tôi"><i class="fa fa-user"></i> Tài khoản của tôi</a>
							</li>
							<?php }else{?>
								<li class="menu-register">
									<a rel="nofollow" href="<?php echo base_url(); ?>dang-ky.html" title="Đăng ký">Đăng ký</a>
								</li>
								<li id="QuickLogin">
								<a rel="nofollow" id="header_login" href="javascript:void(0);" title="Đăng Nhập">Đăng nhập</a>
								<div id="login-chiaki" class="row" style="display: none;">
									<div class="col-xs-12 quick-login">
										 Đăng nhập bằng Tài khoản
										<form class="form" role="login" method="post" action="<?php echo base_url(); ?>dang-nhap.html" id="login-nav">
											<div class="form-group">
												<label class="sr-only" for="exampleInputEmail2">Email</label>
												<input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" required="" data-error="Email bạn nhập chưa đúng!">
												<div class="help-block with-errors">
												</div>
												<div class="clearfix">
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only" for="exampleInputPassword2">Password</label>
												<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Mật khẩu" data-minlength="6" data-error="Chưa nhập mật khẩu" required="">
												<span class="help-block with-errors"></span>
												<div class="clearfix">
												</div>
												<div class="help-block text-right">
													<a id="RecoverPass" class="linkcolor" href="javascript:void(0);">Quên mật khẩu?</a>
												</div>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
											</div>
											<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
										</form>
									</div>
									<div class="col-xs-12 forget-pass">
										<p>Bạn hãy nhập email để chúng tôi gửi mật khẩu cho bạn</p>
										<div class="form"  method="post" action="<?php echo base_url(); ?>forgotpass.html">
											<div class="form-group">
												<label class="sr-only" for="exampleInputEmail2">Email</label>
												<input type="email" name="email" class="form-control" id="forgotpass" placeholder="Email" required="">
											</div>
											<div class="form-group">
												<button type="button" class="btn btn-success">Gửi mật khẩu</button>
												<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
												<a href="javascript:void(0);" class="btn btn-primary pull-right close_fogotpass">Đóng</a>
											</div>
										</div>
									</div>
								</div>
								</li>		
									<?php } ?>	
							<li style="padding: 0; font-size: 0;" class="clear"></li>
						</ul>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
</div>