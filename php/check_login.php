<?php
$h = "mysql.rosta-farzan.net";
$u = "grp2";
$p = "d6q7pD";
mysql_connect($h,$u,$p);
mysql_select_db("inf2560_g2");

session_start();
login_data();

function login_data() {
  //$email = mysql_real_escape_string($_POST["email"]);
  //$pwd = mysql_real_escape_string($_POST["password"]);
  $email = $_POST['uemail'];
  $pwd = $_POST['upasswd'];
  $sql1 = "select * from researcher_login where(email='$email' and password='$pwd')";
$sql2 = "select * from participant_login where(email='$email' and password='$pwd')";
$res1 = mysql_query($sql1);
$res2 = mysql_query($sql2);

$row1 = mysql_num_rows($res1);
$row2 = mysql_num_rows($res2);

if($row1>0) {
	$_SESSION['user']=$email;
	print "researcher";
}
elseif ($row2>0) {
	$_SESSION['user']=$email;
	print "participant";
}
elseif ($row1==0 && $row2==0) {
	print "invalid";
}

}

?>