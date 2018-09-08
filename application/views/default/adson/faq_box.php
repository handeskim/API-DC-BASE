<div id="faq_left_box" class="col-md-12 col-sm-12 col-xs-12 sub reset">
	<div class="faq_box col-md-12 col-sm-12 col-xs-12 sub">
		<div class="faq_box_header col-md-12 col-sm-12 col-xs-12 sub">
			<h3 class="col-md-12 col-sm-12 col-xs-12 sub title"> CÂU HỎI THƯỜNG GẶP</h3>
		</div>
		<div class="faq_body col-md-12 col-sm-12 col-xs-12 sub">
			<ul>
			<?php 
						$faq = $this->GlobalMD->_site_load_site_faq();
						if(!empty($faq->result)){
							foreach($faq->result as $v_faq){
					?>
					<li class="site_faq">
					<a href="<?php echo base_url($v_faq->alias .'.html'); ?>" title="<?php echo $v_faq->title ;?>" rel="dofollow">
						<i class="fa fa-info-circle"> </i> <?php echo $v_faq->title;?>
					</a>
					</li>
				<?php } }?>
			</ul>
		</div>
	</div>
</div>