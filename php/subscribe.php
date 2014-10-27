<?php
$id=$_GET['id'];
header("Content-Type: application/xml; charset=ISO-8859-1");
$database = "inf2560_g2";
$server = "mysql.rosta-farzan.net";
$db_user = "grp2";
$db_pass = "d6q7pD";
$link = mysql_connect($server, $db_user, $db_pass);
mysql_select_db($database);
session_start();
$currentUser=$_SESSION['user'];

$sql = "insert into subscription(pemail,rname) values ('$currentUser','$id')";
mysql_query($sql);

$query = mysql_query("select distinct r.name,r.contact_info,r.description,r.eligibility,r.from_date,r.to_date from researches r,subscription s where (s.pemail like '%".$currentUser."%' and r.name like s.rname) ");

header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
echo "<rss version='2.0' >";
echo "<channel>";
echo "<title></title>";
echo "<link></link>";
echo "<description></description>";
echo "<language>en-us</language>";
  
  
while($row = mysql_fetch_array($query)){            
 	$name = $row['name'];
    $contact_info = $row['contact_info'];
    $description = $row['description'];
    $eligibility = $row['eligibility'];
    $from_date = $row['from_date'];
    $to_date = $row['to_date'];
    $length = $row['length'];
    $payment = $row['payment'];
    $payment_amount = $row['payment_amount'];
	$keywords = $row['keyword'];  
echo "<item>";
echo "<name>$name</name>";
echo "<contact_info>$contact_info</contact_info>";
echo "<description>$description</description>";
echo "<eligibility>$eligibility</eligibility>";
echo "<from_date>$from_date</from_date>";
echo "<to_date>$to_date</to_date>";
echo "</item>";
}
echo "</channel></rss>";
?>
