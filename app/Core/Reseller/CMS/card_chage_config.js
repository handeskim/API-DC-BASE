$(document).ready(function(){
	Resolver();
});
function AddCardChange(){
	$("#AddCardChange").toggle();
	$("#ResponseTableStatic").toggle();
}


function CloseCardChange(){
	$("#AddCardChange").toggle();
	$("#ResponseTableStatic").toggle();
}
function Resolver(){$("#LoadAjax").css("display","block"),
	$.ajax({url:BASE_URL+"reseller/service/cardchage_cms",method:"GET",dataType:"json",async:!0,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/cardchage_cms_del";
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
function ClosesaveEdit(){
	$("#keys_edit").val('');
	$(".edit-status").removeClass('in');
	$(".edit-status").toggle();
}
function edit_ask(e){
	$("#keys_edit").val(e);
	$(".edit-status").addClass('in');
	$(".edit-status").toggle();
	// $("#card_details").toggle();
	
}
function saveEdit(){
	var e = $("#keys_edit").val();
	var x = $("#status_edit").val();
	var f = "reseller/service/cardchage_cms_edit";
	var p = {csrf_hk_token:token_csrf,e:e,x:x};
	var q = confirm('bạn có muốn thay đổi không');
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
		var action_remove = '<a 	title="Trash " class="btn btn-small btn-danger" onclick="Delete_transaction(\'' + v.id + '\')"><i class="fa fa-trash"></i></a>';
		var statusx = '<a 	title="Status" class="btn btn-small btn-danger" onclick="edit_ask(\'' + v.id + '\')"><span>'+v.status+'</span></a>';
		var no = k;	
		var px = { 
			'no':no,
			'rose':v.rose,
			'deduct':v.deduct,
			'card_type':v.card_type,
			'name':v.name,
			'type_id':v.type_id,
			'title':v.title,
			'status':statusx,
			'action_remove':action_remove,
		};
		p.push(px);
	});
	TableResolver(p);
}
function cardtype(e){
	if(e==='5b916fc9f40e2ef99b80878c'){
		return "Phone Card"
	}
	if(e==='5b916fabf40e2ef99b80878b'){
		return "Game Card"
	}
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,7 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,7 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [  0,1,2,3,4,5,7  ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [  0,1,2,3,4,5,7 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			// {"data": 'no',"visible": false},
			{"data": 'rose'},
			{"data": 'deduct'},
			{"data": 'card_type'},
			{"data": 'name'},
			{"data": 'type_id',"render":cardtype},
			{"data": 'title'},
			{"data": 'status'},
			{"data": 'action_remove'}
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 // $(api.column(2).footer()).html( price_convert(api.column(2).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
					 // $(api.column(3).footer()).html( price_convert(api.column(3).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
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