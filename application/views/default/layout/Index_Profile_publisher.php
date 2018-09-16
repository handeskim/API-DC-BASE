<input type="hidden" id="site_load" name="site_load" value="1"> 
<div id="main-profile" class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile  col-md-12 col-sm-12 col-xs-12 sub"> 
			<?php 
			if(isset($profile['role'])){
					$role = (int)$profile['role'];
			if($role==1 || $role==2){
			?>
			<div class="main-profile-publisher  col-md-12 col-sm-12 col-xs-12 sub"> 
				<blockquote>
					Link chia sẽ Cộng tác viên : 
					<span> 
						<?php echo base_url('kiem-tien/{client_id}.html');?>
					</span>
				</blockquote>
				<blockquote>
					B1: Yêu cầu Cộng tác viên của bạn Đăng ký làm thành viên tại <?php echo base_url('dang-ky.html');?>
				</blockquote>
				<blockquote>
					B2: Sau khi đăng ký nhấn vào Link chia sẻ cộng tác viên của bạn là: 
					<span> 
						<?php echo base_url('kiem-tien/{client_id}.html');?>
					</span>
				</blockquote>
			</div>
			<?php }else{ ?>
				<blockquote>
					Bạn đang là cộng tác viên của đại lý có thể chia sẻ link này để kiếm doanh thu: </br>
					<span> 
						<?php echo base_url('nap-ngay/'.$profile['partner'].'.html?pub='.$profile['publisher']);?>
					</span>
				</blockquote>
				<blockquote>
					đây là link kiếm doanh thu từ việc mua thẻ nhanh (lưu ý link này chỉ bạn mới thục hiện thao tác được link không áp dụng chia sẻ ): </br>
					<span> 
						<?php echo base_url('mua-ngay/{client_id}.html?pub='.$profile['publisher']);?>
					</span>
				</blockquote>
			<?php } ?>
			<?php } ?>
		</div>
</div>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
