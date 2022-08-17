<?php
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$r_id = $_POST['id'];
		$type = mysqli_real_escape_string($connect, $_POST['room_type']);
		$price = mysqli_real_escape_string($connect, $_POST['room_price']);

		$r_sql = "UPDATE rooms SET type = '$type', price = '$price' WHERE ID = '$r_id'";
		$update_room = mysqli_query($connect, $r_sql);
		if($update_room){
			echo '<script> alert("succeffuly updated"); history.back();</script>';
		}else{
			echo '<script> alert("Update failed"); history.back();</script>';
		}

	}else{
		echo '<script> alert("Update failed"); history.back(); </script>';
	}
?>