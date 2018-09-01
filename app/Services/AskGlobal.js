function randomIntFromInterval(e){
	if(e < 5){var min = 0;var max = 0;
	}else if(e > 10 ){var min = 3;var max = 5;
	}else if(e > 10){var min = 3;var max = 5;
	}else if(e > 50){var min = 2;var max = 5;
	}else if(e > 100){var min = 3;var max = 5;
	}else{var min = 4;var max = 5;} var r = Math.floor(Math.random()*(max-min+1)+min);return r;
}
function price_convert(p){
	var pc = parseInt(p).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
	return pc ;
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
