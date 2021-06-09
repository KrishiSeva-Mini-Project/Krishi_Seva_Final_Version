<?php

require "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
	
	
    
	$phone=$_POST['mob'];
	
	$email = $_POST['email'];
		

$address = $_POST['add'];



    $password = $_POST['password_1'];

    $confirm_password = $_POST['password_2'];
	$petName = $_POST['petname'];




    if (empty($name) or empty($email) or empty($password) or empty($confirm_password)) {

        die("All field's are compulsory.");

    }

    if ($password != $confirm_password) {

        die("Password did not matched.");

    }

    if (!stripos($email, '@')) {

        die("Invalid email address.");

    }

}

else {

    die('error');

}



$insertQuery = "INSERT INTO `buyer`( `name`, `email`, `password`, `phone`, `address`, `petName`) VALUES ('$name','$email','$password','$phone','$address','$petName')";

if(mysqli_query($connection, $insertQuery)){



header("location: index.html");
}
else{
	die("not insert");
}


?>