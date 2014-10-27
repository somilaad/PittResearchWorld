$(document).ready(function(){
	$.get("php/interested_researches.php?action=showdata",function(data,status){
	var d;
	eval("d="+data);
	$('#interested').append('<tr><th>Serial no.</th><th>Name of research</th><th>Contact Info</th><th>Description</th><th>From</th><th>To</th><th>Length in minutes</th><th>Payment</th><th>Amount in $</th><th>Keywords</th><th>Contact Researcher</th></tr>');
	for (var i=0; i < d.length; i++) {
	    var list = "<tr id="+d[i].name+"><td>"+(i+1)+"</td><td>"+d[i].name+"</td><td>"+d[i].contact_info+"</td><td width='35%'>"+d[i].description+"</td><td>"+d[i].from_date+"</td><td>"+d[i].to_date+"</td><td>"+d[i].length+"</td><td>"+d[i].payment+"</td><td>"+d[i].payment_amount+"</td><td>"+d[i].keywords+"</td>"
	    list+= '<td><input type="button" value="Contact '+d[i].contact_info+'" class="ctn" id="'+d[i].email+'" /></td>';
	    list+= '</tr>';
	    $("#interested").append(list);
	     }
	    $(".ctn").click(function(){
		location.assign("contactresearcher.html");
			$.get("php/contactresearcher.php?action=savemail&remail="+this.id,function(data) {
			alert(data);
			});
		});
	});
});