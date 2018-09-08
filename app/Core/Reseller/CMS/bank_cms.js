$(document).ready(function(){
	var p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/bank_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function delete_ask(e){
	var f = "reseller/service/bank_cms_del";
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

function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_remove = '<a class="btn btn-small btn-danger" onclick="delete_ask(\'' + v.id + '\')"><i class="fa fa-trash"></i></a>';
		var px = { 
			'no':no,
			'id':v.id,
			'client_id':v.client_id,
			'reseller':v.reseller,
			'bank_id':v.bank_id,
			'bank_name':v.bank_name,
			'bank_option':v.bank_option,
			'account_holders':v.account_holders,
			'bank_account':v.bank_account,
			'branch_bank':v.branch_bank,
			'provinces_bank':v.provinces_bank,
			'time_created':v.time_created,
			'date_created':v.date_created,
			'action_remove':action_remove,
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	$('#TableSLData').dataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,4,5,6,7,8 ] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'no'},
			{"data": 'date_created'},
			{"data": 'client_id'},
			{"data": 'reseller',"visible": false,},
			{"data": 'bank_name'},
			{"data": 'account_holders'},
			{"data": 'bank_account'},
			{"data": 'branch_bank'},
			{"data": 'provinces_bank'},
			{"data": 'action_remove'}
			]
	});
	
}