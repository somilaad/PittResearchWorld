<?php

$action = $_GET['action'];
if ($action == "logout") {
  log_out();
}

function log_out() {
	session_start();
	session_unset();
	session_write_close();
	$msg="logged out";
	print "$msg";
}

?>