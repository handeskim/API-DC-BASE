$(document).ready(function(){
	var p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/payments_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/payments_cms_del";
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
function Agreed_transactions(e){
	var f = "reseller/service/payments_cms_agree";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có chấp nhận giao dịch');
	if(q==true){
		var r = PFactory_Providers(f,p);
		if(r.status==true){
			alert(r.data.result);
			window.location.reload();
		}
	}
}
function Cancel_transaction(e){
	var f = "reseller/service/payments_cms_cancel";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có hủy giao dịch');
	if(q==true){
		var r = PFactory_Providers(f,p);
		if(r.status==true){
			alert(r.data.result);
			window.location.reload();
		}
	}
}
function info_ask(e){
	LFactory_load('reseller/payments/info/'+e);
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_info = '<a 	title="Details withdrawal" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';
		var px = { 
			'no':no,
			'id_clients':v.id_clients,
			'payment_method':v.payment_method,
			'order_code':v.order_code,
			'date_create':v.date_create,
			'buyer_fullname':v.buyer_fullname,
			'buyer_mobile':v.buyer_mobile,
			'buyer_email':v.buyer_email,
			'payment_type':v.payment_type,
			'order_description':v.order_description,
			'total_amount':v.total_amount,
			'bank_code':v.bank_code,
			'service_name':v.service_name,
			'transaction':v.transaction,
			'status':v.status,
			'token_service':v.token_service,
			'action_info':action_info
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,7,8,11 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,7,8,11] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [  0,1,2,3,4,5,7,8,11 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [  0,1,2,3,4,5,7,8,11 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'date_create'},
			{"data": 'id_clients'},
			{"data": 'buyer_fullname',"visible": false},
			{"data": 'buyer_mobile',"visible": false},
			{"data": 'buyer_email',"visible": true},
			{"data": 'payment_type',"visible": false},
			{"data": 'total_amount'},
			{"data": 'bank_code'},
			{"data": 'service_name'},
			{"data": 'transaction','render':transaction_status},
			{"data": 'token_service'},
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