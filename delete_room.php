<?php
include("db_connect.php");
$rmid=$_GET["room_id"];
$rmsql="DELETE * FROM customers WHERE ID='$rmid'";
$delete4=mysqli_query($connect,$rmsql);
if($delete4){
	echo '<script>alert("customer record deleted sucessfully");history.back();</script>';
}else{
	echo '<script>alert("unable to delete customer record");history.back();</script>';
}
?>