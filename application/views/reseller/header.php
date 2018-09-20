<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{title}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/dist/css/pqa_global.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/morris.js/morris.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/dist/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/dist/css/recording.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/datepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/assets/xcrud/plugins/jquery-ui/jquery-ui.min.css"  type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>public/reseller/assets/xcrud/plugins/jcrop/jquery.Jcrop.min.css"  type="text/css" />
<link rel="stylesheet"  href="<?php echo base_url(); ?>public/reseller/assets/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" type="text/css" />
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>public/reseller/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>public/reseller/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>public/reseller/app/glolbal.js"></script>
<script src="<?php echo base_url();?>public/reseller/cleave.min.js"></script>
<script src="<?php echo base_url();?>public/reseller/select2.min.js"></script>
<script type="text/javascript">var BASE_URL = "<?php echo base_url(); ?>";</script>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>

</head>
<body  class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
<?php  $user_data = $this->session->userdata('data_user'); $authorities = $user_data['role']; ?>
  <header   class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('thong-tin-tai-khoan.html');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
			{brand}
	   </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
			{brand}
	  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
       <i class="fa fa-bars fa-hand-o-left"></i>
        <span class="sr-only fa fa-minus-square-o">Toggle navigation</span>
      </a>
		
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	  	<li class="dropdown notifications-menu" id="notifications_response">

      </li>
          <li class="dropdown user user-menu">
           <?php 
                $img_awata = base_url("public/images/avata/default.png");
              ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  $img_awata;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user_data["full_name"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="<?php echo $img_awata;?>" class="img-circle" alt="User Image">
                <p>
								 <small>Levels</br> <?php 
							 if(!empty($authorities)){
								 if($authorities==1){
									 echo "Administrator";
								 }else if($authorities==2){
									 echo "Admin";
								 }else if($authorities==3){
									 echo "Moderator";
								 }else if($authorities==4){
									 echo "Personnel";
								 }
							 }
							 ?> </small>
                 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('thong-tin-tai-khoan.html')?>" class="btn btn-warning btn-flat">Tài khoản của tôi</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url()?>exits" class="btn btn-default btn-flat">Thoát ra</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
           
          </li>
        </ul>
      </div>
    </nav>
  </header>