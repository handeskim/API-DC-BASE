$(document).ready(function(){
	var protocol = location.protocol;
	var slashes = protocol.concat("//");
	var host = slashes.concat(window.location.hostname);
	CKEDITOR.replace('contents', {
		filebrowserImageBrowseUrl : host+'/kcfinder/browse.php?type=images&dir='+host+'public/images',
	});
	var c = $("#categories").val();
	ask_sections(c);
	$("input#title").focusout(function(){
		var s = $("#title").val();
		tempSlug(s);
	});
});

function tempSlug(e){
	$("#alias").empty();
	var p = {c:e,csrf_asterisk_name:token_csrf,};
	$.ajax({
	   type: "GET",
	   url: BASE_URL+"api/ServicesSlugBlogs",
	   data: p,
	   success: function (r) {
		if(r) {
			if(r.status==true){
					$("#title_seo").val(e);
					$("#alias").val(r.result);
				}
			}
	   },
   });

}
/////////////////////////////////
function removeImages(i) {
	$("#images_primary"+i).empty();
}
function ask_sections(e){
	$("#Sections").empty();
	var p = {c:e,csrf_asterisk_name:token_csrf,};
	$.ajax({
	   type: "GET",
	   url: BASE_URL+"cms/services/ServicesCategoriesSectionsContents",
	   data: p,
	   success: function (r) {
		if(r) {
			if(r.status==true){
				
				tempSections(r.data);
				
			}
		}
		
	   },
   });
}
function tempSections(p){
 $("#Sections").empty();
	var tempDID = '<select id="ask_sections" name="sections" class="form-control" required="">';
	$.each(p, function(i,s){
		if(s.primary==0){
			tempDID +='<option value="'+s.id+'">'+s.title+'</option>';
		}else{
			tempDID +='<option value="'+s.id+'">---'+s.title+'</option>';
		}
	});	
	tempDID +='</select>';
	$("#Sections").append(tempDID);
}
/////////////////////////
function ImagesPrimary(e){
	 window.KCFinder = {
        callBackMultiple: function(files) {
            window.KCFinder = null;
            var value = "";
            for (var i = 0; i < files.length; i++){
				 value += BASE_URL+files[0];
			}  
			var temp ='<input value="'+value+'" name="images" type="hidden">';
			temp +='<img src="'+value+'" style="width: 100px;height: auto;margin-top: 10px;text-align: center;">';
			temp +='<button class="btn btn-danger" style="float:  left;margin-top: 10px;margin-right: 10px;" type="button" onclick="return removeImages('+e+');"> <i class="fa fa-trash-o"> </i> </button>';
			$("#images_primary"+e).empty();
			$("#images_primary"+e).append(temp);
        }
    };
    window.open('/kcfinder/browse.php?type=images&dir=images',
        'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
