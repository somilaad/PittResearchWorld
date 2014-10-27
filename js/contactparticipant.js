$(document).ready(function(){
		$("#contactParticipant").click(function() {
		var name = $("#rname").val();
		var message = $("#rmsg").val();
		$.get("php/contactparticipant.php?action=sendmail&rname="+name+"&rmessage="+message,function(data) {
			alert(data);
			location.assign("r_list_researches.html");
		});
	});
});