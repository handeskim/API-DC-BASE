<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<h3 class="title"> {title_main}</h3>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12 sub">
		<?php if(!empty($config)){ ?>
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/services/update_payment">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"> url_api </span>
                <input type="text"  name="url_api" value="<?php if(!empty($config['url_api'])){ echo $config['url_api'];} ?>" class="form-control" placeholder="<?php echo lang('transfer_config'); ?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"> receiver </span>
                <input type="text"  name="receiver" value="<?php if(!empty($config['receiver'])){ echo $config['receiver'];} ?>" class="form-control" placeholder="<?php echo lang('transfer_config'); ?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"> merchant_id </span>
                <input type="text"  name="merchant_id" value="<?php if(!empty($config['merchant_id'])){ echo $config['merchant_id'];} ?>" class="form-control" placeholder="<?php echo lang('transfer_config'); ?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"> merchant_pass </span>
                <input type="text"  name="merchant_pass" value="<?php if(!empty($config['merchant_pass'])){ echo $config['merchant_pass'];} ?>" class="form-control" placeholder="<?php echo lang('transfer_config'); ?>">
              </div>
						</div>
						<button type="submit" class="btn btn-success"> Cập nhập thông tin</button>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
						<input type="hidden" name="keys" value="<?php echo $config['_id']['$id'];?>" >
				</form>
			<?php } ?>
	</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>

