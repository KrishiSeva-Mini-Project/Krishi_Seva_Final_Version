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
$buyeraddress=$_POST['address'];
$buyerQuantity=$_POST['quantity'];
$buyerDate=$_POST['buyerDate'];
$order_id=$_POST['order_id'];
$buyerPhone=$row1['phone'];

$status="pending";
$query2="UPDATE `orders` SET `buyer_id`='$buyer_id',`buyerName`='$buyerName',`phone`='$buyerPhone',`buyerAddress`='$buyeraddress',`buyerQuantity`='$buyerQuantity',`buyerDate`='$buyerDate',`status`='$status' WHERE `orderId`='$order_id'";
$result2=mysqli_query($connection,$query2);

	header("location: buyerDashboad.php");

	?>