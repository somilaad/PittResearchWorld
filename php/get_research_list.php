<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
session_start();

$action = $_GET['action'];
if ($action == "savedata") {
  save_data();
}
elseif ($action == "getdata") {
  get_data();
}
elseif ($action == "deletedata") {
  delete_data();
}
elseif ($action == "viewdata") {
  view_data();
}
elseif ($action == "getrdataforedit") {
  get_rdata_for_edit();
}
elseif ($action == "updatecntct") {
  update_cntct();
}
elseif ($action == "updatedesc") {
  update_desc();
}
elseif ($action == "updateelig") {
  update_elig();
}
elseif ($action == "updatefdate") {
  update_fdate();
}
elseif ($action == "updatetdate") {
  update_tdate();
}
elseif ($action == "updatelength") {
  update_length();
}
elseif ($action == "updatepay_mode") {
  update_pay_mode();
}
elseif ($action == "updatepay_amt") {
  update_pay_amt();
}
elseif ($action == "updatekeyw") {
  update_keyw();
}

function delete_data() {
  if(isset($_SESSION['user'])) {
  $rname = $_GET['research_name'];
  $sql = "delete from researches where name='$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data deleted";
  print "$msg";
  }
}

function view_data() {
  $participants= array();
  $i=0;
  $rname = $_GET['research_name'];
  $sql = "select firstname,lastname,email from participant_login where email in (select p_email from participant_research where research_name ='$rname')";
  $res = mysql_query($sql);
  while ($row = mysql_fetch_array($res)) {
    $email = $row['email'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $participants[$i]['email']=$email;
    $participants[$i]['firstname']=$firstname;
    $participants[$i]['lastname']=$lastname;
    $i++;
    }
    $json = json_encode($participants);
      print($json);
}

function get_data() {
  if(isset($_SESSION['user'])) {
  $researches = array();
  //$currentUser=mysql_real_escape_string($_POST["email"]);
  $currentUser=$_SESSION['user'];
  $i=0;
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where email='".$currentUser."'";
  //$sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches";
  $res = mysql_query($sql);
  while ($row = mysql_fetch_array($res)) {
    $name = $row['name'];
    $contact_info = $row['contact_info'];
    $description = $row['description'];
    $eligibility = $row['eligibility'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];
    $length = $row['length'];
    $payment = $row['payment'];
    $payment_amount = $row['payment_amount'];
    $keywords = $row['keywords'];
    $researches[$i]['name']= $name;
    $researches[$i]['contact_info']= $contact_info;
    $researches[$i]['description']= $description;
    $researches[$i]['eligibility']= $eligibility;
    $researches[$i]['from_date']= $from_date;
    $researches[$i]['to_date']= $to_date;
    $researches[$i]['length']= $length;
    $researches[$i]['payment']= $payment;
    $researches[$i]['payment_amount']= $payment_amount;
    $researches[$i]['keywords']= $keywords;
    $i++;
  }
  $json = json_encode($researches);
  print "$json";
  }
}

function get_rdata_for_edit() {
  if(isset($_SESSION['user'])) {
  $researches = array();
  $rname = $_GET['research_name'];
  $i=0;
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where name='".$rname."'";
  $res = mysql_query($sql);
  while ($row = mysql_fetch_array($res)) {
    $name = $row['name'];
    $contact_info = $row['contact_info'];
    $description = $row['description'];
    $eligibility = $row['eligibility'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];
    $length = $row['length'];
    $payment = $row['payment'];
    $payment_amount = $row['payment_amount'];
    $keywords = $row['keywords'];
    $researches[$i]['name']= $name;
    $researches[$i]['contact_info']= $contact_info;
    $researches[$i]['description']= $description;
    $researches[$i]['eligibility']= $eligibility;
    $researches[$i]['from_date']= $from_date;
    $researches[$i]['to_date']= $to_date;
    $researches[$i]['length']= $length;
    $researches[$i]['payment']= $payment;
    $researches[$i]['payment_amount']= $payment_amount;
    $researches[$i]['keywords']= $keywords;
    $i++;
  }
  $json = json_encode($researches);
  print "$json";
  }
}

function update_cntct() {
  $rname = $_GET['research_name'];
  $cntct = $_GET['contact_info'];
  $sql = "UPDATE researches SET contact_info='$cntct' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Contact Information. The new contact information is: $cntct";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_desc() {
  $rname = $_GET['research_name'];
  $desc = $_GET['description'];
  $sql = "UPDATE researches SET description='$desc' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Research Description. The new description is: $desc";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_elig() {
  $rname = $_GET['research_name'];
  $elig = $_GET['eligibility'];
  $sql = "UPDATE researches SET eligibility='$elig' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Eligibility details. The new eligibility is: $elig";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_fdate() {
  $rname = $_GET['research_name'];
  $fdate = $_GET['from_date'];
  $sql = "UPDATE researches SET from_date='$fdate' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Start Date. The new start date is: $fdate";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_tdate() {
  $rname = $_GET['research_name'];
  $tdate = $_GET['to_date'];
  $sql = "UPDATE researches SET to_date='$tdate' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new End Date. The new end date is: $tdate";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_length() {
  $rname = $_GET['research_name'];
  $length = $_GET['length'];
  $sql = "UPDATE researches SET length='$length' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new End Date. The new end date is: $tdate";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_pay_mode() {
  $rname = $_GET['research_name'];
  $pay_mode = $_GET['payment'];
  $sql = "UPDATE researches SET payment='$pay_mode' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Payment Mode. The new payment mode is: $pay_mode";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_pay_amt() {
  $rname = $_GET['research_name'];
  $pay_amt = $_GET['payment_amount'];
  $sql = "UPDATE researches SET payment_amount='$pay_amt' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Payment Amount. The new payment amount is: $pay_amt";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

function update_keyw() {
  $rname = $_GET['research_name'];
  $keyw = $_GET['keywords'];
  $sql = "UPDATE researches SET keywords='$keyw' where name = '$rname'";
  mysql_query($sql);
  $msg = ($error = mysql_error())?$error:"data updated";
  $sql2 = "SELECT p_email from participant_research WHERE research_name = '$rname'";
  $res = mysql_query($sql2);
  while ($row = mysql_fetch_array($res)) {
  	$send_to = $row['p_email'];
	$send_from = "do-not-reply@pittresearchworld.com";
	$send_message = "The research $rname has been updated with new Search Keywords. The new search keywords are: $keyw";
	$send_subject = "$rname has been updated with new details";
	$send_headers = "From:" . $send_from;
	mail($send_to,$send_subject,$send_message,$send_headers);
  }
  print "$msg";
}

?>