<div class="col-md-12 col-sm-12 col-xs-12 reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct">
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-title">
				<h1>Mua Mã Thẻ Thẻ Điện Thoại - Thẻ Game - Nạp Tiền Điện Thoại Trực Tuyến</h1>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub main-deduct-body">
				<?php 
					$bycard = $this->GlobalMD->_site_load_bycard_default();
					if(!empty($bycard->result)){?>
					<table class="table table-bordered table-striped">
						<tr> 
							<th> Tên nhà cung cấp</th>
							<th> Chiết khấu</th>
							<th> Loại</th>
							<th> Hoa hồng</th>
							<th> Trạng thái</th>
						</tr>
						<?php foreach($bycard->result as $key_bycard){?>
						<tr> 
							<th><?php echo $key_bycard->name?></th>
							<th><?php echo $key_bycard->deduct?> (%)</th>
							<th><?php echo $key_bycard->type?> (%)</th>
							<th><?php echo $key_bycard->rose?> (%)</th>
							<th><?php echo $key_bycard->status?></th>
						</tr>
						<?php } ?>
					</table>
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
	 