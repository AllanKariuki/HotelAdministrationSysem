<?php
	$servername= "localhost:3308";
	$username="root";
	$passsword = "";
	$database = "hotelsystem";


	$connect = mysqli_connect($servername, $username, $passsword, $database);
	if(!$connect){
		echo '<script> alert("Failed to connected to the database")</script>';
	}
	// else{
	// 	echo '<script> alert("Connected to the database") </script>';
	// }
?>