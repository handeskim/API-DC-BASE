$(document).ready(function(){
	var p ={sd:DateMunisDefault(7),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){
	$("#LoadAjax").css("display","block");
	$("#ResponseTableStaticCard").css("display","none");
	var keys = $("#root_id").val();
	var p = {client_id:keys,date_start:e.sd,date_end:e.ed,csrf_hk_token:token_csrf};
	var f = 'reseller/service/review_clients';
	r = PFactory_Providers(f,p);
	$("#LoadAjax").css("display","none");
	TempResolver(r.result);
	
	
	
}

function TempResolver(e){
	
	TableResolverCard(e.card_logs);
	TableResolverCart(e.cart_logs);
	TableResolverWithdrawn(e.withdrawn_logs);
	TableResolverTransfer(e.transfer_logs);
}
function status_render(e){
	if(e==true){
		return "Active";
	}else{
		return "Disable";
	}
}
function TableResolverTransfer(e){
	$('#TableSLDataTransfer').dataTable({
		"dom": 'Blfrtip',
		"order": [[ 0, "desc" ]],
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'date_create'},
			{"data": 'transaction',"render":transaction_status},
			{"data": 'action'},
			{"data": 'money_transfer',"render":price_convert},
			{"data": 'fee',"render":price_convert},
			{"data": 'total_transfer',"render":price_convert},
			{"data": 'type'},
			{"data": 'payer_name'},
			
			]
	});
}
////////////////////

function TableResolverWithdrawn(e){
	$('#TableSLDataWithdraw').dataTable({
		"dom": 'Blfrtip',
			"order": [[ 0, "desc" ]],
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'date_create'},
			{"data": 'transaction',"render":transaction_status},
			{"data": 'money_transfer'},
			{"data": 'fee'},
			{"data": 'total_transfer'},
			{"data": 'bank_name'},
			{"data": 'account_holders'},
			{"data": 'provinces_bank'},
			{"data": 'bank_account'},
			{"data": 'branch_bank'},
			
			]
	});
}
////////////////////
function TableResolverCart(e){
	$('#TableSLDataCart').dataTable({
		"dom": 'Blfrtip',
			"order": [[ 0, "desc" ]],
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'date_create'},
			{"data": 'transaction_card',"render":transaction_status},
			{"data": 'Type'},
			{"data": 'CardName'},
			{"data": 'deduct'},
			{"data": 'CardQuantity',"render":price_convert},
			{"data": 'TotalOder',"render":price_convert},
			{"data": 'MoneyTransfer',"render":price_convert},
			]
	});
}
////////////////////
function TableResolverCard(e){
	$("#ResponseTableStaticCard").css("display","block");
	$('#TableSLDataCard').dataTable({
		"dom": 'Blfrtip',
			"order": [[ 0, "desc" ]],
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'date_create'},
			{"data": 'transaction_card',"render":transaction_status},
			{"data": 'card_seri'},
			{"data": 'card_code'},
			{"data": 'card_type'},
			{"data": 'card_amount',"render":price_convert},
			{"data": 'card_deduct'},
			{"data": 'card_message'},
			{"data": 'publisher'},
			
			]
	});
}