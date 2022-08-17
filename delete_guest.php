<?php
include("db_connect.php");
$ges_id=$_GET["guest_id"];
$ges_sql="DELETE * FROM guests WHERE ID='$ges_id'";
$delete5=mysqli_query($connect,$ges_sql);
if($delete5){
	echo '<script>alert("customer record deleted sucessfully");history.back();</script>';
}else{
	echo '<script>alert("unable to delete customer record");history.back();</script>';
}
?>