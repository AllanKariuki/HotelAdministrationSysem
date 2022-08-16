<?php 
 include("db_connect.php");
 if(isset($_POST["submit"])) {
 	$fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
 	$phone_number = mysqli_real_escape_string($connect, $_POST['phonenumber']);
 	$email_address = mysqli_real_escape_string($connect, $_POST['email_address']);
 	$country = mysqli_real_escape_string($connect, $_POST['country']);

 	$sql = " INSERT INTO guests (fullname, phone_number, email_address, country) VALUES ('$fullname', '$phone_number', '$email_address', '$country')";

 	$insert = mysqli_query($connect, $sql);
 	if($insert){
 		echo '<script> alert("Guest successfully added"); history.back();</script>';
 	}else{
 		echo '<script> alert("Failed insertion"); history.back(); </script>';
 	}
 }
 else{
 	echo '<script> alert("Unable to add details"); history.back(); </scipt>';
 }
?>