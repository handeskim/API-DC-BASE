<div class="main-profile-body-edit col-md-12 col-sm-12 col-xs-12 sub">
	<div class="main-profile-title col-md-12 col-sm-12 col-xs-12 sub">
			THÔNG TIN TÀI KHOẢN  
	</div>
	<div class="main-profile-body col-md-12 col-sm-12 col-xs-12 sub ">
		<div class="main-profile-body-details col-md-12 col-sm-12 col-xs-12 sub main-body-col"> 
				<h3 class="title col-md-12 col-sm-12 col-xs-12 sub"><span class="title_head"> 
					THÔNG TIN TÀI KHOẢN NGÂN HÀNG </span> <span class="btn btn-danger pull-right open_expand_bank"> Thêm mới </span> </h3>
				<?php if(!empty($bank_info)){$display_bank = 'none';}else{$display_bank = 'block'; } ?>
				<?php if(!empty($bank_info)){?>
					<div class="col-md-12 col-sm-12 col-xs-12 sub tab_bank_list" >
						<table class="table table-bordered table-striped table-condensed table-hover dataTable table_tab_bank_list">
							 <thead>
								<tr>
									<td>Ngân hàng</td>
									<td>Số tài khoản</td>
									<td>Chủ tài khoản</td>
									<td>Chi nhánh</td>
									<td>Tỉnh thành</td>
									<td>Hành động</td>
								</tr>	
							</thead>
							<tbody>
								<?php if(!empty($bank_info)){?>
									<?php foreach($bank_info as $b){ 
									?>
									<tr>
										<td><?php if(!empty($b->bank_name)){ echo $b->bank_name; } ?></td>
										<td><?php if(!empty($b->bank_account)){ echo $b->bank_account; } ?></td>
										<td><?php if(!empty($b->account_holders)){ echo $b->account_holders; } ?></td>
										<td><?php if(!empty($b->branch_bank)){ echo $b->branch_bank; } ?></td>
										<td><?php if(!empty($b->provinces_bank)){ echo $b->provinces_bank; } ?></td>
										<td><button onclick="bank_empty('<?php if(!empty($b->bank_id)){ echo $b->bank_id; } ?>')" class="btn btn-danger"> <i class="fa fa-trash"> </i></button></td>
									</tr>	
									<?php } ?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				<?php } ?>
				<div class="col-md-12 col-sm-12 col-xs-12 sub tab_add_bank" style="display:<?php echo $display_bank; ?>">
					<form class="from-edit-profile col-md-12 col-sm-12 col-xs-12 sub " method="post" action="<?php echo base_url();?>profile/bank_add" >
						<?php 
						if(!empty($bank_option)){?>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('bank_option');?></span>
							<select class="form-control" id="bank_option_a" name="bank_option" >
									<option class="form-control" > <?php echo lang('bank_option');?> </option>
									<?php foreach($bank_option as $v){ ?>
										<?php if(!empty($v["name"])){?>
											<option class="form-control" value="<?php echo $v["type_bank"]; ?>"> <?php echo $v["name"]; ?></option>
										<?php } ?>
									<?php } ?>
							</select>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('bank_name');?></span>
							 <div id="bank_name_add"> 
									<select class="form-control" id="bank_option_a" name="bank_id" >
										<option > <?php echo lang('bank_name');?> </option>
									</select>
							 </div>
						</div>
						
						<?php } ?>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('account_holders');?></span>
								<input type="text"  name="account_holders" class="form-control" placeholder="" value="" required>
						</div>
						
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('bank_account');?></span>
								<input type="number" min="8"  name="bank_account" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('branch_bank');?></span>
								<input type="text" name="branch_bank" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('provinces_bank');?></span>
								<input type="text" name="provinces_bank" class="form-control" placeholder="" value="" required>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><?php echo lang('auth');?></span>
								<input type="text" name="auth" class="form-control" placeholder="" value="" required>
								<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>">
						</div>
						<div class="bank_name_select"></div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="is_checked"> Đồng ý cập nhập thông tin
							</label>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 sub ">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-primary pull-left"> THÊM NGÂN HÀNG</button>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" class="btn btn-default pull-right close_expand_bank"> Đóng</button>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()?>app/Services/Public/profile_bank.js">  </script>