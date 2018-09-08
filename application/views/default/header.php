<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{title}</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-control" content="{description_seo}">
<meta name="description" content="{description_seo}">
<meta name="keywords" content="{keywords_seo}">
<meta name="news_keywords" content="{keywords_seo}">
<link rel="shortcut icon" href="<?php base_url();?>favicon.ico" type="image/x-icon" />
<link rel="canonical" href="<?php echo base_url().uri_string();?>.html"/>
<link rel="EditURI" type="application/rsd+xml" title="{title_seo}" href="<?php echo base_url().uri_string();?>.html"/>
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo base_url().uri_string();?>.html"/>
<link rel="canonical" title="{title_seo}" href="<?php echo base_url().uri_string();?>.html"/>
<link rel="shortlink" title="{title_seo}" href="<?php echo base_url().uri_string();?>.html"/>
<meta name="generator" content="{brand}"/>
<meta name="googlebot" content="{brand}" />
<meta name="robots" content="index, follow" />
<link rel="alternate" title="{title_seo}" hreflang="VN" href="<?php echo base_url().uri_string();?>.html" />
<meta name="revisit-after" content="1 days"/>
<meta Name="Abstract" Content="{brand}"/>
<meta name="Author" Content="{brand}"/>
<meta name="copyright" content="Copyright <?php echo date("Y",time());?> @ {brand}"/>
<meta Name="msnbot" Content="NOODP"/>
<meta name="contact" content="{contact_url}" />
<meta name="abstract" content="{title_seo}">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="language" content="Vietnamese"> 
<meta name="robots" content="noydir">
<meta name="twitter:card" content="summary"></meta>
<meta name="twitter:site" content="@{twitter}"></meta>
<meta name="twitter:creator" content="@{twitter}"></meta>
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo base_url().uri_string();?>.html" />
<meta property="og:title" content="{title_seo}" />
<meta property="og:description" content="{description_seo}" />
<meta property="og:image" content="{image_seo}" />

<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/eshop.frontend-style.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/global.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/responsive.css">

<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/adson/datepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/adson/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/adson/jquery-ui-timepicker-addon.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/adson/bootstrap-datepicker.css">
<!--
<link rel="stylesheet" href="<?php echo base_url();?>public/dist/adson/bootstrap-theme.min.css">
-->
<link rel="stylesheet" href="<?php echo base_url();?>public/reseller/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<script type="text/javascript" src="<?php echo base_url();?>public/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/dist/adson/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/datepicker/moment.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>public/bower_components/fastclick/lib/fastclick.js"></script>
<script> var BASE_URL = '<?php echo base_url();?>'; </script>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script> var url_global = "<?php echo base_url();?>"; </script>  
<script type="text/javascript" src="<?php echo base_url();?>app/apps.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>app/Services/AskGlobal.js"></script>
<script src="<?php echo base_url(); ?>public/dist/adson/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/jszip.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/jquery.canvasjs.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>public/dist/adson/buttons.print.min.js"></script>

<script> setInterval(function () { if(alert('Your session has expired!')){} else    window.location.href = BASE_URL+'/thoat-tai-khoan.html';  }, 7200000); </script>  

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<?php if(!empty($google_tag)){ echo $google_tag; }?>
<!-- End Google Tag Manager (noscript) -->