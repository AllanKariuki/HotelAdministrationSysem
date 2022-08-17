<?php 
	session_start();
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$passsword = mysqli_real_escape_string($connect, $_POST['password']);
		$hashed_password = hash("MD5", $passsword);
		$l_sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password'";

		$select_l = mysqli_query($connect, $l_sql);
		
		$l_count = mysqli_num_rows($select_l);

		if($l_count>0){
			$_SESSION['active_user'] = $email;
			$active_user = $_SESSION['active_user'];
			$my_role = mysqli_fetch_assoc($select_l);
			
				echo '<script> window.location.assign("dashboard.php"); </script>';
			
		}else{
			echo '<script> alert("Unable to login");history.back(); </script>';
		}
	}
?>