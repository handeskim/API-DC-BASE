function DateMunisDefault(t){e=new Date,d=new Date(e.setDate(e.getDate()-t));var a=d.getDate(),n=d.getMonth()+1,D=d.getFullYear();return n<10&&(n="0"+n),a<10&&(a="0"+a),D+"-"+n+"-"+a}

function randomIntFromInterval(e){
	if(e < 5){var min = 0;var max = 0;
	}else if(e > 10 ){var min = 3;var max = 5;
	}else if(e > 10){var min = 3;var max = 5;
	}else if(e > 50){var min = 2;var max = 5;
	}else if(e > 100){var min = 3;var max = 5;
	}else{var min = 4;var max = 5;} var r = Math.floor(Math.random()*(max-min+1)+min);return r;
}
function LFactoryDetails_load(f){
	  $("#LoadAjax").css('display','block');
		$('.main-profile-body-load').empty();
		$('.main-profile-body-load').css('display','none');
		$('.main-profile-body-load-default').css('display','none');
		$('.main-profile-body-load').load(BASE_URL+f,function(){ 
			 $("#LoadAjax").css('display','none');
			 $('.main-profile-body-load').css('display','block');
		});
}
function CFactory_load(){
	$('.main-profile-body-load').empty();
	$('.main-profile-body-load').css('display','none');
	$('.main-profile-body-load-default').css('display','block');
}
function date_start_default(){
	return dateDefault();
	
}
function date_end_default(){
	return dateDefault();
}
function dateDefault(){
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;
	var today = year + "-" + month + "-" + day;    
	return today;
}
function price_convert(p){
	var pc = parseInt(p).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	return pc ;
}
function transaction_status(e){
	if(e==='done'){ return '<span class="label bg-green">'+e+'</span>';}
	else if(e==='hold'){ return '<span class="label bg-red">'+e+'</span>';}
	else if(e==='cancel'){ return '<span class="label bg-blue">'+e+'</span>';}
	else{ return '<span class="label bg-black">'+e+'</span>'; }
}
function transfer_action(e) {
    if(e === 'minus'){ return "Chuyển"; }
		else if(e === 'plus'){ return "Nhận"; }
		else { return "Unknown"; }
}
function getSum(total, num) {
    return total + num;
}
function sum_array(e){
	return e.reduce(function(a, b) { return parseInt(a, 10) + parseInt(b, 10);});
}
function quantity_convert(e){
	
	if(parseInt(e)==0){
		return "hết hàng";
	}else if(parseInt(e)==1){
		return price_convert(e);
	}else{
		return price_convert(e);
	}
}
function status_convert(e){
	if(e==1){
		return "Hoạt động";
	}else if(e==2){
		return "Đã Ngưng";
	}else if(e==3){
		return "Hết Sản Phẩm";
	}else if(e==0){
		return "Không";
	}else{
		return "Unknown"
	}
}
function pi(e){
	return parseInt(e);
}

function data_load_src(){
	$("img[data-src]").each(function() {
		var ix = $(this).attr("data-src");
		var img = $(this).attr("src",ix);
	});
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function factory_append_blank(elements,e){
	$(elements).empty();
	$(elements).append(e);
}
function factory_append(elements,e){
	$(elements).append(e);
}
function factory_toggle(elements,e){
	$(elements).click(function(){$(e).toggle();});
}
function factory_show(btn,e,x){
	$(btn).click(function(){
		$(e).toggle();
		$(x).toggle();
	});
}
function TFactory_LoadScroll(el,f,t,x){
	$(window).scroll(function () {
		var s = $(this).scrollTop();
		if(s >= x){
			var e = $(el).val();
			var t = 100;
			if(e==0){
				TFactory_Providers(f,t);
				$(el).val(1);
			}
		}
	});
}
function LFactory_load(elements,url){
	  $(".LoaddingCharAnalytics").css('display','block');
		$(elements).empty();
		$(elements).css('display','none');
		$(elements).load(url,function(){ 
			 $(".LoaddingCharAnalytics").css('display','none');
			 $(elements).css('display','block');
		});
		
}
function disable_header_notify_popup(){
	var e = null;
	var f = 'api/disable_notify_popup';
	var r = GFactory_Providers(f,e);
	// console.log(r);
	if(r.status==true){
		$("#modal-notify-popup").modal('hide');
	}
}
function Notification_popup(e){
	var f = 'api/notify_popup';
	var p = {e:e};
	var r = GFactory_Providers(f,p);
	if(r.status==true){
		if(r.data.title != null || r.data.title != undefined){
			$(".header-notify-popup").empty();
			$(".header-notify-popup").append(r.data.title);
		}
		if(r.data.description != null || r.data.description != undefined){
			$(".body-notify-popup").empty();
			$(".body-notify-popup").append(r.data.description);
		}
		$("#modal-notify-popup").modal('show');
	}else{
			$("#modal-notify-popup").modal('hide');
	}
}
function TFactory_Load(elements,f,t){
	var e = $(elements).val();
	if(t==null || t=='undefined'){ var t = 100; }
	if(e==0){TFactory_Providers(f,t);}
}
function TFactory_discount(e,o){
	return Math.ceil((((parseInt(o) - parseInt(e))/parseInt(o))*100));
}

function TFactory_Providers(f,e){
	setTimeout(f,e);
}

function GFactory_Providers(f,e){
	var res;
	$.ajax({
		type: "GET",url:BASE_URL+f,data:e,async:false,
		success: function (r) { res=r;}
	});
	return res;
}
function PFactory_Providers(f,e){
	var res;
	$.ajax({
		type: "POST",url:BASE_URL+f,data: e,async:false,
		success: function (r) { res = r; }
	});
	return res;
}
