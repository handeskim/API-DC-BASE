$(document).ready(function(){
	$( "#btn_Owner" ).click(function() { $('#fromContact_Owner').toggle(function(){$('#fromContact_Admin').hide(); $('#fromContact_Technical').hide(); $('#fromContact_Billing').hide(); $('#fromContact_Manager').hide(); }) });
	$( "#btn_Admin" ).click(function() { $('#fromContact_Admin').toggle(function(){ $('#fromContact_Owner').hide(); $('#fromContact_Technical').hide(); $('#fromContact_Billing').hide(); $('#fromContact_Manager').hide(); }) });
	$( "#btn_Technical" ).click(function() { $('#fromContact_Technical').toggle(function(){ $('#fromContact_Admin').hide(); $('#fromContact_Owner').hide(); $('#fromContact_Billing').hide(); $('#fromContact_Manager').hide(); }) });
	$( "#btn_Billing" ).click(function() { $('#fromContact_Billing').toggle(function(){ $('#fromContact_Admin').hide(); $('#fromContact_Technical').hide(); $('#fromContact_Owner').hide(); $('#fromContact_Manager').hide(); }) });
	$( "#btn_Manager" ).click(function() { $('#fromContact_Manager').toggle(function(){ $('#fromContact_Admin').hide(); $('#fromContact_Technical').hide(); $('#fromContact_Billing').hide(); $('#fromContact_Owner').hide(); }) });
	
	$("#BtnFmInsert_Owner").click(function(){ var e = $('#frm_contact_primary_Owner').serialize(); common_contact_install(e) });
	$("#BtnFmInsert_Admin").click(function(){ var e = $('#frm_contact_primary_Admin').serialize(); common_contact_install(e) });
	$("#BtnFmInsert_Billing").click(function(){ var e = $('#frm_contact_primary_Billing').serialize(); common_contact_install(e) });
	$("#BtnFmInsert_Technical").click(function(){ var e = $('#frm_contact_primary_Technical').serialize(); common_contact_install(e) });
	$("#BtnFmInsert_Manager").click(function(){ var e = $('#frm_contact_primary_Manager').serialize(); common_contact_install(e) });
	function common_contact_install(e){ 
			$(".ivalabel").css('display','block');
			$.post(url_global+"contact/common_contact_primary", e) .done(function(respone){
					$(".ivalabel").css('display','none');
					alert(respone); 
					setTimeout(function(){window.location.reload(1); },300);  } ); }
		
	
});

