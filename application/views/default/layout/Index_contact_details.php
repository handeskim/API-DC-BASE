<script src="<?php echo base_url();?>public/dist/js/common_contact.js"></script>
<div class="persona-splash no-photo clearfix" >
	<div class="persona-bg"></div>
	<div class="container">
		<div class="row">
			<?php 
				$data_info_account = json_decode($info_clients);
				$uid = core_encode($data_info_account->uid);
				
				if(isset($data_info_account->param->name) || !empty($data_info_account->param->name)){ $name = $data_info_account->param->name; }else{ $name = '';}
			?>
			<div class="col-md-10">
				<div class="col-md-12">
					<h1><div class="awata_profile"> </div>
				</div>
				<h1><div class="profile_full_name"> <?php echo $name; ?>  <a href="<?php echo base_url("profile?uid=".$uid); ?>" title="Edit Profile Full Name" class="btn btn-default button button-flat button-overlay button-link" ><i class="fa fa-edit"></i></a></div> </h1>
				<h1><div class="profile_username">Your uGroup ID is <?php echo $data_info_account->param->username; ?></div></h1>
			</div>
			<div class="col-md-2">
				<div class="btn_logout_profile signout pull-right">
					<a title="Sign Out" href="<?php echo base_url();?>exits" class="btn btn-default button button-flat button-overlay button-link"> Sign Out </a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="persona_title_main">
	<div class="container" >
		<div class="col-md-12">
			<h1 class="title_main">{title_main}</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			{msg}
		</div>
	</div>
</div>
<div class="main_contact">
	<div class="ivalabel" style="display:none;"> <img style=" width: 100%; height: 41%; " src="<?php echo base_url();?>public/dist/img/update_loadding.gif"> </div>
	{owner_form}
	{admin_form}
	{bill_form}
	{tech_form}
	{manager_form}
</div>

<style>
.ivalabel{
	position: absolute;
    width: 100%;
    z-index: 9999;
    height: 100%;
    background: #f5f5f5;
    opacity: 0.8;
    top: 0;
    min-height: 3000px;
}
</style>

