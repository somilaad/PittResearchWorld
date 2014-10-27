$(document).ready(function(){
    $.get("php/get_research_list.php?action=getdata",function(data,status){
	var d;
	eval("d="+data);
	$('#list').append('<tr><th>Serial no.</th><th>Name of research</th><th>View interested participants</th><th>Edit Research</th><th>Delete Research</th></tr>');
	for (var i=0; i < d.length; i++) {
	    var content = "<tr id="+d[i].name+"><td>"+(i+1)+"</td><td>"+d[i].name+"</td>";
	    content+= '<td><input type="button" value="View Participants" id="'+d[i].name+'" class="btn2" /></td>';
	    content+= '<td><input type="button" value="View or Edit" id="'+d[i].name+'" class="btn1" /></td>';
	    content+= '<td><input type="button" value="Delete" class="btn" id="'+d[i].name+'" /></td>';
	    content+= '</tr>';
	    $("#list").append(content);
	     }
	$(".btn").click(function() {
		$.get("php/get_research_list.php?action=deletedata&research_name="+this.id,function(data,status){
				if(data=="data deleted") {
					alert("The research has been successfully deleted");
					location.assign("r_list_researches.html");
				}
		});
       });
	$(".btn1").click(function() {
		$('#list').hide();
		$.get("php/get_research_list.php?action=getrdataforedit&research_name="+this.id,function(data,status){
		var d;
		var name, cntct, desc, elig, fdate, tdate, length, pay_mode, payment, keyw;
		eval("d="+data);
		for (var i=0; i < d.length; d++) {
			var list='Research name: <b>'+d[i].name+'</b><ol>';
			list += '<li>Contact Information: &nbsp;&nbsp;'+d[i].contact_info+'</li>';
			list += '<li>Description: &nbsp;&nbsp;'+d[i].description+'</li>';
			list += '<li>Eligibility: '+d[i].eligibility+'</li>';
			list += '<li>Start Date: '+d[i].from_date+'</li>';
			list += '<li>End Date: '+d[i].to_date+'</li>';
			list += '<li>Length: '+d[i].length+'</li>';
			list += '<li>Payment Mode: '+d[i].payment+'</li>';
			list += '<li>Payment Amount ($): '+d[i].payment_amount+'</li>';
			list += '<li>Keywords: '+d[i].keywords+'</li>'
			list += '<input type="button" class="updatebutton" value="Edit Research" id="r_edit" /></ol>';
			$('#vieworedit').append(list);
			name = d[i].name;
			cntct = d[i].contact_info;
			desc = d[i].description;
			elig = d[i].eligibility;
			fdate = d[i].from_date;
			tdate = d[i].to_date;
			length = d[i].length;
			pay_mode = d[i].payment;
			pay_amt = d[i].payment_amount;
			keyw = d[i].keywords;
		}
		$("#r_edit").click(function() {
			$('#r_edit').hide();
			var edit_research = '<table>';
			edit_research += '<tr><td>Contact Information: </td><td><input type="text" name="textfield" id="cntct_text" value="'+cntct+'"</td></tr>';
			edit_research += '<tr><td>Description: </td><td><textarea name="textfield" id="desc_text" cols="25" value="'+desc+'"></textarea></td></tr>';
			edit_research += '<tr><td>Eligibility: </td><td><input type="text" name="textfield" id="elig_text" value="'+elig+'" /></td></tr>';
			edit_research += '<tr><td>Start Date: </td><td><input type="date" name="datefield" id="fdate_text" value="'+fdate+'" /></td></tr>';
			edit_research += '<tr><td>End Date: </td><td><input type="date" name="datefield" id="tdate_text" value="'+tdate+'" /></td></tr>';
			edit_research += '<tr><td>Length: </td><td><input type="text" name="textfield" id="length_text" value="'+length+'" /></td></tr>';
			edit_research += '<tr><td>Payment Mode: </td><td><input type="text" name="textfield" id="pay_mode_text" value="'+pay_mode+'" /></td></tr>';
			edit_research += '<tr><td>Payment Amount ($): </td><td><input type="text" name="textfield" id="pay_amt_text" value="'+pay_amt+'" /></td></tr>';
			edit_research += '<tr><td>Keywords: </td><td><input type="text" name="textfield" id="keyw_text" value="'+keyw+'" /></td></tr>';
			edit_research += '<tr><td><input type="button" name="updt_btn" id="updt_btn" value="Update" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="cancel" id="cancel" value="Cancel" /></td></tr></table>';
			$('#inserttext').append(edit_research);
			$('#updt_btn').click(function() {
				var get_cntct = $('#cntct_text').val();
				var get_desc = $('#desc_text').val();
				var get_elig = $('#elig_text').val();
				var get_fdate = $('#fdate_text').val();
				var get_tdate = $('#tdate_text').val();
				var get_length = $('#length_text').val();
				var get_pay_mode = $('#pay_mode_text').val();
				var get_pay_amt = $('#pay_amt_text').val();
				var get_keyw = $('#keyw_text').val();
				$('#inserttext').hide();
				$.post("php/update_research_list.php", {updt_name: name, updt_cntct: get_cntct, updt_desc: get_desc, updt_elig: get_elig, updt_fdate: get_fdate, updt_tdate: get_tdate, updt_length: get_length, updt_pay_mode: get_pay_mode, updt_pay_amt: get_pay_amt, updt_keyw: get_keyw}
				);
				alert("Your research has been updated appropriately!");
			});
			$('#cancel').click(function() {
				location.assign('r_list_researches.html');
			});
		});
		});
    	    });
	   $(".btn2").click(function() {
		$('#list').hide();
		$.get("php/get_research_list.php?action=viewdata&research_name="+this.id,function(data,status){
		var p;
		eval("p="+data);
		if(p.length == 0) {
			alert("There are no participants currently in this research.");
		} else {
		for (var i=0; i < p.length; i++) {
			var list = "<li><b>Email:</b> "+p[i].email+"<br><b>Name:</b> "+p[i].firstname+" "+p[i].lastname+"<br>";
			list+= '<input type="button" class="cntct" id= "'+p[i].email+'" value="Contact '+p[i].firstname+'"/>';
			list+= '<input type="button" class="schedule" id= '+p[i].firstname+' value="Schedule with '+p[i].firstname+'"/>'+'</li>';
			$('#participants').append(list);
		}
		}
		$(".cntct").click(function() {
			location.assign("contactparticipant.html");
			$.get("php/contactparticipant.php?action=savemail&pemail="+this.id,function(data) {
			});
		});
		$(".schedule").click(function() {
			location.assign("https://www.google.com/calendar/selfsched?sstoken=UUpoRTdRcUdUMlNqfGRlZmF1bHR8Y2NmZDA4ZjBlOTYxZTEzZDlhOWRhZjg3OGYyNmVhOTE");
		});
		});
    	    });	
     });
});