<?php
require "dbconnection.php";
?>

<?php 
if(!isset($_SESSION['user'])) 
   header("location:index.html");
?>


<?php
if(isset($_REQUEST['utcid']))

{
	$slot_id = $_REQUEST["utcid"];
	$status="Rejected";
	$query2="UPDATE `famerdetails` SET `status`='$status' WHERE `id`='$slot_id'";
$result2=mysqli_query($connection,$query2);
header("location: farmerVeriyfy.php");
}

else{
	$slot_id = $_REQUEST["utaid"];
	$status="Verified";
	$query2="UPDATE `famerdetails` SET `status`='$status' WHERE `id`='$slot_id'";
$result2=mysqli_query($connection,$query2);
header("location: farmerVeriyfy.php");
	
}
?>