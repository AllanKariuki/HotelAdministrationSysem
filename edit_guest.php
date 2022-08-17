<?php
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
		$phone_number = mysqli_real_escape_string($connect, $_POST['phone_number']);
		$email_address = mysqli_real_escape_string($connect, $_POST['email_address']);
		$country = mysqli_Real_escape_string($connect, $_POST['country']);

		//updating the guest
		$sql4 = "UPDATE guests SET fullname = '$fullname', phone_number = '$phone_number', email_address= '$email_address', country = '$country' WHERE ID = '$id'";
		$update = mysqli_query($connect, $sql4);
		if($update){
			echo '<script> alert("Details updated"); history.back();</script>';
		}else{
			echo '<script> alert("Update failed"); history.back();</script>';
		}
	}else{
		echo '<script> alert("Unable to upload detals");history.back(); </script>';
	}
?>