<?php
require "dbconnection.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = trim($_POST['username']);

    $password = trim($_POST['password']);

} else {

    die('not getted');

}


$getQuery = "SELECT * FROM `admin` WHERE `email`='$email' and `password`='$password' ;";

$result = mysqli_query($connection, $getQuery);



$userData = mysqli_fetch_array($result);
if (!$userData) {
header("location:adminLogin.html");
	}


$user=$userData['adminId'];
$_SESSION['user'] = $user;


header("location: adminDashbaod.php");
?>