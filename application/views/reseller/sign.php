<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> Đăng Nhập | <?php echo $brands['brands']; ?></title>
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
  <div class="login-logo">
	{msg}
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  	<div class="col-md-12">
		<img style="height: auto;width: 100%;margin-bottom: 24px;" src="{logo}" />
	</div>
    <h5 style="text-align: center;text-transform: uppercase;font-size: 20px;" class="login-box-msg"> {title} {brand}</br></h5>
    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" placeholder="Tên đăng nhập hoặc email" required />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control"  value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"  placeholder="Mật khẩu" required />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>			
      <div class="row">
                <input type="hidden" name="cmd" class="form-control" value="cmdSign" required />
        <div class="col-md-12">
           <div class="col-xs-8">
			<div class="checkbox">
			  <label>
				<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>> Ghi Nhớ mật khẩu
			  </label>
			</div>
			</div>
           <button type="submit" class="btn btn-block btn-success btn-flat  btn-lg ">Đăng Nhập</button>
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
