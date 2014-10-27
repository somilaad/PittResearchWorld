<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
session_start();

$action = $_GET['action'];
if($action == "savemail") {
save_mail();
}
elseif($action == "sendmail") {
send_mail();
}

function save_mail() {
	$mail = $_GET['pemail'];
	$_SESSION['pemail'] = $mail;
}

function send_mail() {
	$remail = $_SESSION['user'];
	$pemail = $_SESSION['pemail'];
	$rname = $_GET['rname'];
	$rmessage = $_GET['rmessage'];
  	$send_subject = $remail." wants to connect with you!";
 	$send_headers = "From:" . $remail;
	mail($pemail,$send_subject,$rmessage,$send_headers);
	print("Your message has been successfully sent!");
}

?>