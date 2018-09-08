$(document).ready(function(){
	var e ='';
	Resolver(e);
	$("#addBanking").click(function(){
		$(".frmBankAdd").toggle();
	});	
	$(".close_add_bank").click(function(){
		$(".frmBankAdd").toggle();
	});
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/bank_config_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function delete_ask(e){
	var f = "reseller/service/bank_config_cms_del";
	var p = {csrf_hk_token:token_csrf,e:e};
	var q = confirm('bạn có muốn xóa không');
	if(q==true){
		var r = PFactory_Providers(f,p);
		if(r.status==true){
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
			'name':v.name,
			'action_remove':action_remove,
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	$('#TableSLData').dataTable({
		"dom": 'Blfrtip',
		"aaSorting": [[0, 'desc']],
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4 ] } }
			],
		"destroy": true,
		"async": true,
		"data": e,
		"columns": [
			{"data": 'no'},
			{"data": 'id'},
			{"data": 'name'},
			{"data": 'action_remove'}
			]
	});
	
}