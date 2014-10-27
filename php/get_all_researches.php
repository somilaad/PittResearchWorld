<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
//$db = mysqli_connect("mysql.rosta-farzan.net", "grp2", "d6q7pD", "inf2560_g2");
session_start();

$action = $_GET['action'];
if ($action == "searchdata") {
  search_data();
}
elseif ($action == "getdata") {
  get_data();
}


function search_data() {
  //if(!isset($_SESSION['user'])) {
  $skeyw = $_GET['srchkeyw'];
  $researches = array();
  $i=0;
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where name like '%".$skeyw."%' or contact_info like '%".$skeyw."%' or description like '%".$skeyw."%' or eligibility like '%".$skeyw."%' or keywords like '%".$skeyw."%'";
  //$sql = 'select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches';
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

function get_data() {
  //if(!isset($_SESSION['user'])) {
  $researches = array();
  //$currentUser=mysql_real_escape_string($_POST["email"]);
  //$currentUser=$_SESSION['user'];
  $i=0;
  //$sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches where email='".$currentUser."'";
  $sql = "select name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords from researches";
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

?>