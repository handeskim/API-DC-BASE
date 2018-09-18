<input type="hidden" id="site_load" name="site_load" value="1"> 
<div id="main-profile" class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="main-profile  col-md-12 col-sm-12 col-xs-12 sub"> 
		<div class="main-profile-publisher  col-md-12 col-sm-12 col-xs-12 sub"> 
				<blockquote>
					Link chia sẽ Cộng tác viên : 
					<span> 
						<?php echo base_url('kiem-tien/{client_id}.html');?>
					</span>
					<small> 
						% Người chia sẻ đang được tính là <?php 
							echo $this->GlobalMD->_load_info_rose_partner();
						?> (%)
					</small>
					<small> 
						bạn chỉ cần chia sẻ Link công tác viên
						</br>hoa hồng doanh thu từ CTV sẽ được tính định kỳ theo tháng. khi đó người chia sẻ sẽ nhận được % hoa hồng từ doanh thu của CTV.
						</br>Ví dụ CTV được nhận 200.000đ hoa hồng từ doanh thu. 200.000đ (x) <?php 
							echo $this->GlobalMD->_load_info_rose_partner();
						?> % = <?php $p =  200000 *  ($this->GlobalMD->_load_info_rose_partner()/100);
							echo number_format($p,0,',','.');
						?> vnđ 
						Theo cấp độ VIP của CTV người chia sẻ càng có hoa hồng cao.
					</small>
				</blockquote>
			</div>
			<?php  if(!empty($profile['publisher'])){  ?>
				<blockquote>
					Bạn đang là cộng tác viên của đại lý có thể chia sẻ link này để kiếm doanh thu: </br>
					<span> 
						<?php echo base_url('nap-ngay/'.$profile['reseller'].'.html?pub='.$profile['publisher']);?>
					</span>
					<small>
						hoặc bạn có thể không cần hoa hồng và gửi cho khách hàng nạp ngay vào tài khoản của bạn tại link sau:</br>
						
					</small>
					<?php echo base_url('nap-ngay/{client_id}.html?pub='.$profile['publisher']);?>
				</blockquote>
				<blockquote>
					Đây là link kiếm doanh thu từ việc mua thẻ nhanh (lưu ý link này chỉ bạn mới thục hiện thao tác được link không áp dụng chia sẻ ): </br>
					<span> 
						<?php echo base_url('mua-ngay/{client_id}.html?pub='.$profile['publisher']);?>
					</span>
					<small>
					link này không ai truy cập được ngoài bạn. đây là kiếm thêm hoa hồng ngoài việc được hưởng chiết khấu từ hệ thống bạn nhận thêm hoa hồng từ CTV
					</small>
				</blockquote>
			<?php } ?>
		</div>
</div>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
