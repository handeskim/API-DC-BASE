<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
<div class="col-md-12 col-sm-12 col-xs-12 sub reset">
	<div class="col-md-12 col-sm-12 col-xs-12 sub reset">
		<h3> {title_main}</h3>
		<div class="col-md-12 col-sm-12 col-xs-12 sub reset" > 
			<div id="LoadAjax" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:none;" >
			<img src="<?php echo base_url();?>public/images/giphy.gif">
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-action reset"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub loading-container-action reset"> 
				
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-realtime-work"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub container-realtime-work-withdrawal reset"> 
				<h4>Yêu cầu rút tiền</h4>
				<div class="col-md-12 col-sm-12 col-xs-12 sub container-realtime-work-withdrawal reset"> 
					<?php 
					if(!empty($task_work['withdraw'])){ ?>
					<table class="table table-striped table-bordered"> 
							<tr> 
								<td> <?php echo lang('date_created');?></td>
								<td> <?php echo lang('money_transfer');?></td>
								<td> <?php echo lang('fee');?></td>
								<td> <?php echo lang('client_id');?></td>
								<td> <?php echo lang('account_holders');?></td>
								<td> <?php echo lang('bank_name');?></td>
								<td> <?php echo lang('branch_bank');?></td>
								<td> <?php echo lang('transaction');?></td>
								<td> Quản lý</td>
							</tr>
							<?php foreach($task_work['withdraw'] as $v_task_withdraw){?>
								<?php if(!empty($v_task_withdraw['client_id'])){ ?>
								<tr> 
									<td><?php echo $v_task_withdraw['date_update_transfer']; ?></td>
									<td><?php echo $v_task_withdraw['money_transfer']; ?></td>
									<td><?php echo $v_task_withdraw['fee']; ?></td>
									<td><a class="btn btn-small btn-info" target="_blank" href="<?php echo base_url('reseller/staff/details.html');?>?keys=<?php echo $v_task_withdraw['client_id']; ?>"><?php echo $v_task_withdraw['client_id']; ?></a></td>
									<td><?php echo $v_task_withdraw['payer_name']; ?></td>
									<td><?php echo $v_task_withdraw['bank_name']; ?></td>
									<td><?php echo $v_task_withdraw['branch_bank']; ?></td>
									<td><?php echo $v_task_withdraw['transaction']; ?></td>
									<td><a class="btn btn-info" href="<?php echo base_url('reseller/withdrawal.html');?>"><i class="fa fa-info"> </i> Quản lý</a></td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 sub container-realtime-work-withdrawal reset"> 
				<h4>Yêu cầu đăng ký API</h4>
				<div class="col-md-12 col-sm-12 col-xs-12 sub container-realtime-work-withdrawal reset"> 
					<?php 
					if(!empty($task_work['api_keys'])){ ?>
						<table class="table table-striped table-bordered"> 
							<tr> 
								<td> <?php echo lang('date_created');?></td>
								<td> <?php echo lang('key');?></td>
								<td> <?php echo lang('client_id');?></td>
								<td> IP Register</td>
								<td> Quản lý</td>
							</tr>
							<?php foreach($task_work['api_keys'] as $v_task_api){?>
								<?php if(!empty($v_task_api['users'])){ ?>
								<tr> 
									<td><?php echo $v_task_api['date_created']; ?></td>
									<td><?php echo $v_task_api['key']; ?></td>
									<td><a class="btn btn-small btn-info" target="_blank" href="<?php echo base_url('reseller/staff/details.html');?>?keys=<?php echo $v_task_api['users']; ?>"><?php echo $v_task_api['users']; ?></a></td>
									<td><?php echo $v_task_api['ip_addresses']; ?></td>
									<td><a class="btn btn-info" href="<?php echo base_url('reseller/developer.html');?>"><i class="fa fa-info"> </i> Quản lý</a></td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12 sub container-table" id="container-table"> 
			<div class="col-md-12 col-sm-12 col-xs-12 sub " > 
				<div class="col-md-4 col-sm-6 col-xs-12 sub pull-left tab_line">
					<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/staff.html');?>"><i class="fa fa-info-circle"> </i></a> Tổng Thành viên<span></span> <span class="label label-success">{user_info}</span></span>
					</div>
					<?php 
					if(!empty($api_group)){
					if(is_array($api_group)){
					if(!empty($api_group['result'])){
					if(is_array($api_group['result'])){
					foreach($api_group['result'] as $api_group_result){ ?>
							<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<?php if($api_group_result['_id']=='2'){?>
							<span class="info_status"> API Active Admin Level <span><?php echo $api_group_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($api_group_result['count'],0,'.','.'); ?> </span></span>
							<?php } ?>
							<?php if($api_group_result['_id']=='1'){?>
							<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/developer.html');?>"> <i class="fa fa-info-circle"> </i> </a> API No Active Level <span><?php echo $api_group_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($api_group_result['count'],0,'.','.'); ?> </span>  </span>
							<?php } ?>
							<?php if($api_group_result['_id']=='3'){?>
							<span class="info_status">API Active Reseller Level <span><?php echo $api_group_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($api_group_result['count'],0,'.','.'); ?> </span></span>
							<?php } ?>
							<?php if($api_group_result['_id']=='4'){?>
							<span class="info_status"> API Active Client Level <span><?php echo $api_group_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($api_group_result['count'],0,'.','.'); ?> </span></span>
							<?php } ?>
							</div>
					<?php }}}}}?>
				
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 sub  pull-left tab_line">
				<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/card.html');?>"><i class="fa fa-info-circle"> </i></a> Tổng Giao Dịch Đổi Thẻ  <span></span> <span class="label label-success">{card_change}</span> </span>
				</div>
					<?php 
				if(!empty($card_change_sum)){
				if(is_array($card_change_sum)){
				if(!empty($card_change_sum['result'])){
				if(is_array($card_change_sum['result'])){
				foreach($card_change_sum['result'] as $card_change_sum_result){ ?>
						<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<?php if($card_change_sum_result['_id']=='hold'){?>
						<span class="info_status">Trạng Thái Đổi Thẻ <span><?php echo $card_change_sum_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($card_change_sum_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($card_change_sum_result['_id']=='reject'){?>
						<span class="info_status"> Trạng Thái  Đổi Thẻ <span><?php echo $card_change_sum_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($card_change_sum_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($card_change_sum_result['_id']=='done'){?>
						<span class="info_status"> Trạng Thái Đổi Thẻ <span><?php echo $card_change_sum_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($card_change_sum_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						</div>
				<?php }}}}}?>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 sub  pull-left tab_line">
				
							<?php 
						if(!empty($card_transaction)){
						if(is_array($card_transaction)){
						if(!empty($card_transaction['result'])){
						if(is_array($card_transaction['result'])){
						$card_total = array();
						foreach($card_transaction['result'] as $card_transaction_result){ 
							$card_total[] = $card_transaction_result['count'];
						?>
								<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
								<?php if($card_transaction_result['_id']=='hold'){?>
								<span class="info_status">Giao Dịch Đổi Thẻ <span> <?php echo $card_transaction_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($card_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
								<?php } ?>
								
								<?php if($card_transaction_result['_id']=='reject'){?>
								<span class="info_status"> Giao Dịch Đổi Thẻ <span> <?php echo $card_transaction_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($card_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
								<?php } ?>
								
								<?php if($card_transaction_result['_id']=='done'){?>
								<span class="info_status">Giao Dịch Đổi Thẻ<span> <?php echo $card_transaction_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($card_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
								<?php } ?>
								</div>
						<?php }}}}}?>
						<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
								<span class="info_status"> Tổng Giao Dịch Đổi Thẻ <span></span> <span class="label label-success"><?php if(!empty($card_total)){ echo number_format(array_sum($card_total),0,'.','.'); } ?> vnđ</span></span>
						</div>
				</div>
				
				
				<div class="col-md-4 col-sm-6 col-xs-12 sub  pull-left tab_line">
				<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/withdrawal.html');?>"><i class="fa fa-info-circle"> </i></a> Tổng withdrawal <span></span> <span class="label label-success">{withdrawal}</span></span>
				</div>
					<?php 
				if(!empty($withdrawal_group)){
				if(is_array($withdrawal_group)){
				if(!empty($withdrawal_group['result'])){
				if(is_array($withdrawal_group['result'])){
				foreach($withdrawal_group['result'] as $withdrawal_group_result){ ?>
						<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<?php if($withdrawal_group_result['_id']=='hold'){?>
						<span class="info_status">Trạng Thái withdrawal <span> <?php echo $withdrawal_group_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($withdrawal_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($withdrawal_group_result['_id']=='reject'){?>
						<span class="info_status"> Trạng Thái withdrawal <span> <?php echo $withdrawal_group_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($withdrawal_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($withdrawal_group_result['_id']=='done'){?>
						<span class="info_status"> Trạng Thái withdrawal<span> <?php echo $withdrawal_group_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($withdrawal_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						</div>
				<?php }}}}}?>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 sub  pull-left tab_line">
				
						<?php 
					if(!empty($withdrawal_transaction)){
					if(is_array($withdrawal_transaction)){
					if(!empty($withdrawal_transaction['result'])){
					if(is_array($withdrawal_transaction['result'])){
					$withdrawal_total = array();
					foreach($withdrawal_transaction['result'] as $withdrawal_transaction_result){ 
						$withdrawal_total[] = $withdrawal_transaction_result['count'];
					?>
							<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<?php if($withdrawal_transaction_result['_id']=='hold'){?>
							<span class="info_status">Giao Dịch withdrawal <span> <?php echo $withdrawal_transaction_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($withdrawal_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
							
							<?php if($withdrawal_transaction_result['_id']=='reject'){?>
							<span class="info_status"> Giao Dịch withdrawal <span> <?php echo $withdrawal_transaction_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($withdrawal_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
							
							<?php if($withdrawal_transaction_result['_id']=='done'){?>
							<span class="info_status">Giao Dịch withdrawal<span> <?php echo $withdrawal_transaction_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($withdrawal_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
							</div>
					<?php }}}}}?>
					<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<span class="info_status"> Tổng Giao Dịch withdrawal <span></span> <span class="label label-success"><?php if(!empty($withdrawal_total)){echo number_format(array_sum($withdrawal_total),0,'.','.'); } ?> vnđ</span></span>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-12 sub pull-left  tab_line">
				<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/transfer.html');?>"><i class="fa fa-info-circle"> </i></a> Tổng Transfer <span></span> <span class="label label-success">{transfer_log}</span></span>
				</div>
					<?php 
				if(!empty($transfer_log_group)){
				if(is_array($transfer_log_group)){
				if(!empty($transfer_log_group['result'])){
				if(is_array($transfer_log_group['result'])){
				foreach($transfer_log_group['result'] as $transfer_log_group_result){ ?>
						<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<?php if($transfer_log_group_result['_id']=='hold'){?>
						<span class="info_status">Trạng Thái Transfer <span> <?php echo $transfer_log_group_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($transfer_log_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($transfer_log_group_result['_id']=='reject'){?>
						<span class="info_status"> Trạng Thái Transfer <span> <?php echo $transfer_log_group_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($transfer_log_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($transfer_log_group_result['_id']=='done'){?>
						<span class="info_status"> Trạng Thái Transfer<span> <?php echo $transfer_log_group_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($transfer_log_group_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						</div>
				<?php }}}}}?>
				</div>
				
				<div class="col-md-4 col-sm-6 col-xs-12 sub pull-left  tab_line">
						<?php 
					if(!empty($transfer_transaction)){
					if(is_array($transfer_transaction)){
					if(!empty($transfer_transaction['result'])){
					if(is_array($transfer_transaction['result'])){
					$transfer_total = array(); ?>
					
						<?php foreach($transfer_transaction['result'] as $transfer_transaction_result){ 
						$transfer_total[] = $transfer_transaction_result['count'];
						?>
							<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<?php if($transfer_transaction_result['_id']=='hold'){?>
							<span class=" pull-left info_status">Giao Dịch Transfer <span> <?php echo $transfer_transaction_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($transfer_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
							
							<?php if($transfer_transaction_result['_id']=='reject'){?>
							<span class=" pull-left info_status"> Giao Dịch Transfer <span> <?php echo $transfer_transaction_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($transfer_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
							
							<?php if($transfer_transaction_result['_id']=='done'){?>
							<span class=" pull-left info_status">Giao Dịch Transfer<span> <?php echo $transfer_transaction_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($transfer_transaction_result['count'],0,'.','.'); ?> vnđ</span></span>
							<?php } ?>
								</div>
					<?php } ?>
				
						
					<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
							<span class=" pull-left info_status"> Tổng Giao Dịch Transfer <span></span> <span class="label label-success"><?php if(!empty($transfer_total)){ echo number_format(array_sum($transfer_total),0,'.','.'); } ?> vnđ</span></span>
					</div>
					<?php }}}}?>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 sub  pull-left tab_line">
				<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<span class="info_status"> <a target="_blank" class="btn btn-info" href="<?php echo base_url('reseller/payments.html');?>"><i class="fa fa-info-circle"> </i></a> Tổng Giao Dịch Nạp Tài khoản<span></span> <span class="label label-success">{history_payments}</span></span>
				</div>
					<?php 
				if(!empty($history_payments_transaction)){
				if(is_array($history_payments_transaction)){
				if(!empty($history_payments_transaction['result'])){
				if(is_array($history_payments_transaction['result'])){
				foreach($history_payments_transaction['result'] as $history_payments_transaction_result){ ?>
						<div class="col-md-12 col-sm-12 col-xs-12 info_status_header" > 
						<?php if($history_payments_transaction_result['_id']=='hold'){?>
						<span class="info_status">Trạng Thái Nạp  Tài khoản <span><?php echo $history_payments_transaction_result['_id']; ?>  </span> <span class="label label-success"><?php echo number_format($history_payments_transaction_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($history_payments_transaction_result['_id']=='reject'){?>
						<span class="info_status"> Trạng Thái  Nạp  Tài khoản <span><?php echo $history_payments_transaction_result['_id']; ?>  </span>   <span class="label bg-black"><?php echo number_format($history_payments_transaction_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						
						<?php if($history_payments_transaction_result['_id']=='done'){?>
						<span class="info_status"> Trạng Thái Nạp Tài khoản <span><?php echo $history_payments_transaction_result['_id']; ?>  </span> <span class="label bg-yellow"><?php echo number_format($history_payments_transaction_result['count'],0,'.','.'); ?> </span></span>
						<?php } ?>
						</div>
				<?php }}}}}?>
				</div>
			</div>
		</div>
		
	</div>
</div>
</div>
<script>  var core_csrf_name = '<?php echo core_csrf_name(); ?>'; var core_token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
