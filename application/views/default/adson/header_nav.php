<div class="wp-menu">
<div class="container">
<nav class="navbar navbar-default nav-main-menu">
<div class="container-fluid">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo base_url(); ?>">{brand}</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<?php if(!isset($token_session)){ ?>
			<li><a href="<?php echo base_url('dang-ky.html');?>">đăng ký tài khoản</a></li>
			<?php }?>
			<li><a href="<?php echo base_url('chiet-khau.html'); ?>">Chiết khấu </a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dịch vụ <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url();?>doi-the-cao.html">ĐỔI THẺ CÀO</a></li>
					<li><a href="<?php echo base_url('mua-the-dien-thoai.html');?>">NẠP ĐIỆN THOẠI</a></li>
					<li><a href="#">NẠP TIỀN GAME</a></li>
					<li><a href="<?php echo base_url('mua-the-dien-thoai.html');?>">MUA MÃ THẺ</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tin tức <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url('tin-tuc.html');?>">TIN TỨC THẺ CÀO</a></li>
					<li><a href="<?php echo base_url('faq.html');?>">HƯỚNG DẪN</a></li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
		<?php if(isset($token_session)){ ?>
			<li><a href="<?php echo base_url('nap-tai-khoan.html');?>">Nạp Ngay</a></li>
		<?php } ?>
			<li><a href="<?php echo base_url('mua-the-dien-thoai.html');?>">Mua Thẻ Cào</a></li>
			<li><a href="#">Mua Game</a></li>
			<li><a href="<?php echo base_url('doi-the-cao.html');?>">Đổi Thẻ</a></li>
		</ul>
	</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>
</div>
</div>