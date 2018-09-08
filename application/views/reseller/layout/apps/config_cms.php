<div style="background: #fff;width: 100%;float:  left;height: 100%;">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<h3 class="title"> {title_main}</h3>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12 sub">
		<?php if(!empty($config)){ ?>
				<form class="form-horizontal" method="post" action="<?php echo base_url();?>reseller/config/update">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('transfer_config'); ?> ( Mức hiện tại: <?php if(!empty($config['transfer'])){ echo number_format($config['transfer'],0,'.','.');}else{ echo 0; }?> nghìn vnđ) </span>
                <input type="number" min="1" name="transfer" value="<?php if(!empty($config['transfer'])){ echo $config['transfer'];}else{ echo 0; }?>" class="form-control" placeholder="<?php echo lang('transfer_config'); ?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('withdraw_config'); ?> ( Mức hiện tại: <?php if(!empty($config['withdraw'])){ echo number_format($config['withdraw'],0,'.','.');}else{ echo 0; }?> vnđ)  </span>
                <input  type="number" min="1" name="withdraw" value="<?php if(!empty($config['withdraw'])){ echo $config['withdraw'];}else{ echo 0; }?>" class="form-control" placeholder="<?php if(!empty($config['withdraw'])){ echo number_format($config['withdraw'],0);}else{ echo 0; }?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('min_withdraw'); ?> ( Mức hiện tại: <?php if(!empty($config['min_withdraw'])){ echo number_format($config['min_withdraw'],0,'.','.');}else{ echo 0; }?> vnđ)  </span>
                <input  type="number" min="1" name="min_withdraw" value="<?php if(!empty($config['min_withdraw'])){ echo $config['min_withdraw'];}else{ echo 0; }?>"  class="form-control" placeholder="<?php if(!empty($config['min_withdraw'])){ echo number_format($config['min_withdraw'],0);}else{ echo 0; }?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('rose_reseller'); ?> ( Mức hiện tại: <?php if(!empty($config['rose_reseller'])){ echo $config['rose_reseller'];}else{ echo 0; }?>%)</span>
                <input  type="number" min="1" name="rose_reseller" value="<?php if(!empty($config['rose_reseller'])){ echo $config['rose_reseller'];}else{ echo 0; }?>"  class="form-control" placeholder="<?php if(!empty($config['rose_reseller'])){ echo number_format($config['rose_reseller'],0);}else{ echo 0; }?>">
              </div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<div class="input-group">
                <span class="input-group-addon"><?php echo lang('rose_client'); ?> ( Mức hiện tại: <?php if(!empty($config['rose_client'])){ echo $config['rose_client'];}else{ echo 0; }?>%)</span>
                <input  type="number" min="1" name="rose_client" value="<?php if(!empty($config['rose_client'])){ echo $config['rose_client'];}else{ echo 0; }?>"  class="form-control" placeholder="<?php echo lang('rose_client'); ?>">
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

