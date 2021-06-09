<?php

require "dbconnection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = $_POST['fn'];
	
	$lastName=$_POST['ln'];
    
	$phone=$_POST['mob'];
	
	$email = $_POST['email'];
		$dob = $_POST['dob'];
$totalLand = $_POST['toland'];

$address = $_POST['add'];
$typeFarming = $_POST['type_farming'];


    $password = $_POST['password_1'];

    $confirm_password = $_POST['password_2'];
	$petName = $_POST['petname'];




    if (empty($firstName) or empty($email) or empty($password) or empty($confirm_password)) {

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



$insertQuery = "INSERT INTO `farmer_details`(`first_Name`, `last_Name`, `phone_number`, `email_address`, `password`, `nick_Name`, `dob`, `existing_Land_Area`, `Address`, `organic_Farming`) VALUES ('$firstName','$lastName','$phone','$email','$password','$petName','$dob','$totalLand','$address','$typeFarming')";

if(mysqli_query($connection, $insertQuery)){



header("location: index.html");
}
else{
	die("not insert");
}


?>