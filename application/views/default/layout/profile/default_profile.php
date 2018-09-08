<div class="main-profile-body-default col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
				QUẢN TRỊ TÀI KHOẢN
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> THÔNG TIN CÁ NHÂN <span> </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub">
					<?php 
						if(!empty($profile)){
						
					?>
					<table id="table_info_profile_details" class="table table-bordered table-hover">
							<tr>
									<td  ><b ><?php echo lang('id_client');?> <i  data-toggle="tooltip" data-placement="right" title="Là mã Client ID trong trường hợp cần chuyển tiền hoặc nhận tiền, và một số tác dụng cần đến Client ID" class="fa fa-info-circle"> </i></b>
									</td>
									<td><?php echo ClientID($profile); ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('username');?></b></td>
									<td><?php echo $profile['username']; ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('email');?></b>
									<i  data-toggle="tooltip" data-placement="right" title="Dùng để khôi phục tài khoản, mật khẩu, mã bảo mật (Mật khẩu cấp 2)" class="fa fa-info-circle"> </i>
									</td>
									<td><?php  if(isset($profile['email'])){ echo $profile['email']; }; ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('full_name');?></b></td>
									<td><?php  if(isset($profile['full_name'])){ echo $profile['full_name']; }; ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('address');?></b></td>
									<td><?php  if(isset($profile['address'])){ echo $profile['address']; }; ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('city');?></b></td>
									<td><?php if(isset($profile['city'])){ echo  $profile['city']; } ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('country');?></b></td>
									<td><?php  if(isset($profile['country'])){ echo $profile['country']; } ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('phone');?></b></td>
									<td><?php  if(isset($profile['phone'])){ echo $profile['phone']; } ?></td>
							</tr>
							
							<tr>
									<td><b><?php echo lang('birthday');?></b></td>
									<td><?php  if(isset($profile['birthday'])){ echo $profile['birthday']; } ?></td>
							</tr>	
							<tr>
									<td><b><?php echo lang('date_create');?></b></td>
									<td><?php echo $profile['date_create']; ?></td>
							</tr>
							<tr>
									<td><b><?php echo lang('reseller');?></b>
									 <i  data-toggle="tooltip" data-placement="right" title="Là mã đại lý quản lý tài khoản của bạn, khi có yêu về mã đại lý bạn có thể cung cấp mã đại lý để hệ thống tra cứu" class="fa fa-info-circle"> </i>
									</td>
									<td><?php echo $profile['reseller']; ?></td>
							</tr>
					</table>
					<?php } ?>
				</div>
		</div>
	</div>
</div>