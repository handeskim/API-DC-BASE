
<div class="col-md-12" style="margin-bottom: -15px;padding: 0px;">
		<h2 style="font-size: 16px;"> {title_main}</h2></br>
	</div>
<div class="col-md-12" style="margin: 0px;padding: 0px;">
	
	<div class="col-md-4">
		<div class="input-group date">
				<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày bắt đầu </label></i></div>
				<input type="text" name="date_start" class="form-control pull-left" id="date_start"  >
		</div>
		<div class="input-group date" style="margin-top:10px;">
			<div class="input-group-addon" ><i class="fa fa-calendar"> <label> Ngày kết thúc </label></i></div>
			<input type="text" name="date_end" class="form-control pull-left" id="date_end"  >
		</div>
		<div class="form-group">
			<input type="hidden" name="e" id="e" value="2">
			<button id="Search" class="btn btn-default" type="button" style="margin-top: 10px;"> Tra cứu</button>
		
		</div>
	
	</div>
	
	<div class="col-md-4">
		<div class="input-group" style="">
			<div class="input-group-addon" > <label> Extends</label></div>
			 <select id="extend" name="extends" class="form-control">
				<option value="all">All</option>
				<?php foreach($extends as $v_ext){ ?>
					<option value="<?php echo $v_ext['name']; ?>"><?php echo $v_ext['name']; ?></option>
				<?php } ?>
			 </select>
		</div>
		<div class="input-group" id="find_cnum" style="margin-top:10px;">
			<div class="input-group-addon" ><label> Type of Call	</label></div>
			 <select id="cnum" name="cnum" class="form-control">
				<option value="all">All</option>
				<option value="outbound">outbound</option>
				<option value="inbound">inbound</option>
				<option value="local">local</option>
			  </select>
		</div>
		
	</div>
	<div class="col-md-4">
	<div class="input-group" id="find_cnum" style="">
			<div class="input-group-addon" ><label> Destination</label></div>
			<input value="" name="destination" id="destination"  class="form-control">
		</div>
		<div class="input-group" id="find_cnum" style="margin-top:10px;">
			<div class="input-group-addon" ><label> Source </label></div>
			<input value="" name="source" id="source"  class="form-control">
		</div>
	</div>
</div>
<div class="col-md-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0px;padding: 0px;">
	<div id="LoaddingCharAnalytics" style="margin: 0 auto;  min-width: 200px; max-width: 400px; display:block;" >
		<img src="<?php echo base_url();?>public/images/giphy.gif">
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" id="body_record"  style="display:none;" >
	<div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              
                <h4 class="modal-title">Nghe Ghi Âm</h4>
              </div>
              <div class="modal-body" id="list_ctns">
               
              </div>
              <div class="modal-footer" id="list_ctns_pause">
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>

	<table class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" id="SLData" >
		<thead>
			<tr> 
				<th>#No</th>
				<th>Call date</th>
				<th>Source  </th>
				<th>Destination</th>
				<th>Duration</th>
				<th>DID</th>
				<th>Type of Call</th>
				<th> <i class="fa fa-cloud-download" > </i> </th>
				<th >Play </th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
                <th>Không có dữ liệu</th>
            </tr>
		</tbody>
		<tfoot>
            <tr>
                <th>#No</th>
				<th>Call date</th>
				<th>Source  </th>
				<th>Destination</th>
				<th>Duration</th>
				<th>DID</th>
				<th>Type of Call</th>
				<th><i class="fa fa-cloud-download" > </i> </th>
				<th>Play </th>
            </tr>
        </tfoot>
	</table>
	
	
</div>

<link rel="stylesheet" href="<?php echo base_url(); ?>public/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/dataTables.material.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/recording.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>public/datepicker/bootstrap-datetimepicker.min.css">
<link href="<?php echo base_url(); ?>assets/xcrud/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/xcrud/plugins/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>assets/xcrud/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/xcrud/plugins/timepicker/jquery-ui-timepicker-addon.js"></script>
<script src="<?php echo base_url(); ?>assets/xcrud/plugins/jcrop/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url(); ?>public/datepicker/moment.js"></script>
<script src="<?php echo base_url(); ?>public/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script>  var csrf_name = '<?php echo core_csrf_name(); ?>'; var token_csrf = '<?php echo core_token_csrf(); ?>'; </script>
<script src="<?php echo base_url(); ?>public/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>app/Services/Public/AppsRecording.js"> </script>

<style>
#SLData{
	position: relative;
}
#SLData tr{
	position: relative;
}
#SLData tbody tr{
	position: relative;
}
.modal-content{
    width: 1024px;
    left: -30%;
    top: 200px;
    z-index: 9999999999;
    position: absolute;
}
.play_audio{
	background: transparent;
    border: none;
}
</style>