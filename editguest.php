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
	<title>Edit Guest</title>
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
				        <li class="active"><a href="dashboard.php">Home</a></li>
				      
				        <li><a href="guests.php">Guests</a></li>  
				        <li><a href="rooms.php">Rooms</a></li>
				        <li><a href="bookings.php">Reservations</a></li> 
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
			$id = $_GET["guest_id"];
			$fing_guest = "SELECT * FROM guests WHERE id= '$id'";
			$select = mysqli_query($connect, $fing_guest);
			$count = mysqli_num_rows($select);
			$my_guest = mysqli_fetch_assoc($select);
		?>

		<!--Edit Guest form Form-->
		<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 700px;">
			<h4 class="w3-text white">Edit guest</h4>
			<form method="POST" action="edit_guest.php">
				<input type="hidden" name="id" value= "<?php echo $id; ?>">
					<div class="form-group">
						<label>Full names</label>
						<input type="text" name="fullname"  class="form-control" id="firstname" value= "<?php echo $my_guest['fullname']; ?>">
						
						<!-- <span class="error firstname_error text-danger">Invalid name, only characters allowed</span> -->
					</div>

					<div class="form-group">
						<label>Phone number</label>
						<input type="number" name="phone_number"  class="form-control" id="firstname" value = "<?php echo $my_guest['phone_number']; ?>">
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="email" name="email_address" class="form-control" value= "<?php echo $my_guest['email_address']; ?>">
					</div>
					<div class="form-group">
						<label>Country of residence</label>
						<input type="text" name="country" class="form-control" value= "<?php echo $my_guest['country']; ?>">
					</div>
					<button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>&nbsp<button class="btn btn-sm btn-danger" type="reset">Reset</button>
			</form>
		</div>
		<!---->



	 </div>

</body>
</html>
