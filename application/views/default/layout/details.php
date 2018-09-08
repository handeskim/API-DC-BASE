
<div class="col-md-12 col-sm-12 col-xs-12 reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub main-details">
		<div class="col-md-12 col-sm-12 col-xs-12 sub title">
			<h1><?php if(!empty($details['title'])){echo $details['title'];} ?> </h1>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub contents-body">
			<div class="col-md-12 col-sm-12 col-xs-12 sub des">
				<p> <?php if(!empty($details['title'])){echo $details['description'];} ?> </p>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub contents">
				<?php if(!empty($details['title'])){echo $details['contents'];} ?> 
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 sub main-details">
		<div class="col-md-12 col-sm-12 col-xs-12 sub title">
			<h1>TIN LIÊN QUAN</h1>
		</div>
		<ul>
		<?php 
				if(!empty($related)){
				foreach($related as $v_related){
				?>
				<li class="site_faq">
				<a href="<?php echo base_url($v_related['alias'] .'.html'); ?>" title="<?php echo $v_related['title'] ;?>" rel="dofollow">
					<i class="fa fa-angle-right"> </i> <?php echo $v_related['title'];?>
				</a>
				</li>
			<?php } }?>
		</ul>
	</div>
</div>