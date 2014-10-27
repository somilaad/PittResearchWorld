$(document).ready(function(){
	$("#signup").click(function() {
	var role = ( jQuery( 'input[name=role]:checked' ).val() );
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var email = $("#email").val();
	var password = $("#pwd").val();
	$("#invalid").html('');
	function validateEmail($email) {
	  		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 	 		if( !emailReg.test( $email ) ) { return false;} else { return true;}
	 }
	 if (role == null && role == undefined)   $("#invalid").append("Please select a role<br>");
   	 if ($("#fname").val().length === 0)	$("#invalid").append("Please enter your first name<br>");
	 if ($("#lname").val().length === 0)	$("#invalid").append("Plase enter your last name<br>");
	 if ($("#email").val().length === 0)	$("#invalid").append("Plase enter an email address<br>");
	 if (!validateEmail(email))               $("#invalid").append("Please enter a valid email address<br>");
	 if ($("#pwd").val().length < 5)          $("#invalid").append("Plase enter a valid password of length more than 5 characters<br>");
	 else {
	$.post("php/signup.php", {role: role, fname:fname, lname:lname, email:email, password: password}, function(data){
		if(data=="researcher") {
			location.assign("r_list_researches.html");
		}
		else if(data=="participant") {
			location.assign("p_all_researches.html");
		}
		else if(data=="error") {
			$("#invalid").append("Sorry this username already exists in our database. Please try again with another valid email address");
		}
		else {
			alert(data);
		}
	});
	}
    });
});


