$(document).ready(function(){
	$("#header_login").click(function(){$("#login-chiaki").toggle();});
	$("#RecoverPass").click(function(){$(".forget-pass").toggle();});
	$(".ppx_account").click(function(){$(".sub_profile_info").toggle();});
	$(".ppx_balancer").click(function(){$(".sub_profile_banlancer").toggle();});
	$(".ppx_collaborators").click(function(){$(".sub_profile_collaborators").toggle();});
	$(".ppx_revenue").click(function(){$(".sub_profile_revenue").toggle();});
	$(".ppx_cart").click(function(){$(".sub_profile_cart").toggle();});
	$(".close_fogotpass").click(function(){$(".forget-pass").toggle();});
	$(".fa_expand_profile_bar").click(function(){
			$("#profile_left").toggle();
			$("#profile_left_support").toggle();
	});
	
});
