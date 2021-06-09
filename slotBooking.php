<?php 
require "dbconnection.php";

if(!isset($_SESSION['user'])){ 
   header("location:index.html");
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
	$date=$_POST['date'];
	$time=$_POST['time'];
	$subject=$_POST['subject'];
	$details=$_POST['details'];
	$query="select * from `slotBook` where `date`='$date' and `time`='$time' ";
	$result=mysqli_query($connection,$query);
		if($result){
			$num=mysqli_num_rows($result);
			
		if($num==0){
			
		$user_id=$_SESSION['user'];
		 $query="SELECT * FROM `farmer_details` WHERE `farmer_id`='$user_id'";
		 $result=mysqli_query($connection,$query);
		
			$row=mysqli_fetch_array($result);
			$uname=$row['first_Name'];
			$phone=$row['phone_number'];
			$email=$row['email_address'];	
			 
			
			 
		 
		 $quertinsert="INSERT INTO `slotbook`( `farmer_id`, `subject`, `date`, `time`, `details`) VALUES ('$user_id','$subject','$date','$time','$details')";
		 $result=mysqli_query($connection, $quertinsert);
?>
			<script type="text/javascript">
				//alert("congratulation");
				window.open('consultant.php','_self');
			</script>
	<?php		
		
		}
		
		else{
			?>
			<script type="text/javascript">
				alert("Sorry slot is already booked");
				window.open('consultant.php','_self');
				</script>
	<?php
		}
		
		}
	else{
	die("worng input 1");
}
}
else{
	die("worng input 1");
}

?>