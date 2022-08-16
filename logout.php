<?php
session_start();
$active_user=$_SESSION["active_user"];
if($active_user!=""){
	session_destroy();
	session_unset();
	echo '<script>window.location.assign("loginpage.php")</script>';	
}

?>