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
	var f = 'api/history_card';
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
	LFactoryDetails_load('profile/history_card_info/'+e);
}
function temp_Extension(e){
	var p = [];
	var total_card_change = [];
	var total_card_received = [];
	var total_card_hold = [];
	var total_card_reject = [];
	$.each(e, function(k, v) {
	
		var transaction = v.transaction_card;
		if(transaction=='done'){
			total_card_change.push(v.card_amount);
			var card_deduct = v.card_deduct/100;
			var card_amount =v.card_amount;
			var amount = card_amount * card_deduct;
			total_card_received.push(amount);
		}
		if(transaction=='hold'){
			total_card_hold.push(v.card_amount);
		}
		if(transaction=='reject'){
			total_card_reject.push(v.card_amount);
		}
		var no = k;
		if(v.action === 'minus'){ 	
			var balancer = v.balancer_munis;
			var glosbe = v.total_transfer;
		}else if(v.action === 'plus'){
			var balancer = v.balancer_plus;
			var glosbe = v.money_transfer;
		}
		var info = '<a 	title="Details withdrawal" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';
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
			'publisher':v.publisher,
			'transaction_service':v.transaction_service,
			'transaction_card':v.transaction_card,
			'tracking':v.tracking,
			'action_info':info,
		};
		p.push(px);
	});
	$('.money_convert_received').empty();
	$('.money_convert_total').empty();
	$('.money_convert_reject').empty();
	$('.money_convert_hold').empty();
	if(total_card_received.length > 0){
		$('.money_convert_received').append(price_convert(sum_array(total_card_received))+' vnđ');
	}else{
		$('.money_convert_received').append('0 vnđ');
	}
	if(total_card_change.length > 0){
		$('.money_convert_total').append(price_convert(sum_array(total_card_change))+' vnđ');
	}else{
		$('.money_convert_total').append('0 vnđ');
	}
	if(total_card_reject.length > 0){
		$('.money_convert_reject').append(price_convert(sum_array(total_card_reject))+' vnđ');
	}else{
		$('.money_convert_reject').append('0 vnđ');
	}
	if(total_card_hold.length > 0){
		$('.money_convert_hold').append(price_convert(sum_array(total_card_hold))+' vnđ');
	}else{
		$('.money_convert_hold').append('0 vnđ');
	}
	TableResponseDetails(p);
}
function TableResponseDetails(e){
	var table =  $('#TableExtReport').DataTable({
		dom: 'Blrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8  ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8  ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8  ] } }
			],
		"destroy": true,
		"order": [[ 0, "desc" ]],
		"async": true,
		"processing": true,
		// "serverSide": true,
		"data": e,
		"columns": [
			{"data": 'date_created'},
			{"data": 'transaction_card',"render":transaction_status},
			{"data": 'card_seri'},
			{"data": 'card_code'},
			{"data": 'card_amount',"render":price_convert},
			{"data": 'card_status',"render":status_card_chage},
			{"data": 'card_message'},
			{"data": 'tracking'},
			{"data": 'publisher',"visible": false},
			{"data": 'action_info'}
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 // $(api.column(4).footer()).html( price_convert(api.column(4).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					
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