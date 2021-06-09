<?php require "dbconnection.php";?>


<?php 
if(!isset($_SESSION['user'])) 
   header("location:index.html");
?>

<?php
$cropName=$_POST['cropName'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

$attached = null;
if (isset($_FILES["file"])) {
	




    $attached = md5(random_bytes(35));
    $filename = $_FILES["file"]["name"];
    $extention = explode(".", $filename)[count(explode(".", $filename)) - 1];
    $attached .= ".".$extention;
    move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ ."/file/img/$attached");
	
	
}

$farmer_id=$_SESSION['user'];
$query="SELECT * FROM `farmer_details` WHERE `farmer_id`='$farmer_id'";
$result1 = mysqli_query($connection, $query);
$row=mysqli_fetch_array($result1);
$farmerName=$row['first_Name']." ".$row['last_Name'];

$getQuery="INSERT INTO `orders`(`farmer_id`,`farmerName`,`cropName`, `Quantity`, `Price`, `image`) VALUES ('$farmer_id','$farmerName','$cropName','$quantity','$price','$attached')";
$result = mysqli_query($connection, $getQuery);


header("location: farmerSell.php");

?>