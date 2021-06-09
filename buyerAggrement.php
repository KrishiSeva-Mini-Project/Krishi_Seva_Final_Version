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
        <a class="nav-link" href="buyerDashboad.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="buyerPurchase.php">Orders</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="buyerAggrement.php">Agreement</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="buyerAggrementHistory.php">AgreementHistory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logOut.php">LogOut</a>
      </li>
    </ul>
  </div>
</nav>
  </section>
  
   

  
<!--  Items list -->
<section>
	<div class="container">
			<h1 class="text-center" style="text-decoration: underline;">Farmers</h1>
	<br><br>
		<!--<form class="contact-form" action="buyerAggrement.php" method="POST">
		<div class="input-group">
  <input type="search"  name ="farmer" class="form-control rounded" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" />
  <button  name="search" class="btn btn-outline-primary">search</button>
</div>
		</form-->
		<br><br><br> 
		
		<div class="row ">
		  <?php 
						$user_id=$_SESSION['user'];
					
						
							$tQuery ="SELECT * FROM `farmer_details` ;" ;
							$getResult = mysqli_query($connection,$tQuery);
							if($getResult){	
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
    <div class="col-4">
	
   
	
    <div class="card" style="width:350px">
  <div class="card-body">
    <h4 class="card-title text-center"><?php echo $row['first_Name']." ".$row['last_Name']; ?></h4>
    
    	<table class="table">
  <thead>
  <?php 
  $farmer_id=$row['farmer_id'];
  $query="SELECT * FROM `famerdetails` WHERE `farmer_id`='$farmer_id';";
  $result=mysqli_query($connection,$query);
  $row1=mysqli_fetch_array($result);
  
  ?>
    <tr>
      <th scope="col">SoilRating</th>
      <th scope="col"><?php echo $row1['soilRating']; ?></th>
      
    </tr>
    <tr>
      <th scope="col">CropRating</th>
      <th scope="col"><?php echo $row1['cropRating']; ?></th>
      
    </tr>
  </thead>
  <tbody>
	<tr>
      <th scope="row">Mobile</th>
      <td><?php echo $row['phone_number']; ?></td>
    
    </tr>
  
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $row['Address']; ?></td>
    
    </tr>
    
    <tr>
      <th scope="row">Economics Cond.</th>
      <td><?php echo $row1['Economic']; ?></td>
     
    </tr>
	 <tr>
      <th scope="row">Experience</th>
      <td><?php echo $row1['experience']; ?></td>
     
    </tr>
  </tbody>
</table>
   <form class="contact-form" action="buyerAggrementReq.php" method="POST" onsubmit="return confirm('Do you really want to submit ?');">	
  
					 <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="farmer_id" value="<?php echo $row['farmer_id'];?>"  required>
	
    <label class="form-check-label" for="exampleCheck1">Want to agreement with <?php echo $row['first_Name']." ".$row['last_Name']; ?></label>
  </div>
  <br>
					
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
  	
  
	</div>
  </div>
   
   
   
    </div>
    
     <?php
							
							}
							
							}
							
?>
   
    
  </div>
				
			
			
			
			
			
		
			
		
	</div>
</section>
 

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
