<?php
$database = "inf2560_g2";
$server = "mysql.rosta-farzan.net";
$db_user = "grp2";
$db_pass = "d6q7pD";
$link = mysql_connect($server, $db_user, $db_pass);
mysql_select_db($database);
session_start();
check();

function check() {
$role = $_POST['role'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$checkr = "SELECT * from researcher_login where email= '$email'";
$checkp = "SELECT * from participant_login where email= '$email'";
$qryr = mysql_query($checkr);
$qryp = mysql_query($checkp);
$num_r = mysql_num_rows($qryr);
$num_p = mysql_num_rows($qryp);
if($num_r>0 || $num_p>0){print("error");}
elseif($role=="Participant") {addParticipant();}
elseif($role=="Researcher") {addResearcher();}
}

function addParticipant() {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        $sql = "insert into participant_login (firstname,lastname,password,email) values ('$fname','$lname','$password','$email')";
        mysql_query($sql);
	 $_SESSION['user']=$email;
	 print("participant");
        }

function addResearcher() {
         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $email =$_POST['email'];
         $password = $_POST['password'];
         $s = "insert into researcher_login (firstname,lastname,password,email) values ('$fname','$lname','$password','$email')";
         mysql_query($s);
	  $_SESSION['user']=$email;
	  print("researcher");
        }

?>