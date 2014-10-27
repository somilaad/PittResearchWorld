$(document).ready(function(){
	$("#logout").click(function() {
	$.get("php/logout.php?action=logout",function(data,status){
		if(data=="logged out")	
			location.assign("index.html");
	});
    });
});


