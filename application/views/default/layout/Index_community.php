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
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2> TOKEN CONNECT TO THE COMMUNITY. <a target="_blank" class="btn btn-primary " href="https://community.findmyuid.com/dialog?token={token_community}"> CONNECT NOW </a></h2>
				<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
					This is a login token to the account as well as the community. You do not share or give to anyone or partner if you do not trust.</br>
					1) Note that we will close and delete accounts if we detect any suspicions, according to policy and community regulations.</br>
					2) We do not share user data information with third parties in accordance with our policies and terms.</br>
					3) We have the right to collect information about your data when joining the community for the purpose of improving the quality of our services.</br>
					Our community portal includes developers, supporters, digital marketing services. You only need to use a unique tokens to contact us.</br>
					Your support information is emailed to: <a href="mailto:community@ugroup.xyz?Subject=Ticket-community"> community@ugroup.xyz </a>
				</div>
			</div>
		</div>
	</div>
	
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

