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
	<title>Guests</title>
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

		<!--Guests List-->
		<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 700px;">
			<h4 class="w3-text white">Guests</h4>
			<a href="addguest.php" style="float: right;">
				<p>Add Guest</p>
			</a>
			<table>
				<tr>
					<th>ID</th>
					<th>Full name</th>
					<th>Email</th>
					<th>Phone number</th>
					<th>Country</th>
					<th>More</th>
				</tr>
				<!--Populating the table-->
				<?php 
					include("db_connect.php");
					$guests = "SELECT * FROM guests";
					$select = mysqli_query($connect, $guests);
					$count = mysqli_num_rows($select);
					if ($count>0){
						while($guest = mysqli_fetch_assoc($select)){
							?>
							<tr>
								<td><?php echo $guest['ID']; ?></td>
								<td><?php echo $guest['fullname']; ?></td>
								<td><?php echo $guest['email_address']; ?></td>
								<td><?php echo $guest['phone_number']; ?></td>
								<td><?php echo $guest['country']; ?></td>

								<td>
									<a href="editguest.php?guest_id=<?php echo $guest['ID']; ?>">
										<button class="btn btn-sm btn-primary">Edit</button>
									</a>
								</td>
								<td>
									<a href="delete_guest.php?guest_id=<?php echo $guest['ID']; ?>">
										<button class="btn btn-sm btn-danger">delete</button>
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

</body>
</html>
