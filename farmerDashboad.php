<?php require "dbconnection.php";?>


<?php 
if(!isset($_SESSION['user'])) 
   header("location:index.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Krishi Seva</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navigation bar -->
  <section id="nav-bar">
  
  <nav class="navbar navbar-expand-md bg-light navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="image/logo.png">Krishi Seva</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">

    <ul class="navbar-nav ml-auto" >
	<li class="nav-item">
        <a class="nav-link active " href="farmerDetailForm.php">DetailsForm</a>
      </li>
	
	<li class="nav-item">
        <a class="nav-link" href="farmerDashboad.php">Home</a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="farmerSell.php">Sell</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultant.php">Consultant</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="farmerAggrement.php">Agreement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logOut.php">LogOut</a>
      </li>
    </ul>
  </div>
</nav>
  </section>
  

 
  <!-- Detail of farmer -->
<section>
<div class="container">
	<h1 style="text-align: center;"> Welcome!</h1>
	<div class="container">
	<br>
	<?php 
	$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `farmer_details` where `farmer_id`='$user_id' ;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							$row=mysqli_fetch_array($getResult);
	?>
  <h3 style="text-align: center;">Your Details</h3>
             
             <br><br>
  <table class="table table-striped">
  
  <?php 
	$user_id=$_SESSION['user'];
							$tQuery1 ="SELECT  *  FROM `famerdetails` where `farmer_id`='$user_id' ;" ;
							$getResult1 = mysqli_query($connection,$tQuery1);
								
							$row1=mysqli_fetch_array($getResult1);
	?>
    <thead>
      <tr class="table-primary">
        <th>Soil Rating</th>
        <th><?php echo $row1['soilRating'];?></th>
        <th><?php echo $row1['Status'];?></th>
      </tr>
      <tr class="table-primary">
        <th>Crop Rating</th>
        <th><?php echo $row1['cropRating'];?></th>
        <th><?php echo $row1['Status'];?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Name :</td>
        <td><?php echo $row['first_Name']." ".$row['last_Name'];?></td>
       
      </tr>
      
       <tr>
        <td>Mobile :</td>
        <td> <?php echo $row['phone_number'];?></td>
       
      </tr>
       <tr>
        <td>Email Id :</td>
        <td><?php echo $row['email_address'];?></td>
       
      </tr>
       <tr>
        <td>Date Of Birth :</td>
        <td><?php echo $row['dob'];?></td>
       
      </tr>
       <tr>
        <td>Land Area</td>
        <td><?php echo $row['existing_Land_Area'];?></td>
       
      </tr>
       <tr>
        <td>Address</td>
        <td> <?php echo $row['Address'];?></td>
       
      </tr>
       
    </tbody>
  </table>
</div>
	
</div>

</section>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
