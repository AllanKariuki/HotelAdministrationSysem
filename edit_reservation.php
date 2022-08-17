<?php 
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$id = $_POST['id'];
		$guest_name = mysqli_real_escape_string($connect, $_POST['guest_name']);
		$email =mysqli_real_escape_string($connect, $_POST['email']);
		$room_number = mysqli_real_escape_string($connect, $_POST['room_number']);
		$room_type = mysqli_real_escape_string($connect, $_POST['room_type']);
		$check_in = mysqli_real_escape_string($connect, $_POST['chek-in']);
		$check_out = mysqli_real_escape_string($connect, $_POST['check-out']);
		$status = mysqli_real_escape_string($connect, $_POST['status']);

		$reserve_sql = "UPDATE bookings SET room_id = '$room_number', guest_name = '$guest_name', email = '$email', type = '$room_type', check_in = '$check_in', check_out = '$check_out', status = '$status'";
		$update_reserve = mysqli_query($connect, $reserve_sql);
		if($update_reserve){
			echo '<script> window.location.assign("bookings.php"); </script>';
		}else{
			echo '<script> alert("Unable to update details"); history.back(); </script>';
		}
	}else{
		echo '<script> alert("Unable to add information"); history.back(); </script>';
	}
?>