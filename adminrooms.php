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

		<!--List of rooms-->
		<div style="margin-top: 100px;">
			<!--<div class="w3-content well" style="margin-top: 100px; background-color: white; max-width: 700px;">-->
			<h4 class="w3-text white">Rooms</h4>
			<a href="addroom.php" style="float: right; margin-top: -20px;">
				<p>Add Room</p>
			</a>
			<div class="row w3-row padding">
				<?php
					//fethcing the rooms
					include("db_connect.php");
					$admin_rooms = "SELECT * FROM rooms";
					$selectrooms= mysqli_query($connect, $admin_rooms);
					$countrooms = mysqli_num_rows($selectrooms);
					if($countrooms>0){
						while($admin_room = mysqli_fetch_assoc($selectrooms)){
							?>
							<div class="col-lg-3">
								<img src="static/images/pic2.jpg" height="250px" width="405px" alt="room-image">
								<p>Room <?php echo $admin_room['ID']; ?></p>
								<p><?php echo $admin_room['type']; ?></p>
								<p>£ <?php echo $admin_room['price']; ?></p>
								<!--link to edit the room by the admin-->
								<div style="margin-top: -10px;">
									<a href="editroom.php?adminroom_id=<?php echo $admin_room['ID']; ?>">
										<button class="btn btn-ms btn-primary">Edit</button>
									</a>&nbsp
									<a href="delete_room.php?room_id=<?php echo $admin_room['ID']; ?>">
										<button class="btn btn-ms btn-danger">Delete</button>
									</a>
								</div>
							</div>
							<?php
						}
					}

				?>
			<!--</div>-->	
		</div>
		
		<!---->



	 </div>

</body>
</html>
