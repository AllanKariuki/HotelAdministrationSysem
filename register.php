<?php 
	include("db_connect.php");
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($connect, $_POST['name']);
		$role = mysqli_real_escape_string($connect, $_POST['role']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$phone = mysqli_real_escape_string($connect, $_POST['phone']);
		$passsword = mysqli_real_escape_string($connect, $_POST['password']);
		$c_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);
		
		$check_sql = "SELECT * FROM users WHERE email = '$email'";
		$select_users = mysqli_query($connect, $check_sql);
		$users_count = mysqli_num_rows($select_users);
		if($users_count>0){
			echo '<script> alert("This user already exists");history.back(); </scipt>';
		} else{
			if($passsword!=$c_password){
				echo '<script> alert("Password do not match"); history.back();</script>';
			}else{
				$hashed_password = hash("MD5", $passsword);
				$u_sql = "INSERT INTO users (name, role, email, phone, password) VALUES ('$name', '$role', '$email', '$phone', '$hashed_password')";
				$insert_user = mysqli_query($connect, $u_sql);
				if($insert_user){
					$_SESSION['active_user'] = $email;
					$active_user = $_SESSION['active_user'];

					echo '<script> alert("User successfuly created"); window.location.assign("users.php"); </script>';
				}
				else{
					echo '<script> alert("Register unsucceful please try again");history.back(); </script>';
				}
			}
		}
	}
	else{
		echo '<script> alert("Unable to send data"); history.back(); </script>';
	}
?>