<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Đăng Nhập | <?php echo $brands['brands']; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<div class="col-md-12">
		<img style="height: 50%;width: 100%;margin-bottom: 24px;" src="<?php echo base_url();?>assets/xcrud/upload/brands/<?php echo $brands['brands_logo'];?>" />
	</div>
    <h5 style="text-align: center;text-transform: uppercase;font-size: 20px;" class="login-box-msg"> Thay đổi mật khẩu <?php echo $brands['brands_short'];?></br></h5>
    <form action="<?php echo base_url();?>verify/active" method="post">
      <div class="col-md-10">
		{msg}
	  </div>
      <div class="form-group has-feedback">
        <input name="password_new" type="password" class="form-control" placeholder="Mật khẩu" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
		<div class="form-group has-feedback">
        <input name="password_new_very" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>	  
      <div class="row">
       
                <input type="hidden" name="cmd" class="form-control" value="true" required />
                <input type="hidden" name="key_verify" class="form-control" value="{key_verify}" required />
        
        <div class="col-md-12">
           <button type="submit" class="btn btn-block btn-success btn-flat  btn-lg ">Thay đổi mật khẩu</button>
		 </div>
        <input type="hidden" name="<?php echo core_csrf_name();?>" value="<?php echo core_token_csrf();?>" />
       
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<style>
.btn{
  line-height: normal !important;
  height: 40px !important;
}
</style>
<script src="<?php echo base_url();?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
