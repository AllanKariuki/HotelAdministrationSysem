<?php
include("db_connect.php");
$res_id=$_GET["reservation_id"];
$res_sql="DELETE * FROM bookings WHERE ID='$res_id'";
$delete3=mysqli_query($connect,$res_sql);
if($delete3){
	echo '<script>alert("customer record deleted sucessfully");history.back();</script>';
}else{
	echo '<script>alert("unable to delete customer record");history.back();</script>';
}
?>