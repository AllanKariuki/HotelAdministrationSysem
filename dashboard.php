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
	<title>Rooms Page</title>
	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="static/css/w3v3.css">
	<link rel="stylesheet" type="text/css" href="static/css/css/css/fontawesome-all.css">
	<link rel="stylesheet" type="text/css" href="static/css/qaforumstyles.css">
	<link rel="stylesheet" type="text/css" href="static/styles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="static/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="static/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="static/js/validations.js"></script>
	<style type="text/css">
				th{
				    height: 30px;
				    width: 100px;
				}
				tr{
				    height: 50px;
				}
	</style>
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
		<div style="margin-top: 100px;">

			<h3>Welcome</h3>

			<!--List of rooms-->
			<!-- <div class="w3-content well" style="background-color: white; max-width: 700px;"> -->
				<h4 class="w3-text white">Available rooms</h4>
				<div class="row w3-row-padding">
					<?php
						//fethcing the rooms
						include("db_connect.php");
						$rooms = "SELECT * FROM rooms";
						$select_rooms= mysqli_query($connect, $rooms);
						$count_rooms = mysqli_num_rows($select_rooms);
						if($count_rooms>0){
							while($room = mysqli_fetch_assoc($select_rooms)){
								?>
								<div class="col-lg-3">
									<img src="static/pic1.jpg" height="250px" width="405px" alt="room-image">
									<h5>Number: <?php echo $room['ID']; ?></h5>
									<h5>Type: <?php echo $room['type']; ?></h5>
									<p>?? <?php echo $room['price']; ?></p>
									<a href="book.php?rm_id=<?php echo $room['ID']; ?>">
										<button class="btn btn-ms btn-primary">Book Now</button>
									</a>
								</div>
								<?php
							}
						}

					?>
					
				</div>
			<!-- </div> -->
			<!---->

			<!--List of bookings-->
			<div class="w3-content well" style=" background-color: white; max-width: 900px;">
				<table>
					<tr>
						<th>Room ID</th>
						<th>Room type</th>
						<th>Guest Name</th>
						<th>Email</th>
						<th>Check-in</th>
						<th>Check-out</th>
						<th>Status</th>
						<th>More</th>
					</tr>
					<?php
						include("db_connect.php");
						$bkings_sql = "SELECT * FROM bookings";
						$bk_select = mysqli_query($connect, $bkings_sql);
						$bk_count = mysqli_num_rows($bk_select);
						if($bk_count> 0){
							while($bookings = mysqli_fetch_assoc($bk_select)){
								?>
								<tr>
									<td><?php echo $bookings['room_id']; ?></td>
									<td><?php echo $bookings['type']; ?></td>
									<td><?php echo $bookings['guest_name']; ?></td>
									<td><?php echo $bookings['email']; ?></td>
									<td><?php echo $bookings['check_in']; ?></td>
									<td><?php echo $bookings['check_out']; ?></td>
									<td><?php echo $bookings['status']; ?></td>
									<td>
										<a href="editbooking.php?booking_id=<?php echo $bookings['ID']; ?>">
											<button class="btn btn-sm btn-primary">Edit</button>
										</a>&nbsp
										<a href="delete_booking.php?booking_id=<?php echo $bookings['ID']; ?>">
											<button class="btn btn-sm btn-danger">Delete</button>
										</a>
									</td>
								</tr>
								<?php
							}
						}
					?>
				</table>
			</div>
			<!---->

		</div>

	 </div>

</body>
</html>
