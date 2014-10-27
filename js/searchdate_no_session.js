$(document).ready(function(){
$("#searchdate").click(function() {
		var from = $("#startdate").val();
		var to = $("#enddate").val();
		$.get("php/searchdate_no_session.php?action=searchdate&from="+from+"&to="+to,function(data,status) {
		$("#slist").html('');
		$("#all_researches").hide();
		var d;
		eval("d="+data);
		$('#slist').append(  '<table border="1" />' );
		$('#slist table').append(  '<tr><th>Serial no.</th><th>Name of research</th><th>Contact Information</th><th>Description</th><th>Eligibility</th><th>From Date</th><th>To Date</th><th>Length</th><th>Payment Mode</th><th>Payment Amount</th><th>Search Keywords</th></tr>' );
		for (var i=0; i < d.length; i++) {
		    var content = "<tr><td>"+(i+1)+"</td><td>"+d[i].name+"</td><td>"+d[i].contact_info+"</td><td>"+d[i].description+"</td><td>"+d[i].eligibility+"</td><td>"+d[i].from_date+"</td><td>"+d[i].to_date+"</td><td>"+d[i].length+"</td><td>"+d[i].payment+"</td><td>"+"$"+d[i].payment_amount+"</td><td>"+d[i].keywords+"</td>"
		    content+= '</tr>';
		    $("#slist table").append(content);
	    	}
	});
});
});