<div class="col-md-12 col-sm-12 col-xs-12 reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct">
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-title">
				<h1>Mua Mã Thẻ Thẻ Điện Thoại - Nạp Tiền Điện Thoại Trực Tuyến</h1>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-body">
				<?php 
					$bycard = $this->GlobalMD->_site_load_bycard_default();
					if(!empty($bycard->result)){?>
					<div class="col-md-12 col-sm-12 col-xs-12 sub">
						<div class="col-md-12 col-sm-12 col-xs-12 sub"> 
							<div class="col-md-2 col-sm-6 col-xs-12 header_title_sub_net"> Nhà cung cấp</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Chiết khấu </div>
							<div class="col-md-4 col-sm-6 col-xs-12	header_title_sub_net"> Loại</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Hoa hồng</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Trạng thái</div>
						</div>
						<?php foreach($bycard->result as $key_bycard){?>
						<div class="col-md-12 col-sm-12 col-xs-12 sub header_body_sub_net_line"> 
							<div class="col-md-2 col-sm-6 col-xs-12 header_body_sub_net"><?php echo $key_bycard->name?></div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycard->deduct?> (%)</div>
							<div class="col-md-4 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycard->type?> (%)</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycard->rose?> (%)</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycard->status?></div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-title">
				<h1>Mua Mã Thẻ Game</h1>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-body">
				<?php 
					$bycardgame = $this->GlobalMD->_site_load_bycardgame_default();
					if(!empty($bycardgame->result)){?>
					<div class="col-md-12 col-sm-12 col-xs-12 sub">
						<div class="col-md-12 col-sm-12 col-xs-12 sub"> 
							<div class="col-md-2 col-sm-6 col-xs-12 header_title_sub_net"> Nhà cung cấp</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Chiết khấu </div>
							<div class="col-md-4 col-sm-6 col-xs-12	header_title_sub_net"> Loại</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Hoa hồng</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_title_sub_net"> Trạng thái</div>
						</div>
						<?php foreach($bycardgame->result as $key_bycardgame){?>
						<div class="col-md-12 col-sm-12 col-xs-12 sub header_body_sub_net_line"> 
							<div class="col-md-2 col-sm-6 col-xs-12 header_body_sub_net"><?php echo $key_bycardgame->name?></div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycardgame->deduct?> (%)</div>
							<div class="col-md-4 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycardgame->type?> (%)</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycardgame->rose?> (%)</div>
							<div class="col-md-2 col-sm-6 col-xs-12	header_body_sub_net"><?php echo $key_bycardgame->status?></div>
						</div>
						<?php } ?>
					</div>
					<?php } ?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-body">
			<blockquote>
				Hoa hồng là gì: Hoa hồng là doanh thu tặng trực tiếp cho thành viên mỗi khi chuyển đổi card thành công dựa trên tổng số tiền nhận thẻ sau đổi
				ví dụ: bạn nạp thẻ 50.000 vnđ chiết khấu 50% bạn nhận được số tiền nạp là 25.000 trong đó hoa hồng là 15%  Tổng tiền sau khi chuyển thành công là (25.000 x 15%) + 25.000 = 28.750 vnđ được chuyển thẳng vào số dư của bạn
			</blockquote>
				<blockquote>
				Chiết khấu là gì: Chiết khấu là số tiền trừ đi trong mỗi thẻ chuyển đổi. ví dụ bạn chuyển đổi thẻ 50.000 vnđ chiết khấu 50% bạn chỉ nhận được số dư là 25.000 vnđ
			</blockquote>
			</div>
		</div>
	</div> 
</div>
	 