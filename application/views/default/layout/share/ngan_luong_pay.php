<div class="col-md-12 col-sm-12 col-xs-12 sub" style="margin: 10px;padding: 29px;border: 1px solid #e3e3e3;border-radius: 10px;">
	<form  name="NLpayBank" action="<?php echo base_url('thanh-toan-ngan-luong.html');?>" method="post">	
		<div class="col-md-12 col-sm-12 col-xs-12 sub">
		<div class="col-md-12 col-sm-12 col-xs-12 sub">
			<h5> Số tiền nạp vào hệ thống là: {money_transfer}</h5>
			<h5> Chọn phương thức cổng thanh toán: </h5>
		</div>
		<ul class="list-content col-md-12 col-sm-12 col-xs-12 sub" style="margin: 0px;padding: 0px;">
			<li class="col-md-12 col-sm-12 col-xs-12 sub "  style="margin: 0px;padding: 0px;">
				<label><input type="radio" value="ATM_ONLINE" name="option_payment">Thanh toán online bằng thẻ ngân hàng nội địa</label>
				<div class="boxContent"> <p><i>
					<span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>	
						<ul class="cardList clearfix">
							<li class="bank-online-methods "><label for="vcb_ck_on"><i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i><input type="radio" value="BIDV"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="vcb_ck_on"><i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i><input type="radio" value="VCB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="vnbc_ck_on"><i class="DAB" title="Ngân hàng Đông Á"></i><input type="radio" value="DAB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="tcb_ck_on"><i class="TCB" title="Ngân hàng Kỹ Thương"></i><input type="radio" value="TCB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_mb_ck_on"><i class="MB" title="Ngân hàng Quân Đội"></i><input type="radio" value="MB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_vib_ck_on"><i class="VIB" title="Ngân hàng Quốc tế"></i><input type="radio" value="VIB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_vtb_ck_on"><i class="ICB" title="Ngân hàng Công Thương Việt Nam"></i><input type="radio" value="ICB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_exb_ck_on"><i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i><input type="radio" value="EXB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_acb_ck_on"><i class="ACB" title="Ngân hàng Á Châu"></i><input type="radio" value="ACB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_hdb_ck_on"><i class="HDB" title="Ngân hàng Phát triển Nhà TPHCM"></i><input type="radio" value="HDB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_msb_ck_on"><i class="MSB" title="Ngân hàng Hàng Hải"></i><input type="radio" value="MSB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_nvb_ck_on"><i class="NVB" title="Ngân hàng Nam Việt"></i><input type="radio" value="NVB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_vab_ck_on"><i class="VAB" title="Ngân hàng Việt Á"></i><input type="radio" value="VAB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_vpb_ck_on"><i class="VPB" title="Ngân Hàng Việt Nam Thịnh Vượng"></i><input type="radio" value="VPB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_scb_ck_on"><i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i><input type="radio" value="SCB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="bnt_atm_pgb_ck_on"><i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i><input type="radio" value="PGB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="bnt_atm_gpb_ck_on"><i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i><input type="radio" value="GPB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="bnt_atm_agb_ck_on"><i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i><input type="radio" value="AGB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="bnt_atm_sgb_ck_on"><i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i><input type="radio" value="SGB"  name="bankcode" ></label></li>	
							<li class="bank-online-methods "><label for="sml_atm_bab_ck_on"><i class="BAB" title="Ngân hàng Bắc Á"></i><input type="radio" value="BAB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_bab_ck_on"><i class="TPB" title="Tền phong bank"></i><input type="radio" value="TPB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_bab_ck_on"><i class="NAB" title="Ngân hàng Nam Á"></i><input type="radio" value="NAB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_bab_ck_on"><i class="SHB" title="Ngân hàng TMCP Sài Gòn - Hà Nội (SHB)"></i><input type="radio" value="SHB"  name="bankcode" ></label></li>
							<li class="bank-online-methods "><label for="sml_atm_bab_ck_on"><i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i><input type="radio" value="OJB"  name="bankcode" ></label></li>
						</ul>
				</div>
			</li>
			<li class="col-md-12 col-sm-12 col-xs-12 sub "  style="margin: 0px;padding: 0px;">
				<label><input type="radio" value="IB_ONLINE" name="option_payment">Thanh toán bằng IB</label>
				<div class="boxContent">
					<p><i><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>: Bạn cần đăng ký Internet-Banking hoặc dịch vụ thanh toán trực tuyến tại ngân hàng trước khi thực hiện.</i></p>
					<ul class="cardList clearfix">
						<li class="bank-online-methods "><label for="vcb_ck_on"><i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i><input type="radio" value="BIDV"  name="bankcode" ></label></li>
						<li class="bank-online-methods "><label for="vcb_ck_on"><i class="VCB" title="Ngân hàng TMCP Ngoại Thương Việt Nam"></i><input type="radio" value="VCB"  name="bankcode" ></label></li>
						<li class="bank-online-methods "> <label for="vnbc_ck_on"><i class="DAB" title="Ngân hàng Đông Á"></i> <input type="radio" value="DAB"  name="bankcode" > </label></li>
						<li class="bank-online-methods "><label for="tcb_ck_on"><i class="TCB" title="Ngân hàng Kỹ Thương"></i><input type="radio" value="TCB"  name="bankcode" ></label></li>
					</ul>
				</div>
			</li>
			<li class="col-md-12 col-sm-12 col-xs-12 sub "  style="margin: 0px;padding: 0px;">
				<label><input type="radio" value="VISA" name="option_payment"  checked="checked">Thanh toán bằng thẻ Visa hoặc MasterCard</label>
				<div class="boxContent">
					<p><span style="color:#ff5a00;font-weight:bold;text-decoration:underline;">Lưu ý</span>:Visa hoặc MasterCard.</p>
					<ul class="cardList clearfix ">
						<li class="bank-online-methods "><label for="vcb_ck_on">Thẻ Visa:<input type="radio" value="VISA"  name="bankcode" ></label></li>
						<li class="bank-online-methods "><label for="vnbc_ck_on">Thẻ Master:<input type="radio" value="MASTER"  name="bankcode" ></label></li>
					</ul>	
				</div>
			</li>
		</ul>
		</div>
		<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf();?>">
		<input type="hidden" name="money_transfer" value="{money_transfer}">
		<div class="pad margin no-print">
				<small><i class="fa fa-yellow"></i> Chú ý: không tắt mạng hoặc trình duyệt khi quá trình xử lý thanh toán. </small>
			</div>
		 <input class="btn btn-danger" type="submit" name="nlpayment" value="TIẾP TỤC THANH TOÁN"/>
				
		</form>	
	</div>
<script  src="https://www.nganluong.vn/webskins/javascripts/jquery_min.js" type="text/javascript"></script>		
<script language="javascript">
	$('input[name="option_payment"]').bind('click', function() {
	$('.list-content li').removeClass('active');
	$(this).parent().parent('li').addClass('active');
	});		
</script> 	
<style>
	
	ul.bankList {
		clear: both;
		height: 202px;
		width: 636px;
	}
	ul.bankList li {
		list-style-position: outside;
		list-style-type: none;
		cursor: pointer;
		float: left;
		margin-right: 0;
		padding: 5px 2px;
		text-align: center;
		width: 90px;
	}
	.list-content li {
		list-style: none outside none;
		margin: 0 0 10px;
	}
	
	.list-content li .boxContent {
		display: none;
		width: 636px;
		border:1px solid #cccccc;
		padding:10px; 
	}
	.list-content li.active .boxContent {
		display: block;
	}
	.list-content li .boxContent ul {
		height:280px;
	}
	
	i.VISA, i.MASTE, i.AMREX, i.JCB, i.VCB, i.TCB, i.MB, i.VIB, i.ICB, i.EXB, i.ACB, i.HDB, i.MSB, i.NVB, i.DAB, i.SHB, i.OJB, i.SEA, i.TPB, i.PGB, i.BIDV, i.AGB, i.SCB, i.VPB, i.VAB, i.GPB, i.SGB,i.NAB,i.BAB 
	{ width:80px; height:30px; display:block; background:url(https://www.nganluong.vn/webskins/skins/nganluong/checkout/version3/images/bank_logo.png) no-repeat;}
	i.MASTE { background-position:0px -31px}
	i.AMREX { background-position:0px -62px}
	i.JCB { background-position:0px -93px;}
	i.VCB { background-position:0px -124px;}
	i.TCB { background-position:0px -155px;}
	i.MB { background-position:0px -186px;}
	i.VIB { background-position:0px -217px;}
	i.ICB { background-position:0px -248px;}
	i.EXB { background-position:0px -279px;}
	i.ACB { background-position:0px -310px;}
	i.HDB { background-position:0px -341px;}
	i.MSB { background-position:0px -372px;}
	i.NVB { background-position:0px -403px;}
	i.DAB { background-position:0px -434px;}
	i.SHB { background-position:0px -465px;}
	i.OJB { background-position:0px -496px;}
	i.SEA { background-position:0px -527px;}
	i.TPB { background-position:0px -558px;}
	i.PGB { background-position:0px -589px;}
	i.BIDV { background-position:0px -620px;}
	i.AGB { background-position:0px -651px;}
	i.SCB { background-position:0px -682px;}
	i.VPB { background-position:0px -713px;}
	i.VAB { background-position:0px -744px;}
	i.GPB { background-position:0px -775px;}
	i.SGB { background-position:0px -806px;}
	i.NAB { background-position:0px -837px;}
	i.BAB { background-position:0px -868px;}
	
	ul.cardList li {
		cursor: pointer;
		float: left;
		margin-right: 0;
		padding: 5px 4px;
		text-align: center;
		width: 90px;
		font-size: 20px;
	}
	ul.cardList li label{
		font-size: 12px;
	}
	
</style>