<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");
session_start();

$action = $_GET['action'];
//print($pemail);
if($action == "savemail") {
save_mail();
}
elseif($action == "sendmail") {
send_mail();
}

function save_mail() {
$mail = $_GET['remail'];
$_SESSION['remail'] = $mail;
}

function send_mail() {
	$pemail = $_SESSION['user'];
	$remail = $_SESSION['remail'];
	$pname = $_GET['pname'];
	$pmessage = $_GET['pmessage'];
  	$send_subject = $pemail." wants to connect with you!";
 	$send_headers = "From:" . $pemail;
	mail($remail,$send_subject,$pmessage,$send_headers);
	print("Your message has been successfully sent to the researcher!");
}

?>