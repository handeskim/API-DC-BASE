<div class="col-md-12 col-sm-12 col-xs-12 sub profile_bar">
	<button class="btn btn-default sub pull-right expand_profile_bar" > <span class="fa fa-align-justify fa_expand_profile_bar"></span></button>
	<div id="profile_left" class="profile_left col-md-12 col-sm-12 col-xs-12 sub">
		<?php 
		if(isset($profile['role'])){
			
			$id_client = $profile["_id"]['$id'];
			$role = (int)$profile['role'];
			if($role==1 || $role==2){
				echo '<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate"> <h5> <a href="'.base_url('reseller.html').'"><span> <i class="fa fa-dashboard"> </i> </span><span class="cate_exit"> Quản lý CMS Admin </span> </a></h5> </div>';
			}
		}
		?>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5 class="default_profile"> <span> <i class="fa fa-user"> </i> </span><span class="cate_profile default_profile_cate"> Tài khoản <i class="fa fa-plus-square pull-right ppx ppx_account"> </i></span> </h5></div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_info sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-user"> </i> </span><span class="cate_profile edit_profile"> Chỉnh sửa thông tin</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-bank"> </i> </span><span class="cate_profile edit_profile_bank"> Tài khoản ngân hàng</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-unlock"> </i> </span><span class="cate_profile unlock_password"> Đổi mật khẩu cấp 1</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-unlock"> </i> </span><span class="cate_profile unlock_auth"> Thay mật khẩu cấp 2</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-question-circle"> </i> </span><span class="cate_profile forgot_auth"> Quên mật khẩu cấp 2</span> </h5></div>
		</div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-shopping-cart"> </i> </span><span class="cate_cart"> Giao dịch Thẻ <i class="fa fa-plus-square pull-right ppx ppx_cart"> </i></span> </h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_cart sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-history"> </i> </span><span class="cate_profile"> Lịch sử giao dịch</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-circle-o"> </i> </span><span class="cate_profile"> Tra cứu tình trạng thẻ</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-circle-o"> </i> </span><span class="cate_profile"> Thống kê sản lượng đổi thẻ</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-circle-o"> </i> </span><span class="cate_profile"> Lịch sử mua thẻ</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-circle-o"> </i> </span><span class="cate_profile"> Lịch sử mua thẻ CTV</span> </h5></div>
		</div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-pie-chart"> </i> </span><span class="cate_revenue"> Doanh Thu <i class="fa fa-plus-square pull-right ppx ppx_revenue"> </i></span> </h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_revenue sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-bar-chart"> </i> </span><span class="cate_profile"> Doanh thu CTV</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-area-chart"> </i> </span><span class="cate_profile"> Chiết khấu</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-line-chart"> </i> </span><span class="cate_profile"> Báo cáo doanh thu</span> </h5></div>
		</div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <a target="_blank" href="<?php echo base_url('nap-ngay/'.$id_client.'.html');?>"><span> <i class="fa fa-share-alt-square"> </i> </span><span class="cate_collaborators"> Chia sẻ Nạp Ngay</span> </a></h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-sitemap"> </i> </span><span class="cate_collaborators"> Kiếm tiền Giới thiệu (CTV ) <i class="fa fa-plus-square pull-right ppx ppx_collaborators"> </i></span> </h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_collaborators sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-user-plus"> </i> </span><span class="cate_profile"> Thêm mới CTV</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-users"> </i> </span><span class="cate_profile"> Quản lý CTV</span> </h5></div>
		</div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-creative-commons"> </i> </span><span class="cate_point"> Số dư:  <small class="label bg-yellow"> <span class="balancer_profile"> <?php if(!empty($balancer)){ echo number_format($balancer,0,'.','.'); }else{ echo 0 ;}?> </span>vnđ</small> <i class="fa fa-plus-square pull-right ppx ppx_balancer"> </i> </span> </h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_banlancer sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-money"> </i> </span><span class="cate_profile"> Nạp thêm số dư</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-history"> </i> </span><span class="cate_profile history_balancer"> Lịch sử thay đổi số dư</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-exchange"> </i> </span><span class="cate_profile withdrawal"> Rút tiền</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-exchange"> </i> </span><span class="cate_profile balancer_transfer"> Chuyển khoản</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-history"> </i> </span><span class="cate_profile"> Lịch sử rút tiền</span> </h5></div>
		</div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-connectdevelop"> </i> </span><span class="cate_password connectdevelop"> Nhà Phát Triển  <i class="fa fa-plus-square pull-right ppx ppx_developer"> </i>  </span> </h5> </div>
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub sub_profile_developer sub_cate_profile">
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa-connectdevelop"> </i> </span><span class="cate_profile connectdeveloper"> Quản lý API</span> </h5></div>
			<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate catex"> <h5> <span> <i class="fa fa fa-book"> </i> </span><span class="cate_profile developer_document"><a target="_blank" href="{developer_url}" class="developer-document">Tài liệu API</a></span> </h5></div>
		</div>
		
		<div class="profile_left col-md-12 col-sm-12 col-xs-12 sub cate"> <h5> <a href="<?php echo base_url('thoat-tai-khoan.html');?>"><span> <i class="fa fa-unlock-alt"> </i> </span><span class="cate_exit"> Thoát ra </span> </a></h5> </div>
	</div>
</div>