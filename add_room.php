<?php
	include("db_connect.php");
	if(isset($_POST["submit"])){
		$type = mysqli_real_escape_string($connect, $_POST['room_type']);
		$price = mysqli_real_escape_string($connect, $_POST['room_price']);

		$sql2 = "INSERT INTO rooms (type, price) VALUES ('$type', '$price')";
		$insert2 = mysqli_query($connect, $sql2);

		if($insert2){
			echo '<script> alert("Room succefully added"); history.back(); </script>';
		}else{
			echo '<script> alert("Unable to add the room"); </script>';
		}
	}
	else{
		echo '<script> alert("unable to upload the details");history.back(); </script>';
	}
?>