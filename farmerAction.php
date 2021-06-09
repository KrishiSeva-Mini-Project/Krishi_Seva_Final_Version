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
	$orderId = $_REQUEST["utcid"];
	$status="Cancelled";
	$query2="UPDATE `orders` SET `status`='$status' WHERE `orderId`='$orderId'";
$result2=mysqli_query($connection,$query2);
header("location: farmerSell.php");
}

else{
	$orderId = $_REQUEST["utaid"];
	$status="Accepted";
	$query2="UPDATE `orders` SET `status`='$status' WHERE `orderId`='$orderId'";
$result2=mysqli_query($connection,$query2);
header("location: farmerSell.php");
	
}
?>