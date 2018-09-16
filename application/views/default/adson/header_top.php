<div class="wp-menu-top">
	<div class="container">
		<span class="nav-toggle"></span>
		<div class="col-md-3 col-sm-3 col-xs-12 sub"> 
			<a class="logo" href="<?php echo base_url(); ?>"><img style="min-height: 55px;max-height: 55px;" src="{logo}"></a>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 sub"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub pull-left"> 
				<ul>
					<?php 
						$noty = $this->GlobalMD->_load_site_notification_top();
						
						if(!empty($noty->result)){
							foreach($noty->result as $v_noty){
					?>
					<li class="site_notification_top">
					<a href="<?php echo base_url($v_noty->alias .'.html'); ?>" title="<?php echo $v_noty->title ;?>" rel="dofollow">
						<i class="fa fa-info-circle"> </i> <?php echo $v_noty->title;?>
					</a>
					</li>
						<?php } }?>
				</ul>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12 sub"> 
		<div class="hotline pull-right"> 
			<ul class="hot-line-div col-md-12 col-sm-12 col-sx-12">
				
				<li class="pull-right col-md-12 col-sm-12 col-sx-12">
					<span class="hotline-num">
					<i class="fa fa-lg fa-whatsapp hotline-icon"></i><a onclick="goog_report_conversion('tel:{hotline}')" href="#">{hotline}</a>
				</li>
				<li class="pull-right col-md-12 col-sm-12 col-sx-12">
					<span class="hotline-num">
					<i class="fa fa-lg fa-envelope hotline-icon"></i> <a href="mailto:{email_brand}">{email_brand}</a></span>
				</li>
				</ul>
		</div>
		</div>
	</div>
</div>