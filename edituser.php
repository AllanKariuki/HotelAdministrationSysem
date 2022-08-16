<?php
session_start();
error_reporting(0);
include("db_connect.php");
$active_user=$_SESSION["active_user"];
if($active_user==""){
	echo '<script>alert("You need to login first");window.location.assign("http://localhost/HotelSystem/index.html");</script>';
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="static/css/w3v3.css">
	<link rel="stylesheet" type="text/css" href="static/css/css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="static/css/qaforumstyles.css">
	<link rel="stylesheet" type="text/css" href="static/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="static/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="static/js/validations.js"></script>

</head>
<body>
	<div class="container">
		<!--Navigation Bar-->
		<nav class="navbar navbar-default navbar-fixed-top" id = "navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			     </button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<div class="container"> 
					<ul class="nav navbar-nav" id="list">
				        <li class="active"><a href="admindashboard.php">Home</a></li>
				      	<li><a href="guests.php">Guests</a></li> 
				        <li><a href="users.php">Users</a></li>  
				        <li><a href="adminroomtypes.php">Room Types</a></li> 
				        <li><a href="adminrooms.php">Rooms</a></li>
				        <li><a href="adminbookings.php">Reservations</a></li> 
				     </ul>
				     <ul class="nav navbar-nav navbar-right" id="list">
				         <li>
				            	<a href="logout.php">Logout</a>
				          </li>
				     </ul>
				</div>	
			</div>
		</nav>

		<?php
			include("db_connect.php");
			$id = $_GET["user_id"];
			$find_user = "SELECT * FROM guests WHERE ID= '$id'";
			$select_u = mysqli_query($connect, $fing_guest);
			$count_u = mysqli_num_rows($select_u);
			$my_user = mysqli_fetch_assoc($select_u);
		?>

		<!--Edit Guest form Form-->
		<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 700px;">
			<h4 class="w3-text white">Edit guest</h4>
			<form method="POST" action="edit_user.php">
				<input type="hidden" name="id" value= "<?php echo $id; ?>">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $my_user['name']; ?>">
					</div>
					<div class="form-group">
						<label>Role</label>
						<input type="text" name="role" class="form-control" value="<?php echo $my_user['role']; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control"  value="<?php echo $my_user['email']; ?>">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phone" class="form-control" value="<?php echo $my_user['phone']; ?>">
					</div>
					<button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>&nbsp<button class="btn btn-sm btn-danger" type="reset">Reset</button>
			</form>
		</div>
		<!---->



	 </div>

</body>
</html>
