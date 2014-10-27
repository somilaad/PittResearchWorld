<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
session_start();
update_research();

function update_research() {
  if(isset($_SESSION['user'])) {
          $r_name = $_POST['updt_name'];
          $r_cinfo = $_POST['updt_cntct'];
          $r_description = $_POST['updt_desc'];
          $r_eligibility = $_POST['updt_elig'];
          $r_fdate = $_POST['updt_fdate'];
          $r_tdate = $_POST['updt_tdate'];
          $r_length = $_POST['updt_length'];
          $r_pay_mode = $_POST['updt_pay_mode'];
          $r_payamount = $_POST['updt_pay_amt'];
          $r_keyword = $_POST['updt_keyw'];
  	  $r_email = $_SESSION['user'];
          $sql = "UPDATE researches SET contact_info='$r_cinfo',description='$r_description',eligibility='$r_eligibility',from_date='$r_fdate',to_date='$r_tdate',length='$r_length',payment='$r_pay_mode',payment_amount='$r_payamount',keywords='$r_keyword' WHERE email='$r_email' AND name='$r_name'";
          mysql_query($sql);
	  $sql2 = "select p_email from participant_research where research_name = '$r_name'";
	  $res = mysql_query($sql2);
	  while ($row = mysql_fetch_array($res)) {
	    $to = $row['p_email'];
	    $from = "research-update@pittresearchworld.com";
  	    $message = "The research $r_name has been modified. The new values are:- Contact Information: $r_cinfo; Description: $r_description; Eligibility: $r_eligibility; Start Date: $r_fdate; End Date: $r_tdate; Length: $r_length; Pay Mode: $r_pay_mode; Payment Mode: $r_payamount; Keywords: $r_keyword";
	    $subject = "$r_name has been updated";
	    $send_headers = "From:" . $from;
	    mail($to,$subject,$message,$send_headers);
  	  }
  }
}

?>