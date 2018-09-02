$(document).ready(function(){
	data_realtime();
});
function data_realtime(){
	var f = 'api/balancer_history';
	var p = {csrf_asterisk_name:token_csrf};
	var r = GFactory_Providers(f,p);
	if(r.status==true){
		if(r.result.status===1000){
			var e = r.result.data;
			temp_Extension(e);
		}
	}
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
		var info = '<a class="btn btn-small btn-info" onclick="look_history_transfer_log('+v.id+')"><i class="fa fa-info-circle"></i></a>';
		var px = { 
			'id':v.id,
			'date_create':v.date_create,
			'glosbe':glosbe,
			'balancer':balancer,
			'beneficiary':v.beneficiary,
			'payer_name':v.payer_name,
			'status':v.status,
			'action':v.action,
			'info':info,
		};
		p.push(px);
	});
	TableResponseDetails(p);
}
function TableResponseDetails(e){
	$('#TableExtReport').dataTable({
		dom: 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6 ] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'id',"visible": false}, 
			{"data": 'date_create'}, 
			{"data": 'action','render':transfer_action}, 
			{"data": 'glosbe','render':price_convert}, 
			{"data": 'balancer','render':price_convert}, 
			{"data": 'beneficiary'}, 
			{"data": 'payer_name'}, 
			{"data": 'status'}, 
			{"data": 'info'}, 
		]
	});
	
}