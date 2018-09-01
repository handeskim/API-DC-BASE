<footer id="footer" class="site-footer">
<div class="footer-top">
        <div class="container">
            <div class="showroom col-md-3 col-sm-3 col-xs-12 sub">
                <div class="contact-info glb_contact_info"> <h3><?php if(!empty($company)){ echo $company; }?> </h3>
				<p> Địa chỉ: <?php if(!empty($address_brand)){ echo $address_brand; }?> </p>
				<p> Điện thoại: <a href="tel:<?php if(!empty($phone)){ echo $phone; }?>"><?php if(!empty($phone)){ echo $phone; }?> </a></p>
				<p> Email: <a href="mailto:<?php if(!empty($email_brand)){ echo $email_brand; }?>"> <?php if(!empty($email_brand)){ echo $email_brand; }?></a> </p>
				<p> Mạng xã hội: <?php if(!empty($facebook_page_name)){ echo '<a href="https://facebook.com/'.$facebook_page_name.'"><i class="fa fa-facebook-official" style="color: #FFEB3B;"> </i></a>' ; }?> <?php if(!empty($google_plus_url)){ echo '<a href="'.$google_plus_url.'"><i class="fa fa-google-plus" style="color: #FF5722;"> </i></a>'; }?> </p>
				<p> Website: <?php if(!empty($website)){ echo $website; }?> </p>
				<h3>&nbsp;</h3></div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 sub ft-customer">
                <div class="col-md-7 col-sm-7 col-xs-12 sub ">
                    <div class="footer-block-title col-md-12">Phương thức thanh toán </div>
                    <div class="col-md-12 footer-block-content">
                        <div class="payment-method-box col-md-4">
                            <img src="<?php echo base_url();?>public/icon/cash.svg" alt="Cash Payment Method">
                        </div>
                        <div class="payment-method-box col-md-4">
                            <img class="lazy " src="<?php echo base_url();?>public/icon/internet-banking.svg"  alt="Internet Banking Payment Method">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 sub ">
                    <div class="footer-block-title">Hỗ trợ khách hàng</div>
                    <ul class="footer-list-menu list-unstyled">
						<li class="abouts_url"> <a href="{abouts_url}" rel="dofollow" title="Giới thiệu"> Giới thiệu </a></li> 
						<li class="order_guide"> <a href="{order_guide}" rel="dofollow" title="Mua hàng"> Mua hàng </a></li> 
						<li class="delivery_url"> <a href="{delivery_url}" rel="dofollow" title="Giao hàng"> Giao hàng </a></li> 
						<li class="policy_url"> <a href="{policy_url}" rel="dofollow" title="Chính sách điều khoản"> Chính sách điều khoản </a> </li> 
						<li class="privacy_url"><a href="{privacy_url}" rel="dofollow" title=" Chính sách bảo mật"> Chính sách bảo mật </a> </li> 
						
					</ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 sub">
				<div class="footer-block-title">Hỗ trợ khách hàng</div>
				<div class="hotline brands_phone" style="padding-top: 0;"> Hỗ trợ kỹ thuật: <?php if(!empty($hotline)){ echo $hotline; }?> </div>
                <div class="hotline brands_phone"> Sale Phone: <?php if(!empty($hotline)){ echo $hotline; }?></p></div>
                <div class="hotline brands_phone"> Skype : <?php if(!empty($skype)){ echo $skype; }?></div>
                <div class="hotline brands_phone">  <a href="{developer_url}" rel="dofollow" title="Dành cho nhà phát triển"> Dành cho nhà phát triển </a></div>
                <div class="hotline brands_phone"> <a href="{contact_url}" rel="dofollow" title="Liên hệ">  Liên hệ </a></div>
            </div>
        </div>
    </div>
<div class="subcriber ">
	<div class="container">
		<div class="newsletter col-md-12 col-sm-12col-xs-12 sub ">
			<div class="form-inline subcriber-form">
				<div class="form-group">
					<label for="email">Đăng ký nhận Khuyến Mãi:</label>
						<input class="form-control" type="text" name="email" id="email_newsletter" placeholder="Nhập địa chỉ email" autocomplete="off">
					<a class="btn btn-default"  id="subcriber" ><i class="fa fa-send" style="padding: 5px 0px 0px 0px;"></i> Đăng ký nhận tin</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="footer-bottom col-md-12 col-sm-12col-xs-12 sub ">
	<div class="container">
		<div class="company-copyright glb_brands_1"> Bản quyền năm <?php echo date("Y",time());?> thuộc về <?php if(!empty($brand)){ echo $brand; }?> <br><?php if(!empty($address_brand)){ echo $address_brand; }?> <br> <?php if(!empty($brands_vat)){ echo 'MST:'. $brands_vat; }?></div>
		<a href="javascript:void(0);" onclick="$('html, body').animate({scrollTop: $('html,body').offset().top}, 350);" id="back-to-top" style="display: block;"><i class="fa fa-chevron-up"></i></a>
	</div>
	<div class="resizedevice" style="display:none;">
		<div class="container sub-resizedevice">
			<ul class="col-md-12 col-sm-12 col-xs-12">
				<li><span> <i class="fa fa-home fa-lg"> </i> </span></li>
				<li><span> <i class="fa fa-align-justify fa-lg"> </i> </span></li>
				<li><span> <i class="fa fa-whatsapp fa-lg"> </i> </span></li>
				<li><span> <i class="fa fa-user fa-lg"> </i> </span></li>
				<li><span> <i class="fa fa-comments fa-lg"> </i> </span></li>
			</ul>
		</div>
	</div>
</div>

</footer>
<script src="<?php echo base_url();?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115126083-1"></script>
</body>
</html>
