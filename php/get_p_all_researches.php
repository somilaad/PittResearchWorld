<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
session_start();

$action = $_GET['action'];
if ($action == "searchdata") {
  search_data();
}
elseif ($action == "getdata") {
  get_data();
}
elseif ($action == "savedata") {
  save_data();
}

function search_data() {
  if(isset($_SESSION['user'])) {
  $currentUser=$_SESSION['user'];
  $skeyw = $_GET['srchkeyw'];
  $researches = array();
  $i=0;
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where (name like '%".$skeyw."%' or contact_info like '%".$skeyw."%' or description like '%".$skeyw."%' or eligibility like '%".$skeyw."%' or keywords like '%".$skeyw."%') and name not in(select research_name from participant_research where p_email ='".$currentUser."')";
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

function get_data() {
  if(isset($_SESSION['user'])) {
  $researches = array();
  //$currentUser=mysql_real_escape_string($_POST["email"]);
  $currentUser=$_SESSION['user'];
  $i=0;
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where name not in(select research_name from participant_research where p_email='".$currentUser."')";
//  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches";
//  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where name not in(select research_name from participant_research where p_email='arpit@hotmail.com')";
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

function save_data() {
  if(isset($_SESSION['user'])) {
    $research_name = $_GET['research_name'];
    $email = $_SESSION['user'];
    //$sql = "insert into students (fname,lname) values ('$fname','$lname')";
    $sql = "INSERT INTO participant_research (p_email,research_name) VALUES ('$email', '$research_name')";
    mysql_query($sql);
    $msg = ($error = mysql_error())?$error:"data added";
    $sql2 = "select email from researches where name in(select research_name from participant_research where research_name='$research_name')";
    $res=mysql_query($sql2);
    $msg = ($error = mysql_error())?$error:"data added";
    while ($row = mysql_fetch_array($res)) {
    	$to = $row['email'];
	$send_subject = "Interest shown in research '$research_name'";
	$send_message = "'$email' wants to contact you for your research '$research_name'";
	$send_headers = "From:" . $email;
	mail($to,$send_subject,$send_message,$send_headers);
    }
    print "$msg";
  }
}

?>