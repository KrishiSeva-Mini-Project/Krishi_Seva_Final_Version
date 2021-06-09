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
			<h1 class="text-center" style="text-decoration: underline;">Items</h1>
	<br><br>
		<form class="contact-form" action="buyerDashboad.php" method="POST">
		<div class="input-group">
  <input type="search"  name ="item" class="form-control rounded" placeholder="Search" aria-label="Search"
    aria-describedby="search-addon" />
  <button  name="search" class="btn btn-outline-primary">search</button>
</div>
		</form>
		<br><br><br>
		
		<div class="row ">
		  <?php  
		  $user_id=$_SESSION['user'];

		  if(!isset($_POST['search'])){
						
							$tQuery ="SELECT  *  FROM `orders ;" ;
		  }
		  else{
			  $item=$_POST['item'];
			  if($item==""){
				  $tQuery ="SELECT  *  FROM `orders ;" ;
			  }
			  else{
			  
			  	$tQuery ="SELECT  *  FROM `orders` where `cropName` like '%$item%';" ;
			  }
		  }
		
							$getResult = mysqli_query($connection,$tQuery);
								if($getResult){
							
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
    <div class="col-4">
	
   
	
    <div class="card" style="width:350px">
  <img class="card-img-top" src="file/img/<?php echo $row['image']; ?>" alt="Card image">
  <div class="card-body">
    <h4 class="card-title text-center"><?php echo $row['cropName']; ?></h4>
    
    	<table class="table">
  <thead>
  <?php 
  $farmer_id=$row['farmer_id'];
  $query="SELECT * FROM `famerdetails` WHERE `farmer_id`='$farmer_id';";
  $result=mysqli_query($connection,$query);
  $row1=mysqli_fetch_array($result);
  
  ?>
    <tr>
      <th scope="col">SoilRaing</th>
      <th scope="col"><?php echo $row1['soilRating']; ?></th>
      
    </tr>
    <tr>
      <th scope="col">cropRaing</th>
      <th scope="col"><?php echo $row1['cropRating']; ?></th>
      
    </tr>
  </thead>
  <tbody>
	<tr>
      <th scope="row">Farmer</th>
      <td><?php echo $row['farmerName']; ?></td>
    
    </tr>
  
    <tr>
      <th scope="row">Price</th>
      <td><?php echo $row['Price']; ?></td>
    
    </tr>
    
    <tr>
      <th scope="row">QuantityAvl.(in Kg)</th>
      <td><?php echo $row['Quantity']; ?></td>
     
    </tr>
  </tbody>
</table>
   <form class="contact-form" action="buyerRequest.php" method="POST" onsubmit="return confirm('Do you really want to submit ?');">	
   <div class="form-group">
		<input type="text" class="form-control" placeholder="Quantity" name="quantity" required>
						
					</div>
										<div class="form-group">
						<input type="text" class="form-control" placeholder="Address" name="address" required>
						
					</div>
					<div class="form-group">
						<input type="date" class="form-control" placeholder="Date" name="buyerDate" min="<?php echo date("Y-m-d"); ?>" required>
						
					</div>
					 <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="order_id" value="<?php echo $row['orderId'];?>"  required>
	
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
