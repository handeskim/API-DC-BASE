$(document).ready(function(){
	var p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/transfer_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/transfer_cms_del";
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
function info_ask(e){
	LFactory_load('reseller/transfer/info/'+e);
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_deletel = '';
		var action_info = '<a 	title="Details withdrawal" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';
		if(v.transaction !=='hold'){
			 action_deletel = '<a 	title="Remove withdrawal" class="btn btn-small btn-danger" onclick="Delete_transaction(\'' + v.id + '\')"><i class="fa fa-trash"></i></a>';
		}
		var px = { 
			'no':no,
			'date_created':v.date_created,
			'money_transfer':v.money_transfer,
			'fee': v.fee,
			'total_transfer':v.total_transfer,
			'transaction':v.transaction,
			'bank_name':v.bank_name,
			'account_holders':v.account_holders,
			'bank_account':v.bank_account,
			'provinces_bank':v.provinces_bank,
			'branch_bank':v.branch_bank,
			'type':v.type,
			'client_name':v.client_name,
			'client_id':v.client_id,
			'action_info':action_info,
			'action_deletel':action_deletel,
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	$.fn.dataTable.Api.register( 'sum()', function () {
			return this.flatten().reduce( function ( a, b ) {
					return (a*1) + (b*1); 
			});
	});
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
			{"data": 'money_transfer',"render":price_convert},
			{"data": 'fee',"render":price_convert},
			{"data": 'total_transfer',"render":price_convert},
			{"data": 'transaction','render':transaction_status},
			{"data": 'bank_name',"visible": false},
			{"data": 'account_holders'},
			{"data": 'bank_account'},
			{"data": 'provinces_bank',"visible": false},
			{"data": 'branch_bank',"visible": false},
			{"data": 'type','render':transaction_type},
			{"data": 'client_name'},
			{"data": 'client_id'},
			{"data": 'action_info'},
			{"data": 'action_deletel'}
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					$(api.column(2).footer()).html( price_convert(api.column(2).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					 $(api.column(3).footer()).html( price_convert(api.column(3).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					 $(api.column(4).footer()).html( price_convert(api.column(4).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
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
			});
	});
	
	 $('#search_table').on( 'keypress', function (e) {
			var code = (e.keyCode ? e.keyCode : e.which);
			if (((code == 13 && table.search() !== this.value) || (table.search() !== '' && this.value === ''))) {
					table.search( this.value ).draw();
			}
	});
	
}