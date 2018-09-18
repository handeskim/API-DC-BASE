$(document).ready(function(){
	var p={sd:DateMunisDefault(3),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/publisher_rose_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}

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
	console.log(e);
	LFactory_load('reseller/publisher/rose_info/'+e);
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var action_info = '<a 	title="Details Rose" class="btn btn-small btn-info" onclick="info_ask(\'' + v.client_id +'-'+v.time_start+'-'+v.time_end+ '\')"><i class="fa fa-info-circle"></i></a>';
		var no = k;
		var px = { 
			'no':no,
			'partner':v.partner,
			'client_id':v.client_id,
			'username':v.username,
			'cart_rose':v.cart_rose,
			'card_change_rose':v.card_change_rose,
			'total_rose':v.total_rose,
			'total_rose_partner':v.total_rose_partner,
			'date_start':v.date_start,
			'date_end':v.date_end,
			'action_info':action_info,
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
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [0,1,2,3,4,5,6,7,8,9,10 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 4, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'no'},
			{"data": 'client_id'},
			{"data": 'username'},
			{"data": 'cart_rose','render':price_convert},
			{"data": 'card_change_rose','render':price_convert},
			{"data": 'total_rose','render':price_convert},
			{"data": 'partner'},
			{"data": 'total_rose_partner','render':price_convert},
			{"data": 'date_start'},
			{"data": 'date_end'},
			{"data": 'action_info'},
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 $(api.column(5).footer()).html( price_convert(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					 $(api.column(4).footer()).html( price_convert(api.column(4).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					 $(api.column(3).footer()).html( price_convert(api.column(3).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
				
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