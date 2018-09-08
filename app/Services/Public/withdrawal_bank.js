$(document).ready(function(){
	init_withdraw_bank();
	$("#bank_id").change(function(){
		var b = $("#bank_id").val();
		init_bank_detals(b);
	});
});
function init_withdraw_bank(){
	var f = 'api/bank_withdrawal';
	var p = {csrf_asterisk_name:token_csrf};
	var r = GFactory_Providers(f,p);
	if(r.status==true){
			temp_bank_init(r.result);
	}
}
function init_bank_detals(e){
	var f = 'api/bank_withdrawal_info';
	var p = {csrf_asterisk_name:token_csrf,'bank_id':e};
	var r = GFactory_Providers(f,p);
	if(r.status==true){
			var ipt = '';
			$.each(r.result, function(k, v) {
				ipt += '<input type="hidden" value="'+v.bank_name+'" name="bank_name">';
				ipt += '<input type="hidden" value="'+v.account_holders+'" name="account_holders">';
				ipt += '<input type="hidden" value="'+v.bank_account+'" name="bank_account">';
				ipt += '<input type="hidden" value="'+v.branch_bank+'" name="branch_bank">';
				ipt += '<input type="hidden" value="'+v.provinces_bank+'" name="provinces_bank">';
			});
			$("#bank_details").empty();
			$("#bank_details").append(ipt);
	}
}
function temp_bank_init(e){
	if(e != null || e != undefined){
		var temp = '<select class="form-control" id="bank_id" name="bank_id">';
		temp +='<option >Chọn tài khoản ngân hàng</option>';
		$.each(e, function(k, v) {
			temp +='<option value='+v.id+'> '+v.account_holders+' | '+v.bank_account+' | '+v.bank_name+'</option>';
		});
		temp +='<select>';
		$("#bank_option").empty();
		$("#bank_option").append(temp);
		
	}
	
}