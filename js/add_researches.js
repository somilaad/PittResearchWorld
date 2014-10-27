$(document).ready(function(){
	$("#rcreate").click(function() {
	var rname = $("#rname").val();
	var cinfo = $("#cinfo").val();
	var description = $("#description").val();
	var eligibility = $("#eligibility").val();
	var fdate = $("#fdate").val();
	var tdate = $("#tdate").val();
	var length = $("#length").val();
	var pay_mode = $("#pay_mode").val();
	var payamount = $("#payamount").val();
	var keyword = $("#keyword").val();
	$.post("php/add_researches.php", {add_rname: rname, add_cinfo: cinfo, add_description: description, add_eligibility: eligibility, add_fdate: fdate, add_tdate: tdate, add_length: length, add_pay_mode: pay_mode, add_payamount: payamount, add_keyword: keyword}
	);
	$('#radded').append('Your research has been posted successfully!');
	$('#formdata').hide();
	$('#radded').show();
    });
});


