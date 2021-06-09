<?php
require "dbconnection.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = trim($_POST['username']);

    $password = trim($_POST['password']);

} else {

    die('not getted');

}


$getQuery = "SELECT * FROM `buyer` WHERE `email`='$email' and `password`='$password' ;";

$result = mysqli_query($connection, $getQuery);



$userData = mysqli_fetch_array($result);
if (!$userData) {
header("location:farmerLogin.html");
	}


$user=$userData['buyer_id'];
$_SESSION['user'] = $user;


header("location: buyerDashboad.php");
?>