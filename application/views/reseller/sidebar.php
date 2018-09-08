<?php $user_data = $this->session->userdata('data_user');$authorities = $user_data['role']; ?>
<aside class="main-sidebar">
<section class="sidebar">
  
  <ul class="sidebar-menu" data-widget="tree">
	<li id="bar_0"> <a href="<?php echo base_url('thong-tin-he-thong.html');?>"><i class="fa fa-dashboard" ></i> <span> Dashboard </a></li>
	<?php if($authorities ==1 || $authorities == 2 ){ ?>
	<li class="treeview" id="bar_4">
		<a href="#"><i class="fa fa-money"></i> <span>Finance management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu" id="cate_41">
			<li><a href="<?php echo base_url('reseller/withdrawal.html');?>"><i class="fa fa-user"></i> <span> Withdrawal Manager</span></a></li>
			<li><a href="<?php echo base_url('reseller/transfer.html');?>"><i class="fa fa-bank "></i> <span>Transfer Manager</span></a></li>
		</ul>
	</li>
	
	<li class="treeview" id="bar_5">
		<a href="#"><i class="fa fa-credit-card"></i> <span>Card Manager</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu" id="cate_41">
			<li><a href="<?php echo base_url('reseller/card.html');?>"><i class="fa fa-credit-card"></i> <span> Card Change</span></a></li>
		</ul>
	</li>
	<li class="treeview" id="bar_6">
		<a href="#"><i class="fa fa-newspaper-o"></i> <span>News management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu" id="cate_22">
		
			<li><a href="<?php echo base_url('reseller/news.html');?>"><i class="fa fa-newspaper-o"></i> <span>News Manager </span></a></li>
		</ul>
	</li>
	<li id="bar_3"><a href="<?php echo base_url('reseller/developer.html');?>"><i class="fa fa-connectdevelop"></i> <span>API Manager </span> </a></li>
	<li class="treeview" id="bar_2">
		<a href="#"><i class="fa fa-users"></i> <span>Account management</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
		<ul class="treeview-menu" id="cate_22">
			<li><a href="<?php echo base_url('reseller/staff.html');?>"><i class="fa fa-user"></i> <span> User Manager</span></a></li>
			<li><a href="<?php echo base_url('reseller/bank.html');?>"><i class="fa fa-bank "></i> <span>Bank Manager </span></a></li>
		</ul>
	</li>
	
	<li class="treeview" id="bar_1">
	<a href="#">
	<i class="fa fa-gears"></i> <span>System</span>
	<span class="pull-right-container">
	<i class="fa fa-angle-left pull-right"></i>
	</span>
	</a>
	<ul class="treeview-menu" id="cate_11">
		<li class="treeview"  id="cate_11">
			<a href="#"><i class="fa fa-cc-visa" ></i>Payment Configuration
				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
			<ul class="treeview-menu" id="sub_12">
				<li><a href="<?php echo base_url();?>reseller/config"><i class="fa  fa-cog"></i>General settings</a></li>
				<li><a href="<?php echo base_url();?>reseller/bank/config"><i class="fa  fa-cog"></i>General Bank</a></li>
			</ul>
		</li>
		<li><a href="<?php echo base_url();?>cms/generic"><i class="fa fa-gears"></i> Page settings</a></li>

	</ul>
	</li>
	<?php } ?>
	<li class="header">Copyright © {brand} Software</li>
	<li><a  href="<?php echo base_url()?>exits"><i class="fa fa-sign-out"></i> <span>LogOut Account</span></a></li>
  </ul>
</section>
<!-- /.sidebar -->
</aside>
<script>
$(function() {
   menulab();
});
function menulab(){
	var bar = '<?php echo $side_bar; ?>';
	$("#bar_"+bar).addClass('active');
	$("#bar_"+bar).addClass('menu-open');
	$("#cate_"+bar).addClass('menu-open');
	$("#cate_2"+bar).addClass('menu-open');
	$("#cate_1"+bar).addClass('menu-open');
	$("#bar_"+bar).css('display','block');
	$("#cate_2"+bar).css('display','block');
	$("#cate_1"+bar).css('display','block');
	$("#cate_"+bar).css('display','block');
	$("#sub_1"+bar).addClass('menu-open');
	$("#sub_2"+bar).addClass('menu-open');
	$("#sub_"+bar).addClass('menu-open');
	$("#sub_"+bar).css('display','block');  
	$("#sub_1"+bar).css('display','block');  
	$("#sub_2"+bar).css('display','block');  
}
</script>