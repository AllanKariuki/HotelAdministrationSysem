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
	<title>Users</title>
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
				        </li>  
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
		<!--Users List-->
		<div class="w3-content well" style="background-color: white; max-width: 700px;">
			<h4 class="w3-text white">Users</h4>
			<a href="addroomtypes.php" style="float: right;">
				<p>Add RoomType</p>
			</a>

			<table>
				<tr>
					<th>ID</th>
					<th>Type</th>
				</tr>
				<!--Populating the table-->
				<?php 
					include("db_connect.php");
					$rtypes = "SELECT * FROM roomtypes";
					$select_rtype = mysqli_query($connect, $rtypes);
					$count_rtype = mysqli_num_rows($select_rtype);
					if ($count_rtype>0){
						while($rtype = mysqli_fetch_assoc($select_rtype)){
							?>
							<tr>
								<td><?php echo $rtype['type']; ?></td>
								
								<td>
									<a href="editroomtype.php?roomtype_id=<?php echo $rtype['ID']; ?>">
										<button class="btn btn-sm btn-primary">Edit</button>
									</a>
								</td>
								<td>
									<a href="delete_roomtype.php?roomtype_id=<?php echo $user['ID']; ?>">
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
