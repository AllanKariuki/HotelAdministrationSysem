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
	<title>Bookings Page</title>
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

		<!--List of bookings-->
		<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 900px;">
			<table>
				<tr>
					<th>ID</th>
					<th>Room Number</th>
					<th>Room type</th>
					<th>Guest Name</th>
					<th>Email</th>
					<th>Check-in</th>
					<th>Check-out</th>
					<!-- <th>More</th> -->
				</tr>
				<?php
					include("db_connect.php");
					$bks_sql = "SELECT * FROM bookings";
					$bks_select = mysqli_query($connect, $bks_sql);
					$bks_count = mysqli_num_rows($bks_select);
					if($bks_count> 0){
						while($booking = mysqli_fetch_assoc($bks_select)){
							?>
							<tr>
								<td><?php echo $booking['ID']; ?></td>
								<td><?php echo $booking['room_id']; ?></td>
								<td><?php echo $booking['type']; ?></td>
								<td><?php echo $booking['guest_name']; ?></td>
								<td><?php echo $booking['email']; ?></td>
								<td><?php echo $booking['check_in']; ?></td>
								<td><?php echo $booking['check_out']; ?></td>
								<td><?php echo $booking['status']; ?></td>
								
							</tr>
							<?php
						}
					}
				?>
			</table>
		</div>
		<!---->



	 </div>

</body>
</html>
