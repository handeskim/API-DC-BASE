<input type="hidden" id="site_load" name="site_load" value="1"> 
<div id="main-profile" class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="LoaddingCharAnalytics" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
				<img src="<?php echo base_url();?>public/images/giphy.gif">
		</div>
		<div class="main-profile  col-md-12 col-sm-12 col-xs-12 sub"> </div>
</div>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url()?>app/Services/Public/profile.js">  </script>