$(document).ready(function(){
		$("#contactResearcher").click(function() {
		var name = $("#pname").val();
		var message = $("#pmsg").val();
		$.get("php/contactresearcher.php?action=sendmail&pname="+name+"&pmessage="+message,function(data) {
			alert(data);
			location.assign("p_my_researches.html");
			});
	});
});