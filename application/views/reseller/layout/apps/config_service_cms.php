<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<h3 class="title"> {title_main}</h3>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12 sub">
		<?php if(!empty($config)){ ?>
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/services/update_shopdoithe">
						<h3> Đổi thẻ | shopdoithe.vn</h3>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon">merchant_id </span>
                <input type="text"  name="merchant_id" value="<?php if(!empty($config['merchant_id'])){ echo $config['merchant_id'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">merchant_user </span>
                <input type="text"  name="merchant_user" value="<?php if(!empty($config['merchant_user'])){ echo $config['merchant_user'];} ?>" class="form-control" required>
              </div>	
							<div class="input-group">
                <span class="input-group-addon">merchant_password </span>
                <input type="text"  name="merchant_password" value="<?php if(!empty($config['merchant_password'])){ echo $config['merchant_password'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">url </span>
                <input type="text"  name="url" value="<?php if(!empty($config['url'])){ echo $config['url'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">urlwebsite </span>
                <input type="text"  name="urlwebsite" value="<?php if(!empty($config['urlwebsite'])){ echo $config['urlwebsite'];} ?>" class="form-control" required>
              </div>
						</div>
						
						<button type="submit" class="btn btn-success  pull-left"> Cập nhập thông tin shopdoithe.vn</button>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
						<input type="hidden" name="keys" value="<?php echo $config['_id']['$id'];?>" >
				</form>
			<?php } ?>
	</div>
		<div class="col-md-6 col-sm-6 col-xs-12 sub">
		<?php if(!empty($config_alego)){ ?>
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/services/update_alego">
						<h3> Mua thẻ| alego.vn</h3>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon">Fnc </span>
                <input type="text"  name="Fnc" value="<?php if(!empty($config_alego['Fnc'])){ echo $config_alego['Fnc'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">agentid </span>
                <input type="text"  name="agentid" value="<?php if(!empty($config_alego['agentid'])){ echo $config_alego['agentid'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">accid </span>
                <input type="text"  name="accid" value="<?php if(!empty($config_alego['accid'])){ echo $config_alego['accid'];} ?>" class="form-control" required>
              </div>	
							<div class="input-group">
                <span class="input-group-addon">keymd5 </span>
                <input type="text"  name="keymd5" value="<?php if(!empty($config_alego['keymd5'])){ echo $config_alego['keymd5'];} ?>" class="form-control" required>
              </div>
							
							<div class="input-group">
                <span class="input-group-addon">tripdes_key </span>
                <input type="text"  name="tripdes_key" value="<?php if(!empty($config_alego['tripdes_key'])){ echo $config_alego['tripdes_key'];} ?>" class="form-control" required>
              </div>
							<div class="input-group">
                <span class="input-group-addon">url </span>
                <input type="text"  name="url" value="<?php if(!empty($config_alego['url'])){ echo $config_alego['url'];} ?>" class="form-control" required>
              </div>
						</div>
						
						<button type="submit" class="btn btn-success pull-right"> Cập nhập thông tin alego.vn</button>
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>" >
						<input type="hidden" name="keys" value="<?php echo $config_alego['_id']['$id'];?>" >
				</form>
			<?php } ?>
	</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>

