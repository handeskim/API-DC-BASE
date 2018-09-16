<div class="col-md-12 col-sm-12 col-xs-12">

<div class="col-md-6 col-sm-6 col-xs-6">
<form method="post" action="<?php echo base_url('api/card')?>">
<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;"> {title_main} </h1>
</div>
<?php if(!empty($info_card)){ 
?>

<div class="form-group">
<label> Người Nhận:  </label>
{clients_username}
</div>
<div class="form-group">
	<select id="card_type" name="card_type" class="form-control txt">
		<?php foreach($info_card as $v){?>
			<option value="<?php if(!empty($v['card_type'])){ echo $v['card_type'];}?>"><?php if(!empty($v['name'])){ echo $v['name'].'('.$v['deduct'].'%)';}?></option>
		<?php } ?>
	</select>
</div>

<div class="form-group">  
	<label> Số Seri </label>
	<input type="text" class="form-control" name="card_seri" max="25" value="" required="" placeholder="là dãy mã bên ngoài">
</div> 
<div class="form-group">  
	<label> Mã thẻ</label>
	<input type="text" class="form-control" name="card_code" max="25" value="" required="" placeholder="là dãy mã bên trong lớp bạc" >
</div>
<div class="form-group">  
	<label>Mệnh giá</label>
	<select name="card_amount" required=""  class="form-control" > 
		<option value=""> Chọn mệnh giá</option>
		<option value="10000">10.000 vnđ</option>
		<option value="20000">20.000 vnđ</option>
		<option value="50000">50.000 vnđ</option>
		<option value="100000">100.000 vnđ</option>
		<option value="200000">200.000 vnđ</option>
		<option value="500000">500.000 vnđ</option>
	</select>
</div> 
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
<button class="btn btn-danger pull-left" type="submit"> Thực hiện </button>
<?php if(!empty($pub)){?>
<input type="hidden" name="share_url" value="<?php echo base_url().uri_string();?>.html?pub={pub}" />
<?php }else { ?>
<input type="hidden" name="share_url" value="<?php echo base_url().uri_string();?>.html" />
<?php } ?>
<?php } ?>
<?php if(!empty($clients_id)){ ?>
<input type="hidden" name="share_client" value="<?php echo handesk_encode($clients_id);?>" />
<?php } ?>
<?php if(!empty($resller_id)){ ?>
<input type="hidden" name="share_resller" value="<?php echo handesk_encode($resller_id);?>" />
<?php } ?>
<?php if(!empty($publisher_id)){ ?>
<input type="hidden" name="share_publisher" value="<?php echo handesk_encode($publisher_id);?>" />
<?php } ?>
</form>
</div>
</div>
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>public/bower_components/font-awesome/css/font-awesome.min.css">
