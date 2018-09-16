$(document).ready(function(){
	var p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/revenue_staff_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}

function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var px = { 
			'no':no,
			'client_id':v.client_id,
			'username':v.username,
			'card_total_transfer':v.card_total_transfer,
			'card_money_transfer':v.card_money_transfer,
			'cart_total_transfer':v.cart_total_transfer,
			'cart_money_transfer':v.cart_money_transfer,
		};
		p.push(px);
	});
	TableResolver(p);
}
function status_render(e){
	if(e==true){
		return "Active";
	}else{
		return "Disable";
	}
}
function role_render(e){
	if(e==1){return "Administrator";}
	else if(e==2){return "Admin";}
	else if(e==3){return "reseller";}
	else if(e==4){return "client";}
	else{ return "undefined"; }
}
function TableResolver(e){
	$('#TableSLData').dataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8,9,10,11,12,13 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8,9,10,11,12,13 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8,9,10,11,12,13] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8,9,10,11,12,13 ] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'no'},
			{"data": 'client_id'},
			{"data": 'username'},
			{"data": 'card_money_transfer','render':price_convert},
			{"data": 'card_total_transfer','render':price_convert},
			{"data": 'cart_total_transfer','render':price_convert},
			{"data": 'cart_money_transfer','render':price_convert},
			]
	});
	
}