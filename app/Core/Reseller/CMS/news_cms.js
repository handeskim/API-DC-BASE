$(document).ready(function(){
	var p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/news_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}
function Delete_transaction(e){
	var f = "reseller/service/news_cms_del";
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
function addConfim(){
	var f = "api/AddNews";
	var p =  $("form#AddNewsFRM").serialize();
	var q = confirm('bạn có đăng tin không');
	if(q==true){
		var r = PFactory_Providers(f,p);
		alert(r.result);
		if(r.status==true){
			window.location.reload();
		}
	}
}
function info_ask(e){
	LFactory_load('reseller/news/info/'+e);
}
function add_news(e){
	LFactory_load('reseller/news/add');
}
function TempResolver(e){
	var p = [];
	$.each(e, function(k, v) {
		var no = k;
		var action_info = '<a 	title="Details" class="btn btn-small btn-info" onclick="info_ask(\'' + v.id + '\')"><i class="fa fa-info-circle"></i></a>';	
		var action_remove = '<a 	title="Remove" class="btn btn-small btn-danger" onclick="Delete_transaction(\'' + v.id + '\')"><i class="fa fa-trash"></i></a>';	
		var img = images_render(v.images,50,50,'px');
		var px = { 
			'no':no,
			'date_create':v.date_create,
			'images':img,
			'title':v.title,
			'alias':v.alias,
			'categories':v.categories,
			'keywords':v.keywords,
			'description':v.description,
			'description_seo':v.description_seo,
			'title_seo':v.title_seo,
			'contents':v.contents,
			'time_create':v.time_create,
			'action_remove':action_remove,
			'action_info':action_info,
		};
		p.push(px);
	});
	TableResolver(p);
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 1,2,3,4 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [1,2,3,4 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 1,2,3,4 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 1,2,3,4  ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'no'},
			{"data": 'date_create'},
			{"data": 'images'},
			{"data": 'categories'},
			{"data": 'title'},
			{"data": 'description'},
			{"data": 'action_remove'},
			{"data": 'action_info'}
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