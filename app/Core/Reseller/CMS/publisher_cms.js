$(document).ready(function(){
	var p={sd:DateMunisDefault(3),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/publisher_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/publisher_cms_del";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có muốn xóa không');
	if(q==true){
		var r = PFactory_Providers(f,p);
		if(r.status==true){
			alert(r.data.msg);
			window.location.reload();
		}
	}
}
function save_status(e){
	var f = "reseller/service/publisher_cms_agree";
	var levels = $("#levels").val();
	if(levels != null || levels != undefined){
		var p = {csrf_hk_token:token_csrf,e:e,levels:levels};
		var q = confirm('bạn có muốn cập nhập không');
		if(q==true){
			var r = PFactory_Providers(f,p);
			if(r.status==true){
				alert(r.data.msg);
				window.location.reload();
			}
		}
	}else{
		alert('vui lòng chọn cấp độ nâng cấp');
	}
	
}
function info_ask(e){
	LFactory_load('reseller/publisher/edit/'+e);
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_info = '<a 	title="Details publisher" class="btn btn-small btn-warning" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-edit"></i></a>';
		var remove_info = '<a 	title="Remove publisher" class="btn btn-small btn-danger" onclick="Delete_transaction(\'' + v.id + '\')"><i class="fa fa-trash"></i></a>';

		var px = { 
			'no':no,
			'date_create':v.date_create,
			'client_id':v.client_id,
			'full_name':v.full_name,
			'username':v.username,
			'email':v.email,
			'levels':v.levels,
			'action_info':action_info,
			'remove_info':remove_info,
		};
		p.push(px);
	});
	TableResolver(p);
}
function render_levels(e){
	if(e != null || e != undefined){
		if(e===1){ return  "Thường";}
		else if(e===2){ return  "VIP";}
		else{ return e;}
	}else{
		return e;
	}
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'no',"visible": false},
			{"data": 'date_create'},
			{"data": 'client_id'},
			{"data": 'username'},
			{"data": 'full_name'},
			{"data": 'email'},
			{"data": 'levels','render':render_levels},
			{"data": 'action_info'},
			{"data": 'remove_info'}
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 // $(api.column(5).footer()).html( price_convert(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
				
			}
	});
	table.columns().every(function () {
			var self = this;
			$( 'input.datepicker', this.footer() ).on('dp.change', function (e) {
					self.search( this.value ).draw();
			});
			$( 'input:not(.datepicker)', this.footer() ).on('keyup change', function (e) {
					var code = (e.keyCode ? e.keyCode : e.which);
					if (((code == 13 && self.search() !== this.value) || (self.search() !== '' && this.value === ''))) {
							self.search( this.value ).draw();
					}
			});
			$( 'select', this.footer() ).on( 'change', function (e) {
					self.search( this.value ).draw();
			});
			$('#text_filter').on('keyup change', function () {
        table.columns(1).search( this.value ).draw();
			})
	});
	 $('#search_table').on( 'keypress', function (e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if (((code == 13 && table.search() !== this.value) || (table.search() !== '' && this.value === ''))) {
					table.search( this.value ).draw();
			}
	});
	
}