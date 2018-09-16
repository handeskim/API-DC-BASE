<div class="col-md-12 col-sm-12 col-xs-12 change_card">

<div class="col-md-12 col-sm-12 col-xs-12 change_card_main">

<div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;margin: 0px;">
	<h1 style="font-size:14px;padding: 10px;border-bottom: 1px solid #1ea6ec;color: #1ea6ec;font-weight: 700;">
		HOÀN THÀNH MUA HÀNG
	</h1>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<?php if(!empty($response)){ $p = json_decode($response);?>
	<h5>CHI TIẾT ĐƠN HÀNG</h5>
	<blockquote style="background: #fff;padding: 9px;list-style:  none;"> 
		<ul style="padding: 10px;"> 
				<li class="info-blockquote-cart"> <span> <?php echo lang('status'); ?> : </span> <?php echo $p->status; ?></li> 
				<li class="info-blockquote-cart"> <span> <?php echo lang('msg'); ?> : </span> <?php echo $p->msg; ?></li> 
				<?php if(!empty($p->trace)){ $trace = $p->trace; ?>
				<?php if(!empty($trace->RespCode)){ ?>
				<li class="info-blockquote-cart"> <span> <?php echo lang('RespCode'); ?> : </span>
				<?php echo $trace->RespCode; ?>
				</li> 
				<?php } ?>
				<?php if(!empty($trace->transaction)){ ?>
				<li class="info-blockquote-cart"> <span> <?php echo lang('transaction'); ?> : </span>
				<?php echo $trace->transaction; ?>
				</li> 
				<?php } ?>
				<?php if(!empty($trace->ProductCode)){ ?>
				<li class="info-blockquote-cart"> <span> <?php echo lang('ProductCode'); ?> : </span>
				<?php echo $trace->ProductCode; ?>
				</li> 
				<?php } ?>
				<?php if(!empty($trace->RefNumber)){ ?>
				<li class="info-blockquote-cart"> <span> <?php echo lang('RefNumber'); ?> : </span>
				<?php echo $trace->RefNumber; ?>
				</li> 
				<?php } ?>
				<?php if(!empty($trace->TransID)){ ?>
				<li class="info-blockquote-cart"> <span> <?php echo lang('TransID'); ?> : </span>
				<?php echo $trace->TransID; ?>
				</li> 
				<?php } ?>
					<?php if(!empty($trace->CardInfo)){ ?>
						<li class="info-blockquote-cart"> <span> <?php echo lang('CardInfo'); ?> : </span>
						<?php 
						if(isset($trace->CardInfo)){
						if(!empty($trace->CardInfo)){
						if(is_array($trace->CardInfo)){ ?>
							<table class="table table-striped table-bordered" style="text-align: center;font-size: 18px;">
								<tr> 
									<td> <?php echo lang('card_code'); ?> </td>
									<td> <?php echo lang('card_seri'); ?> </td>
									<td> <?php echo lang('expiration_date'); ?> </td>
								</tr>
								<?php foreach($trace->CardInfo as $CardInfo){?>
									<tr> 
										<td> <?php echo $CardInfo->card_code; ?> </td>
										<td> <?php echo $CardInfo->card_serial; ?> </td>
										<td> <?php echo $CardInfo->expiration_date; ?> </td>
									</tr>
								<?php } ?>
							</table>
						<?php } } } ?>	
						</li> 
					<?php } ?>
				<?php } ?>
		</ul>
		
	</blockquote>
	<?php } ?>
</div>
</div>
</div>

