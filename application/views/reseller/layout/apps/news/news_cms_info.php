<div class="col-md-12 col-sm-12 col-xs-12 sub main-cms">
	{title_main}
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub " id="printDiv">
<?php if(!empty($news)){ ?>
<form id="AddNewsFRM" method="post" action="<?php echo base_url();?>reseller/news/Update_post">
<div class="box-body">
	<div class="col-md-6">
		<div class="form-group">
		 <label>Danh mục đăng tin</label>
			<select  id="categories" name="categories" class="form-control" required="">
				<option value="<?php echo $news['categories']; ?>"><?php echo $news['categories']; ?></option>
				<option value="news">Bài viết tin tức</option>
				<option value="notification">Bài viết Thông báo</option>
				<option value="faq">Bài viết FAQ</option>
			</select>
		</div>
		<div class="form-group">
			<label><?php echo lang('title');?></label>
			<input type="text" id="title" name="title" class="form-control" value="<?php echo $news['title']; ?>" placeholder="Tiêu đề bài viết" required="">
		
		</div>
		<div class="form-group">
			<label><?php echo lang('alias');?></label>
			<input type="text" id="alias" name="alias" class="form-control" value="<?php echo $news['alias']; ?>"  placeholder="URL sẽ hiển thị là /bai-viet-cho-be" required="">
		</div>
		
		<div class="form-group">
			<label><?php echo lang('images');?></label>
			 <input type="button" onclick="return ImagesPrimary(1);" value="Chọn ảnh" class="btn btn-default" size="20">
			<div id="images_primary1"> 
				<img src="<?php echo $news['images']; ?>" width="200px" height="200px" />
			</div>
			
		</div>
		
	</div>
	<div class="col-md-6">
		
		<div class="form-group">
		 <label><?php echo lang('keywords');?></label>
			<input type="text" id="title" name="keywords" value="<?php echo $news['keywords']; ?>" class="form-control" placeholder="từ khóa, em bé, em be, sản phẩm..." required="">
		
		</div>
		<div class="form-group">
			<label><?php echo lang('description');?></label>
			<textarea rows="3" id="description" name="description" class="form-control" placeholder="<?php echo lang('description');?> " required="">
				<?php echo $news['description']; ?>
			</textarea>
		</div>
		<div class="form-group">
			<label><?php echo lang('description_seo');?></label>
			<textarea  id="description_seo" rows="3" name="description_seo" class="form-control" placeholder="<?php echo lang('description_seo');?>" required="">
			<?php echo $news['description_seo']; ?>
			</textarea>
		</div>
		<div class="form-group">
			<label><?php echo lang('title_seo');?></label>
			<input type="text" id="title_seo" name="title_seo" value="<?php echo $news['title_seo']; ?>" class="form-control" placeholder="<?php echo lang('title_seo');?>" required="">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			 <label><?php echo lang('contents');?></label>
			<textarea rows="3" id="contents" name="contents" class="form-control" placeholder="<?php echo lang('contents');?>" required="">
				<?php echo $news['contents']; ?>
			</textarea>
		</div>
	</div>
</div>
<div class="box-footer">
	<div class="col-md-12">
	<input type="checkbox" id="VeryAdd" name="VeryAdd"> Đồng ý Chỉnh sửa</br></br>
	</div>
	<div class="col-md-4">
		 <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
	</div>
</div>
<input type="hidden" name="<?php echo core_csrf_name(); ?>" value="<?php echo core_token_csrf(); ?>"> 
<input type="hidden" name="keys" value="{root_id}"> 
</form>
<?php }?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 sub bottom-form">
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="Delete_transaction('{root_id}')" class="btn btn-danger"><i class="fa fa-trash"> </i> XÓA Bài viết  </button>	
	</div>	
	<div class="form-group  col-md-2 col-sm-6 col-xs-12 sub">
		<button type="button" onclick="printDiv('printDiv')" class="btn btn-primary pull-right"><i class="fa fa-print"> </i> IN </button>	
	</div>
	<div class="form-group  col-md-4 col-sm-6 col-xs-12 sub ">	
		
		<button type="button" onclick="CFactory_load()" class="btn btn-default pull-right"> <i class="fa fa-close"> </i> Thoát  </button>
	</div>
</div>
<script src="<?php echo base_url();?>assets/xcrud/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>app/Core/Admins/CMS/AddBlogs.js"></script>