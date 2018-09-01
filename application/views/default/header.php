<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{title}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" type="image/png" href="<?php echo base_url();?>favicon.ico"/>
<meta name="keywords" content="{keywords}" />
<meta name="description" content="{description}" />
<meta name="googlebot" content="index,follow">
<meta name="BingBOT" content="index,follow">
<meta name="ROBOTS" content="index,follow,noodp">
<meta name="slurp" content="index,follow">
<meta name="yahooBOT" content="index,follow">
<meta name="msnbot" content="index,follow">
<!--facebook OPG-->
<meta property="og:url" content="{url_read}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{title_main}" />
<meta property="og:description" content="{description}" />
<meta property="og:image" content="{img_details}" />

<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/global.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/eshop.frontend-style.min.css">
<script type="text/javascript" src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>app/apps.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>app/Services/AskGlobal.js"></script>

<script> var url_global = "<?php echo base_url();?>"; </script>  
<script> setInterval(function () { if(alert('Your session has expired!')){} else    window.location.reload();  }, 7200000); </script>  
<script> var BASE_URL = '<?php echo base_url();?>'; </script>
<script type="text/javascript">
var dataLayer = []; dataLayer.push( <?php echo json_encode($remarketing);?> );
</script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<?php if(!empty($google_tag)){ echo $google_tag; }?>
<!-- End Google Tag Manager (noscript) -->