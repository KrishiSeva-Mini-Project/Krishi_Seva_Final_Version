<?php require "dbconnection.php";?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$message=$_POST['message'];
		
			 
			
			 
		 
		 $quertinsert="INSERT INTO `contact`(`name`, `mobile`, `email`, `message`) VALUES  ('$name','$mobile','$email','$message')";
		 $result=mysqli_query($connection, $quertinsert);
		 header("location: index.html");
		 
}
?>