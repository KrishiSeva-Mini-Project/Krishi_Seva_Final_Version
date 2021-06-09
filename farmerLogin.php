<?php
require "dbconnection.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = trim($_POST['username']);

    $password = trim($_POST['password']);

} else {

    die('not getted');

}


$getQuery = "SELECT * FROM `farmer_details` WHERE `email_address`='$email' and `password`='$password' ;";

$result = mysqli_query($connection, $getQuery);



$userData = mysqli_fetch_array($result);

   
	if($userData==null){
		?>
		<script>
		alert("Wrong id and Password");
		</script>
		
		<?php
		header("location: farmerDetailForm.php");
	}
	else{
		$user=$userData['farmer_id'];
$_SESSION['user'] = $user;


	header("location: farmerDetailForm.php");
	}




?>