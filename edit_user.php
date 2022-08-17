<?php
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$name = mysqli_real_escape_string($connect, $_POST['name']);
		$role = mysqli_real_escape_string($connect, $_POST['role']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$phone = mysqli_real_escape_string($connect, $_POST['phone']);

		//updating the guest
		$sql_user = "UPDATE guests SET name = '$name', role = '$role', email= '$email', phone = '$phone' WHERE ID = '$id'";
		$update_user = mysqli_query($connect, $sql_user);
		if($update_user){
			echo '<script> window.location.assign("users.php"); </script>';
		}else{
			echo '<script> alert("Update failed"); history.back();</script>';
		}
	}else{
		echo '<script> alert("Unable to upload detals");history.back(); </script>';
	}
?>