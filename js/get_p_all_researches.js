$(document).ready(function(){
	$.get("php/get_p_all_researches.php?action=getdata",function(data,status){
	var d;
	eval("d="+data);
	$('#p_list').append(  '<table border="1" />' );
	$('#p_list table').append(  '<tr><th>Serial no.</th><th>Name of research</th><th>Contact Information</th><th>Description</th><th>Eligibility</th><th>From Date</th><th>To Date</th><th>Length</th><th>Payment Mode</th><th>Payment Amount</th><th>Search Keywords</th><th></th><th></th></tr>' );
	for (var i=0; i < d.length; i++) {
	    var content = "<tr><td>"+(i+1)+"</td><td>"+d[i].name+"</td><td>"+d[i].contact_info+"</td><td>"+d[i].description+"</td><td>"+d[i].eligibility+"</td><td>"+d[i].from_date+"</td><td>"+d[i].to_date+"</td><td>"+d[i].length+"</td><td>"+d[i].payment+"</td><td>"+"$"+d[i].payment_amount+"</td><td>"+d[i].keywords+"</td>"
	    content+= '<td><input type="button" value="Show Interest" class="btn" id="'+d[i].name+'" /></td>';
	    content+= '<td><input type="button" value="Subscribe" class="rs" id="'+d[i].name+'" />';
	    content+= '</td></tr>';
	    $("#p_list table").append(content);
	}
	$(".btn").click(function() {
    		$.get("php/get_p_all_researches.php?action=savedata&research_name="+this.id,function(data,status){
				alert("The researcher has been notified about your interest and will get back to you. Your consideration of the research is greatly appreciated!");
				location.assign("p_all_researches.html");
		});
        });
	$(".rs").click(function(){
				window.open("php/subscribe.php?id="+this.id);
	});
    });
	$("#p_skeywords").keyup(function() {
	var srchkeyw = $("#p_skeywords").val();
	$.get("php/get_p_all_researches.php?action=searchdata&srchkeyw="+srchkeyw,function(data,status) {
		$("#p_slist").html('');
		$("#p_all_researches").hide();
		var d;
		eval("d="+data);
		$('#p_slist').append(  '<table border="1" />' );
		$('#p_slist table').append(  '<tr><th>Serial no.</th><th>Name of research</th><th>Contact Information</th><th>Description</th><th>Eligibility</th><th>From Date</th><th>To Date</th><th>Length</th><th>Payment Mode</th><th>Payment Amount</th><th>Search Keywords</th><th></th><th></th></tr>' );
		for (var i=0; i < d.length; i++) {
		    var content = "<tr><td>"+(i+1)+"</td><td>"+d[i].name+"</td><td>"+d[i].contact_info+"</td><td>"+d[i].description+"</td><td>"+d[i].eligibility+"</td><td>"+d[i].from_date+"</td><td>"+d[i].to_date+"</td><td>"+d[i].length+"</td><td>"+d[i].payment+"</td><td>"+"$"+d[i].payment_amount+"</td><td>"+d[i].keywords+"</td>"
		    content+= '<td><input type="button" value="Show Interest" class="btn" id="'+d[i].name+'" /></td>';
		    content+= '<td><input type="button" value="Subscribe" class="rs" id="'+d[i].name+'" /></td>';
		    content+= '</tr>';
		    $("#p_slist table").append(content);
	    	}
		$(".btn").click(function() {
    		$.get("php/get_p_all_researches.php?action=savedata&research_name="+this.id,function(data,status){
			alert("The researcher has been notified about your interest and will get back to you. Your consideration of the research is greatly appreciated!");
				location.assign("p_all_researches.html");
		});
        	});
		$(".rs").click(function(){
			window.open('php/subscribe.php?id='+this.id);
		});
	});
    });
});


