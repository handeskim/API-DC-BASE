$(document).ready(function(){
	var p={sd:DateMunisDefault(3),ed:DateMunisDefault(0)};Resolver(p),$("#selection_days").change(function(){var e=$("#selection_days").val();if(1==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(0),ed:DateMunisDefault(0)},Resolver(p)),2==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(7),ed:DateMunisDefault(0)},Resolver(p)),3==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(15),ed:DateMunisDefault(0)},Resolver(p)),4==e&&($(".DateSeletor").css("display","none"),p={sd:DateMunisDefault(30),ed:DateMunisDefault(0)},Resolver(p)),5==e){var a=dateDefault()+" 00:00:00",t=dateDefault()+" 23:59:59";$("#date_start").datetimepicker({defaultDate:a,format:"DD-MM-YYYY HH:mm:ss"}),$("#date_end").datetimepicker({defaultDate:t,format:"DD-MM-YYYY HH:mm:ss"}),$(".DateSeletor").toggle(),$("#Search").click(function(){$("#LoaddingCharAnalyticsx").css("display","block");var e=$("#date_start").val(),a=$("#date_end").val();Resolver({sd:e,ed:a})})}});
	
});

function Resolver(e){$("#LoadAjax").css("display","block"),$.ajax({url:BASE_URL+"reseller/service/revenue_cms",method:"GET",dataType:"json",async:!0,data:e,success:function(e){$("#LoadAjax").css("display","none"),1==e.status&&TempResolver(e.data)}})}

function TempResolver(e){
	var p = [];
		var px = { 
			'card_total':e.card_total,
			'card_transfer':e.card_transfer,
			'exchange_card_rate':e.exchange_card_rate,
			'cart_total':e.cart_total,
			'cart_transfer':e.cart_transfer,
			'exchange_rate':e.exchange_rate,
			'fee':e.fee,
			'total_revenue':e.total_revenue,
		};
		p.push(px);
	TableResolver(p);
}
function render_levels(e){
	if(e != null || e != undefined){
		if(e===1){ return  "Thường";}
		else if(e===2){ return  "VIP";}
		else{ return e;}
	}else{
		return e;
	}
}
function TableResolver(e){
	var table = $('#TableSLData').DataTable({
		"dom": 'Blfrtip',
		 "buttons": [ 
			{ extend: 'copy', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'csv', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'excel', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } },
			{ extend: 'pdf', 'footer': false, exportOptions: { columns: [ 0,1,2,3,4,5,6,7 ] } }
			],
		"destroy": true,
		"async": true,
		"order": [[ 1, "desc" ]],
		"data": e,
		"columns": [
			{"data": 'card_total','render':price_convert},
			{"data": 'card_transfer','render':price_convert},
			{"data": 'exchange_card_rate','render':price_convert},
			{"data": 'cart_total','render':price_convert},
			{"data": 'cart_transfer','render':price_convert},
			{"data": 'exchange_rate','render':price_convert},
			{"data": 'fee','render':price_convert},
			{"data": 'total_revenue','render':price_convert},
			],
			"fnRowCallback": function (nRow, aData, iDisplayIndex) {
					nRow.id = aData.id;
					return nRow;
			},
			"footerCallback": function (  tfoot, data, start, end, display ) {
					var api = this.api(), data;
					 // $(api.column(5).footer()).html( price_convert(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)));
				
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