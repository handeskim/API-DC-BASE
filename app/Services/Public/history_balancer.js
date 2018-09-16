$(document).ready(function(){
	var d_start = DateMunisDefault(30);
	var d_end = DateMunisDefault(0);
	data_realtime(d_start,d_end);
	$("#search_history_balancer").click(function(){
		$(".Loadding").toggle();
		var d_start = $("#date_start").val();	
		var d_end = $("#date_end").val();	
		data_realtime(d_start,d_end);
	});
});
function data_realtime(s,e){
	var f = 'api/balancer_history';
	var p = {csrf_hk_token:token_csrf,s:s,e:e};
	var r = PFactory_Providers(f,p);
	$(".Loadding").css('display','none');
	if(r.status==true){
		if(r.result.status===1000){
			var e = r.result.data;
			temp_Extension(e);
		}else{
			var e = null;
			temp_Extension(e);
		}
	}else{
		var e = null;
		temp_Extension(e);
	}
}
function info_ask(e){
	LFactoryDetails_load('profile/transfer_info/'+e);
}
function temp_Extension(e){
	var p = [];
	$.each(e, function(k, v) {
		if(v.action === 'minus'){ 	
			var balancer = v.balancer_munis;
			var glosbe = v.total_transfer;
		}else if(v.action === 'plus'){
			var balancer = v.balancer_plus;
			var glosbe = v.money_transfer;
		}
		var info = '<a 	title="Details withdrawal" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';
		var px = { 
			'id':v.id,
			'date_create':v.date_create,
			'glosbe':glosbe,
			'balancer':balancer,
			'beneficiary':v.beneficiary,
			'payer_name':v.payer_name,
			'type':v.type,
			'transaction':v.transaction,
			'status':v.status,
			'action':v.action,
			'info':info,
		};
		p.push(px);
	});
	TableResponseDetails(p);
}
function TableResponseDetails(e){
	var table =  $('#TableExtReport').DataTable({
		dom: 'Blrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } }
			],
		"destroy": true,
		"order": [[ 1, "desc" ]],
		"async": true,
		"data": e,
		"columns": [
			{"data": 'id',"visible": false}, 
			{"data": 'date_create'}, 
			{"data": 'type'}, 
			{"data": 'transaction','render':transaction_status}, 
			{"data": 'action'}, 
			{"data": 'glosbe','render':price_convert}, 
			{"data": 'balancer','render':price_convert}, 
			{"data": 'beneficiary'}, 
			{"data": 'payer_name'}, 
			{"data": 'status'}, 
			
			{"data": 'info'}, 
		],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 $(api.column(5).footer()).html( price_convert(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
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