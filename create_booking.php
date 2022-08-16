<?php 
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$sr_id = $_POST['id'];
		$name = mysqli_real_escape_string($connect, $_POST['name']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$type = mysqli_real_escape_string($connect, $_POST['room_type']);
		$price = mysqli_real_escape_string($connect, $_POST['room_price']);
		$check_in = mysqli_real_escape_string($connect, $_POST['check-in']);
		$check_out = mysqli_real_escape_string($connect, $_POST['check-out']);
		$status = mysqli_real_escape_string($connect, $_POST['status']);

		$bk_sql = "INSERT INTO bookings (room_id, guest_name, email, type, check_in, check_out, status) 
		VALUES ('$sr_id', '$name', '$email', '$type', '$check_in', '$check_out', '$status')";
		$create = mysqli_query($connect, $bk_sql);
		
		if(!$create){
			echo '<script> alert("unable to make the reservation"); </script>';
		}else{
			echo '<script> window.location.assign("bookings.php"); </script>';
		}

	}else{
		echo '<script> alert("Unable to send details");history.back(); </script>';
	}
?>