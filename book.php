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
	<title>Modify Room</title>
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
				        <li class="active"><a href="#home">Home</a></li>
				      
				        <li><a href="#about">Get to know us</a></li>  
				        <!-- <li><a href="#contact"><img src="images/contact.png" alt="logo-icon" width="17px" height="17px" style="margin-top: -8.5px;">&nbspGet in touch</a>
				        </li>  -->
				     </ul>
				     <ul class="nav navbar-nav navbar-right" id="list">
				         <li>
				            	<a href="logout.php">Logout</a>
				          </li>
				     </ul>
				</div>	
			</div>
		</nav>
		<!--//Retriveing details of the room-->
		<?php 
			include("db_connect.php");
			$rm_id = $_GET['rm_id'];
			$room_sql = "SELECT * FROM rooms WHERE id = '$rm_id'";
			$selected_room = mysqli_query($connect, $room_sql);
			$c_room = mysqli_num_rows($selected_room);
			$b_room = mysqli_fetch_assoc($selected_room);
		?>

		<!--Log in Form-->
		<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 700px;">
			<h4 class="w3-text white">Make Reservation</h4>
			<form method="POST" action="create_booking.php">
					<input type="hidden" name="id" value= "<?php echo $rm_id; ?>">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Type</label>
						<input type="text" name="room_type" class="form-control" value = "<?php echo $b_room['type']; ?>">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="number" name="room_price" class="form-control" value = "<?php echo $b_room['price']; ?>">
					</div>
					<div class="form-group">
						<label>Check in</label>
						<input type="date" name="check-in" class="form-control">
					</div>
					<div class="form-group">
						<label>Checkout</label>
						<input type="date" name="check-out" class="form-control">
					</div>
					<div class="form-group">
						<label>Status</label>
						<input type="text" name="status" class="form-control">
					</div>
					<button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>&nbsp<button class="btn btn-sm btn-danger" type="reset">Reset</button>
			</form>
		</div>
		<!---->



	 </div>

</body>
</html>
