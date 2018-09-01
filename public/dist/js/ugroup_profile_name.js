$(document).ready(function(){
	$("input").attr("disabled", true); $("select").attr("disabled", true); 
	$("#btn_edit_back").hide();
	$("#a_back_home").show();
	$("#birthdayView").show();
	$("#birthdayEdit").hide();
	$("#btn_update_prosesser").hide();
	$("#btn_edit").click(function(){ 
		$("input").attr("disabled", false); $("select").attr("disabled", false); 
		$("#birthdayView").hide();
		$("#a_back_home").hide();
		$("#btn_edit").hide();
		$("#btn_update_prosesser").show();
		$("#btn_edit_back").show();
		$("#birthdayEdit").show();
	});
	$("#btn_edit_back").click(function(){ 
		$("input").attr("disabled", true); $("select").attr("disabled", true); 
		$("#birthdayView").show();
		$("#a_back_home").show();
		$("#btn_edit").show();
		$("#btn_update_prosesser").hide();
		$("#btn_edit_back").hide();
		$("#birthdayEdit").hide();
	});
	$("#btn_update_prosesser").click(function(){
		$("#from_profle").hide();
	});
});