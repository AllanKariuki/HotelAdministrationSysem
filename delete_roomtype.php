<?php
include("db_connect.php");
$id=$_GET["roomtype_id"];
$rtd_sql="DELETE * FROM roomtypes WHERE ID='$id'";
$delete2=mysqli_query($connect,rtd_sql);
if($delete2){
	echo '<script>alert("customer record deleted sucessfully");history.back();</script>';
}else{
	echo '<script>alert("unable to delete customer record");history.back();</script>';
}
?>