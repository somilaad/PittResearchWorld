$(document).ready(function(){
	$("#login").click(function() {
	var email = $("#mail").val();
	var passwd = $("#pwd").val();
	$("#invalid").html('');
	$.post("php/check_login.php", {uemail: email, upasswd: passwd}, function(data){
		if(data=="researcher") {
			location.assign("r_list_researches.html");
		}
		else if(data=="participant") {
			location.assign("p_all_researches.html");
		}
		else {
			$("#invalid").append("Sorry, wrong username and/or password. Please try to login again..<br><br>");
		}
	});
    });
});


