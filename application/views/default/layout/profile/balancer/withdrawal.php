<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			GIAO DỊCH 
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
				RÚT TIỀN VỀ NGÂN HÀNG </span>  </h3>
				<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" >
					<form class="from-edit-profile col-md-12 col-sm-12 col-xs-12 sub " method="post" action="<?php echo base_url('rut-tien.html');?>" >
						<div class="input-group" >
							<span class="input-group-addon">Chọn ngân hàng</span>
							<div id="bank_option"> </div>
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('auth');?></span>
							<input type="password" name="auth" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon">Số tiền rút về ngân hàng</span>
							<input type="number" min="10000" max="50000000" name="money_transfer" class="form-control" placeholder="" value="" required>
						</div>
							
						<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
						
						<div id="bank_details"> </div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="is_checked"> Đồng ý cập nhập thông tin
							</label>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 sub ">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-primary pull-left"> THỰC HIỆN GIAO DỊCH </button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" class="btn btn-default pull-right close_expand_bank"> Đóng</button>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 " style="margin-top:10px;">
						<blockquote>
						<small> (*) Sau khi nhấn đồng ý Giao dịch. hệ thống sẽ tạm trừ số tiền trong tài khoản và chờ xử lý. theo quy định làm việc của hệ thống liên ngân hàng tại việt nam, hệ thống xử lý trong vòng 24h làm việc theo quy định hiện hành của thời gian làm việc. </small>
						<small> (*) Nếu không có danh sách ngân hàng vui lòng cập nhập TÀI KHOẢN NGÂN HÀNG trong phần tài khoản </small>
						<small> (*) Số dư của bạn phải lớn hơn hoặc bằng =  Định mức rút tiền tối tiểu trên hệ thống là <?php echo number_format($min_transfer,0,'.','.');?> vnđ trên tổng số dư hiện tại + 1.000 đồng số dư bắt buộc + Phí giao dịch rút tiền là 
							<?php echo number_format($this->GlobalMD->_load_info_withdraw_wget(),0,',','.'); ?>
						</small>
						</blockquote>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/withdrawal_bank.js">  </script>