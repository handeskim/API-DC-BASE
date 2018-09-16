<div class="col-md-12 col-sm-12 col-xs-12 reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub main-details">
		<div class="col-md-12 col-sm-12 col-xs-12 sub title">
			<h1>TIN TỨC THẺ CÀO</h1>
		</div>
		<ul class="col-md-12 col-sm-12 col-xs-12 reset">
		<?php 
				if(!empty($related)){
				foreach($related as $v_related){
				?>
				<li class="site_faq col-md-12 col-sm-12 col-xs-12 reset">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<a href="<?php echo base_url($v_related->alias .'.html'); ?>" title="<?php echo $v_related->title;?>" rel="dofollow">
							<h2><i class="fa fa-angle-right"> </i> <?php echo $v_related->title;?><h2>
							<small> <i class="fa fa-calendar"> </i> <?php echo $v_related->date_create;?> </small>
						</a>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-12 col-sm-12 col-xs-12 sub">
						<?php echo $v_related->description;?>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 pull-right sub"> <a  href="<?php echo base_url($v_related->alias .'.html'); ?>" title="<?php echo $v_related->title;?>" rel="dofollow"> <i class="fa fa-angle-double-right"> </i> <span> chi tiết</span></a></div>
					</div>
				</li>
			<?php } }?>
		</ul>
		<ul class="pagination pagination-sm no-margin">
			<?php 
				// var_dump($next);
				if(!empty($next)){
			
				if((int)$next > 0){
				?>
			<li><a href="<?php echo base_url().uri_string();?>.html?next=<?php echo $next - 1; ?>"><i class="fa fa-angle-double-left"> </i> Trang trước </a></li>
			<li><a href="<?php echo base_url().uri_string();?>.html?next=<?php echo $next; ?>"><i class="fa fa-angle-double-right"> </i> Trang sau </a></li>
			<?php } } ?>
		</ul>
	</div>
</div>