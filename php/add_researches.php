<?php
$database = "inf2560_g2";
$server = "mysql.rosta-farzan.net";
$db_user = "grp2";
$db_pass = "d6q7pD";
$link = mysql_connect($server, $db_user, $db_pass);
mysql_select_db($database);
session_start();
save_research();

function save_research() {
	if(isset($_SESSION['user'])) {
        $r_name = $_POST['add_rname'];
        $r_cinfo = $_POST['add_cinfo'];
        $r_description = $_POST['add_description'];
        $r_eligibility = $_POST['add_eligibility'];
        $r_fdate = $_POST['add_fdate'];
        $r_tdate = $_POST['add_tdate'];
        $r_length = $_POST['add_length'];
        $r_pay_mode = $_POST['add_pay_mode'];
        $r_payamount = $_POST['add_payamount'];
        $r_keyword = $_POST['add_keyword'];
	$r_email = $_SESSION['user'];
        $sql = "insert into researches (name,contact_info,description,eligibility,from_date,to_date,length,payment,payment_amount,keywords,email) values ('$r_name','$r_cinfo','$r_description','$r_eligibility','$r_fdate','$r_tdate','$r_length','$r_pay_mode','$r_payamount','$r_keyword','$r_email')";
        mysql_query($sql);
	}
}

?>