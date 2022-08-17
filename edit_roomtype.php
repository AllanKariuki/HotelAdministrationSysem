<?php
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$roomtype_id = $_POST['id'];
		$type = mysqli_real_escape_string($connect, $_POST['type']);

		$rm_sql = "UPDATE rooms SET type = '$type' WHERE ID = '$roomtype_id'";
		$update_roomtype = mysqli_query($connect, $rm_sql);
		if($update_roomtype){
			echo '<script> alert("Succeffuly updated"); history.back(); </script>';
		}else{ 
			echo '<script> alert("Update failed"); history.back(); </script>';
		}

	}else{
		echo '<script> alert("Update failed"); history.back(); </script>';
	}
?>