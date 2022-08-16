<?php 
	include("db_connect.php");
	if(isset($_POST["submit"])){
		$type = mysqli_real_escape_string($connect, $_POST['type']);

		$sql3 = "INSERT INTO roomtypes (type) VALUES ('$type')";

		$insert3 = mysqli_query($connect, $sql3);
		if($insert3){
			echo '<script> alert("Type added"); history.back(); </script>';
		}else{
			echo '<script> alert("Unable to add room type");</script>';
		}

	}
	else{
		echo '<script> alert("Unable to upload details");history.back();</script>';
	}
?>