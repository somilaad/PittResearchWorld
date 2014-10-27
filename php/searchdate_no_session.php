<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");

session_start();

$action = $_GET['action'];

if ($action == "searchdate") {
  search_date();
}

function search_date() {
  $start = $_GET['from'];
  $end = $_GET['to'];
  $sql = "select name,contact_info,description,from_date,to_date,length,payment,payment_amount,keywords,email from researches where (from_date between '$start' and '$end') or (to_date between '$start' and '$end')";
  $res = mysql_query($sql);
  $i=0;
  while ($row = mysql_fetch_array($res)) {
    $name = $row['name'];
    $contact_info = $row['contact_info'];
    $description = $row['description'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];
    $length = $row['length'];
    $payment = $row['payment'];
    $payment_amount = $row['payment_amount'];
    $keywords = $row['keywords'];
    $email = $row['email'];
    $researches[$i]['name']=$name;
    $researches[$i]['contact_info']=$contact_info;
    $researches[$i]['description']=$description;
    $researches[$i]['from_date']=$from_date;
    $researches[$i]['to_date']=$to_date;
    $researches[$i]['length']=$length;
    $researches[$i]['payment']=$payment;
    $researches[$i]['payment_amount']=$payment_amount;
    $researches[$i]['keywords']=$keywords;
    $researches[$i]['email']=$email;
    $i++;
    }
    $json = json_encode($researches);
      print($json);
}

?>