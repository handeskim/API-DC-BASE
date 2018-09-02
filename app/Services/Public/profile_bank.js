$(document).ready(function(){
		var url = BASE_URL+'profile/default_profile';
		$("#bank_option_a").change(function(){
				var t = $("#bank_option_a").val();
				var f = "api/bank_option";
				var e = {t:t};
				var r = GFactory_Providers(f,e);
				if(r.result != null || r.result != undefined){ temp_bank_option(r.result);}
				$("#bank_name").change(function(){
					var t = $("#bank_name").val();
					var name_bank = $("#bank_id_"+t).text();
					$(".bank_name_select").empty();
					var tem_name_bank = '<input type="hidden"  value="'+name_bank+'" name="bank_name">';
					$(".bank_name_select").append(tem_name_bank);
				});
		});
		$(".open_expand_bank").click(function(){ $(".tab_add_bank").toggle();});
		$(".close_expand_bank").click(function(){ $(".tab_add_bank").toggle();});
});
function temp_bank_option(e){
	$("#bank_name_add").empty();
	var temp = '<select class="form-control" id="bank_name" name="bank_id" >';
	temp +='<option  > Chọn ngân hàng </option>';
	$.each(e, function(k, v) {
			temp +='<option id="bank_id_'+v.bank_id+'" value="'+v.bank_id+'" > '+v.name+' </option>';
	});
	temp += '</select>';
	$("#bank_name_add").append(temp);
}
function bank_empty(e){
	var f = "api/bank";
	var p = {t:e};
	var q = confirm("bạn có muốn xóa ngân hàng không");
	if(q==true){
		var r = GFactory_Providers(f,p);
		window.location.reload(true);
	}
	
	
}