<?php require "dbconnection.php";?>


<?php 
if(!isset($_SESSION['user'])) 
   header("location:index.html");
?>
<?php

$buyer_id=$_SESSION['user'];
$query1="SELECT * FROM `buyer` WHERE `buyer_id`='$buyer_id'";
$result1=mysqli_query($connection,$query1);
  $row1=mysqli_fetch_array($result1);
$buyerName=$row1['name'];
$farmer_id=$_POST['farmer_id'];
$query2="SELECT * FROM `farmer_details`  WHERE `farmer_id`='$farmer_id'";
$result2=mysqli_query($connection,$query2);
  $row2=mysqli_fetch_array($result2);

$famerName=$row2['first_Name']." ".$row2['last_Name'];
$statusBuyer="Applied";
$statusFarmer="pending";
$statusAdmin="Pending";
$query3 ="INSERT INTO `aggrement`( `buyerId`, `farmerId`, `buyerName`, `farmerName`, `buyerStatus`, `farmerStatus`, `buyerDate`, `adminStatus`) VALUES ('$buyer_id','$farmer_id','$buyerName','$famerName','$statusBuyer','$statusFarmer',CURRENT_TIMESTAMP,'$statusAdmin')";
$result3=mysqli_query($connection,$query3);

	
header("location: buyerAggrement.php");
	?>