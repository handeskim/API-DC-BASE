<div id="faq_left_box" class="col-md-12 col-sm-12 col-xs-12 sub reset">
	<div class="faq_box col-md-12 col-sm-12 col-xs-12 sub">
		<div class="faq_box_header col-md-12 col-sm-12 col-xs-12 sub">
			<h3 class="col-md-12 col-sm-12 col-xs-12 sub title"> Tin mới nhất </h3>
		</div>
		<div class="faq_body col-md-12 col-sm-12 col-xs-12 sub">
			<ul>
			<?php 
						$news_box = $this->GlobalMD->_site_load_site_news_box();
						if(!empty($news_box->result)){
							foreach($news_box->result as $v_news_box){
					?>
					<li class="site_faq">
					<a href="<?php echo base_url($v_news_box->alias .'.html'); ?>" title="<?php echo $v_news_box->title ;?>" rel="dofollow">
						<i class="fa fa-angle-double-right"> </i> <?php echo $v_news_box->title;?>
					</a>
					</li>
				<?php } }?>
			</ul>
		</div>
	</div>
</div>