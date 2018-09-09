$(document).ready(function(){
	$("#header_login").click(function(){$("#login-chiaki").toggle();});
	$("#RecoverPass").click(function(){$(".forget-pass").toggle();});
	$(".sub_profile_developer").css('display','none');
	$(".ppx_account").click(function(){
			$(".sub_profile_info").toggle();
			$(".sub_profile_banlancer").css('display','none');
			$(".sub_profile_collaborators").css('display','none');
			$(".sub_profile_revenue").css('display','none');
			$(".sub_profile_cart").css('display','none');
			$(".sub_profile_developer").css('display','none');
		});
	$(".ppx_balancer").click(function(){
			$(".sub_profile_banlancer").toggle();
			$(".sub_profile_info").css('display','none');
			$(".sub_profile_collaborators").css('display','none');
			$(".sub_profile_revenue").css('display','none');
			$(".sub_profile_cart").css('display','none');
			$(".sub_profile_developer").css('display','none');
		});
	$(".ppx_collaborators").click(function(){
			$(".sub_profile_collaborators").toggle();
			$(".sub_profile_info").css('display','none');
			$(".sub_profile_banlancer").css('display','none');
			$(".sub_profile_revenue").css('display','none');
			$(".sub_profile_cart").css('display','none');
			$(".sub_profile_developer").css('display','none');
		});
	$(".ppx_revenue").click(function(){
			$(".sub_profile_revenue").toggle();
			$(".sub_profile_info").css('display','none');
			$(".sub_profile_banlancer").css('display','none');
			$(".sub_profile_collaborators").css('display','none');
			$(".sub_profile_cart").css('display','none');
			$(".sub_profile_developer").css('display','none');
		});
	$(".ppx_cart").click(function(){
			$(".sub_profile_cart").toggle();
			$(".sub_profile_info").css('display','none');
			$(".sub_profile_banlancer").css('display','none');
			$(".sub_profile_collaborators").css('display','none');
			$(".sub_profile_revenue").css('display','none');
			$(".sub_profile_developer").css('display','none');
		});
	$(".ppx_developer").click(function(){
			$(".sub_profile_developer").toggle();
			$(".sub_profile_cart").css('display','none');
			$(".sub_profile_info").css('display','none');
			$(".sub_profile_banlancer").css('display','none');
			$(".sub_profile_collaborators").css('display','none');
			$(".sub_profile_revenue").css('display','none');
		});
	$(".close_fogotpass").click(function(){$(".forget-pass").toggle();});
	$(".fa_expand_profile_bar").click(function(){
			$("#profile_left").toggle();
			$("#profile_left_support").toggle();
	});
	init_apps();
	$('[data-toggle="tooltip"]').tooltip();
	var popup_sesion =  pi($("#notify_popup").val());
	if(popup_sesion === 1001){
		$("#modal-notify-popup").modal('hide');
	}else{
		Notification_popup(popup_sesion);
	}
});

function init_apps(){
	init_client_balancer();
	setInterval(init_client_balancer, 10000);
}
function init_client_balancer(){
	var f = 'api/balancer';
	var p = {csrf_asterisk_name:token_csrf};
	var r = GFactory_Providers(f,p);
	if(r.status==true){
		var b = r.result;
		if(b != null || b != NaN || b != undefined){
			b = price_convert(b);
		}else{
			b = 0;
		}
		factory_append_blank('.balancer',b);
		factory_append_blank('.balancer_profile',b);
	}
}
