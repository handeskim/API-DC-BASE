$(document).ready(function(){
	var p={sd:DateMunisDefault(3),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/card_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/card_cms_del";
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
function Cancel_transaction(e){
	var f = "reseller/service/card_cms_cancel";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có muốn thu hồi không');
	if(q==true){
		var r = PFactory_Providers(f,p);
		// console.log(r.data);
		if(r.status==true){
			alert(r.data.status);
			window.location.reload();
		}
	}
}
function Agreed_transactions(e){
	var f = "reseller/service/card_cms_agreed";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có xác nhận thẻ không');
	if(q==true){
		var r = PFactory_Providers(f,p);
		// console.log(r.data);
		if(r.status==true){
			alert(r.data.status);
			window.location.reload();
		}
	}
}
function info_ask(e){
	LFactory_load('reseller/card/info/'+e);
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_info = '<a 	title="Details withdrawal" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';
		
		var px = { 
			'no':no,
			'date_created':v.date_create,
			'card_seri':v.card_seri,
			'card_code':v.card_code,
			'card_type':v.card_type,
			'card_amount':v.card_amount,
			'client_id':v.client_id,
			'publisher':v.publisher,
			'reseller':v.reseller,
			'card_deduct':v.card_deduct,
			'card_rose':v.card_rose,
			'card_status':v.card_status,
			'card_message':v.card_message,
			'transaction_service':v.transaction_service,
			'transaction_card':v.transaction_card,
			'tracking':v.tracking,
			'action_info':action_info,
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'no',"visible": false},
			{"data": 'date_created'},
			{"data": 'transaction_card',"render":transaction_status},
			{"data": 'card_seri'},
			{"data": 'card_code'},
			{"data": 'card_type',"visible": false},
			{"data": 'card_amount',"render":price_convert},
			{"data": 'client_id'},
			{"data": 'card_deduct',"render":percentage},
			{"data": 'card_rose',"render":percentage},
			{"data": 'card_status',"render":status_card_chage},
			{"data": 'card_message'},
			{"data": 'transaction_service',"visible": false},
			{"data": 'tracking'},
			{"data": 'action_info'}
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 $(api.column(6).footer()).html( price_convert(api.column(6).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
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