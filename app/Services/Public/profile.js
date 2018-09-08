$(document).ready(function(){
		var url = BASE_URL+'profile/default_profile';
		var site_load = $("#site_load").val();
		if(site_load==1){
			LFactory_load('.main-profile',url);
		}
		$('.edit_profile').click(function(){
				
				url = BASE_URL+'profile/edit_profile';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".edit_profile").addClass('active');
				
		});
		$('.default_profile').click(function(){
				url = BASE_URL+'profile/default_profile';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".default_profile_cate").addClass('active');
		});
		$('.edit_profile_bank').click(function(){
				url = BASE_URL+'profile/bank_info';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".edit_profile_bank").addClass('active');
				
		});	
		$('.unlock_password').click(function(){
				url = BASE_URL+'profile/unlock_password';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".unlock_password").addClass('active');
				
		});$('.unlock_auth').click(function(){
				url = BASE_URL+'profile/unlock_auth';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".unlock_auth").addClass('active');
				
		});
		
		$('.forgot_auth').click(function(){
				url = BASE_URL+'profile/forgot_auth';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".forgot_auth").addClass('active');
				
		});
		$('.connectdevelop').click(function(){
				url = BASE_URL+'profile/developers';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".connectdevelop").addClass('active');
				
		});	
		$('.connectdeveloper').click(function(){
				url = BASE_URL+'profile/developers';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".connectdevelop").addClass('active');
				
		});
		$('.balancer_transfer').click(function(){
				url = BASE_URL+'profile/balancer_transfer';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".balancer_transfer").addClass('active');
				
		});
		$('.history_balancer').click(function(){
				url = BASE_URL+'profile/history_balancer';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".history_balancer").addClass('active');
				
		});	
		$('.withdrawal').click(function(){
				url = BASE_URL+'profile/withdrawal';
				LFactory_load('.main-profile',url);
				load_active_tab();
				$(".withdrawal").addClass('active');
				
		});
});

function load_active_tab(){
	$(".profile_left").each(function(){
			$(this).find('.active').removeClass('active');
	});
}
