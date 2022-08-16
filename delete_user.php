<?php
include("db_connect.php");
$id=$_GET["user_id"];
$del_sql="DELETE * FROM users WHERE ID='$id'";
$delete=mysqli_query($connect,$sdel_ql);
if($delete){
	echo '<script>alert("customer record deleted sucessfully");history.back();</script>';
}else{
	echo '<script>alert("unable to delete customer record");history.back();</script>';
}
?>