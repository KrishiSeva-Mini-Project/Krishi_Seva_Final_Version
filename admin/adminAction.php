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
	$status="Cancelled";
	$query2="UPDATE `slotbook` SET `status`='$status' WHERE `slot_id`='$slot_id'";
$result2=mysqli_query($connection,$query2);
header("location: consultantRequest.php");
}

else{
	$slot_id = $_REQUEST["utaid"];
	$status="Accepted";
	$query2="UPDATE `slotbook` SET `status`='$status' WHERE `slot_id`='$slot_id'";
$result2=mysqli_query($connection,$query2);
header("location: consultantRequest.php");
	
}
?>