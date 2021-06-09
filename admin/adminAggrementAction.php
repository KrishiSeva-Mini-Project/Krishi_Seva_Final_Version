<?php require "dbconnection.php";?>


<?php 
if(!isset($_SESSION['user'])) 
   header("location:index.html");
?>

<?php
$attached = null;
if (isset($_FILES["file"])) {
	




    $attached = md5(random_bytes(35));
    $filename = $_FILES["file"]["name"];
    $extention = explode(".", $filename)[count(explode(".", $filename)) - 1];
    $attached .= ".".$extention;
    move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ ."/file/$attached");
	
	
}
$id=$_REQUEST['utcid'];
$status="Approved";
$query2="UPDATE `aggrement` SET `adminStatus`='$status', `file`='$attached'  WHERE `id`='$id'";
$result2=mysqli_query($connection,$query2);
header("location: adminAggrement.php");

?>
