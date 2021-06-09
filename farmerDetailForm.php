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
  
  <?php 
  $userId=$_SESSION['user'];
$getQuery = "SELECT count(*) as 'count' FROM `famerdetails` WHERE `id`= '$userId';";

$result = mysqli_query($connection, $getQuery);



$userData = mysqli_fetch_array($result);
  
  if($userData['count']>0){
  ?>
  <div class="jumbotron ">
                <div class="container">
                    <h1 class="display-4">Congratulation</h1>
                    <p class="lead">You have already submitted.</p>
                </div>
            </div>
  <?php }else{
	  ?>
 
 <div class="jumbotron bg-danger">
                <div class="container">
                    <h1 class="display-4">Not Submitted</h1>
                    <p class="lead">Please Fill Details First.</p>
                </div>
            </div>
<?php }
  
  ?>
<!--  Details filling form-->
  <section id="detailsForm">
<div class="container">
  	<h1 class="text-center" style="text-decoration: underline;"> Fill Details</h1>
	  	
 	  	<br><br>
  	  	<form class="contact-form" action="farmerDetailfilling.php" method="POST" enctype="multipart/form-data">
  	  	<h2>Minerals Details</h2>
  	  	 <div class="row mt-4">
    <div class="col">
      <input type="number" class="form-control" name="phosphorus" placeholder="phosphorus(P)" required>
    </div>
    <div class="col">
      <input type="number" class="form-control" name="potassium" placeholder="potassium(K)" required>
    </div>
  </div>
 	  	 <div class="row mt-2">
    <div class="col">
      <input type="number" class="form-control" name="calcium" placeholder="calcium(Ca)" required>
    </div>
    <div class="col">
      <input type="number" class="form-control" name="magnesium" placeholder="magnesium(Mg)"required>
    </div>
  </div>
  	  	
  	  	 <div class="row mt-2">
    <div class="col">
      <input type="number" class="form-control" name="nitrogen" placeholder="Nitrogen(N)" required>
    </div>
    <div class="col">
      <input type="number" class="form-control" name="sulphur" placeholder="Sulphur(S)" required>
    </div>
  </div>
 	<br>
 	  	<h2>Mositure Level</h2>
 	  	<br>
  	  	<select class="form-select form-control" aria-label="Default select example" name="mositureLevel" required>
  
  <option value="medium">Medium</option>
  <option value="low">Low</option>
  <option value="high">High</option>
</select>
  	  	<br>
  	  	<h2>Climate</h2><br>
  	  	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="High Rainfall" id="defaultCheck1" name="highRainfall">
  <label class="form-check-label" for="defaultCheck1">
    High Rainfall
  </label>
			</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="High Temperature" id="defaultCheck1" name="highTemp">
  <label class="form-check-label" for="defaultCheck1">
    High Temperature
  </label>
			</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="High Wind Velocity" id="defaultCheck1" name="highwind">
  <label class="form-check-label" for="defaultCheck1">
    High Wind Velocity
  </label>
			</div>
  	  	<br>
  	  	<h2> Soil pH</h2>
  	  	<br>
  	  	<input type="number" class="form-control" name="soilpH" placeholder="Soil pH" required>
  	  	<br>
  	  	
  <br>
  	  	<h2> Water Source</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="waterSource" id="exampleRadios1" value="Dam" required>
  <label class="form-check-label" for="exampleRadios1">
   Dam
  </label>
</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="waterSource" id="exampleRadios1" value="Adequte Rainfall" >
  <label class="form-check-label" for="exampleRadios1">
   Adequte Rainfall
  </label>
</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="waterSource" id="exampleRadios1" value="PumpSet" >
  <label class="form-check-label" for="exampleRadios1">
   PumpSet
  </label>
</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="waterSource" id="exampleRadios1" value="Not Enough" >
  <label class="form-check-label" for="exampleRadios1">
   Not Enough
  </label>
</div>
  	  	<br>
  	  	<h2>Labour Availability</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="labour" id="exampleRadios1" value="Yes" required>
  <label class="form-check-label" for="exampleRadios1">
   Yes
  </label>
</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="labour" id="exampleRadios1" value="No" >
  <label class="form-check-label" for="exampleRadios1">
   No
  </label>
</div>
  	 <br>
 	  	<h2>Economic Conditions</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="Economic" id="exampleRadios1" value="Good" required>
  <label class="form-check-label" for="exampleRadios1">
   Good
  </label>
</div>
 		<div class="form-check">
  <input class="form-check-input" type="radio" name="Economic" id="exampleRadios1" value="Average" >
  <label class="form-check-label" for="exampleRadios1">
   Average
  </label>
</div>
 	 	<div class="form-check">
  <input class="form-check-input" type="radio" name="Economic" id="exampleRadios1" value="Poor" >
  <label class="form-check-label" for="exampleRadios1">
   Poor
  </label>
</div>
  	 <br>
 	  	 
  	  	<h2> Crop Type</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="cropType" id="exampleRadios1" value="pulse" required>
  <label class="form-check-label" for="exampleRadios1">
  Pulse
  </label>
</div>
 	  		<div class="form-check">
  <input class="form-check-input" type="radio" name="cropType" id="exampleRadios1" value="wheat" >
  <label class="form-check-label" for="exampleRadios1">
  Wheat
  </label>
</div>
  	  		<div class="form-check">
  <input class="form-check-input" type="radio" name="cropType" id="exampleRadios1" value="vegetables" >
  <label class="form-check-label" for="exampleRadios1">
  Vegetable
  </label>
</div>
  	  	<br>
  	  	
  	  	<br>
 	  	 
  	  	<h2> Soil Type</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="soilType" id="exampleRadios1" value="loamSoil" required>
  <label class="form-check-label" for="exampleRadios1">
  Loam Soil
  </label>
</div>
	  		<div class="form-check">
  <input class="form-check-input" type="radio" name="soilType" id="exampleRadios1" value="chalkSoil" >
  <label class="form-check-label" for="exampleRadios1">
  Chalk Soil
  </label>
</div>
	  		<div class="form-check">
  <input class="form-check-input" type="radio" name="soilType" id="exampleRadios1" value="peatSoil">
  <label class="form-check-label" for="exampleRadios1">
  Peat Soil
  </label>
			</div>
 	  		<br>
 	  		
  	  	<h2>Use Technology and Gadget</h2>
  	  	<br>
  	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="technology" id="exampleRadios1" value="Yes" required>
  <label class="form-check-label" for="exampleRadios1">
   Yes
  </label>
</div>
 	  	<div class="form-check">
  <input class="form-check-input" type="radio" name="technology" id="exampleRadios1" value="No" >
  <label class="form-check-label" for="exampleRadios1">
   No
  </label>
</div>
  	 <br>
	 
  	  	<h2> Experience</h2>
  	  	<br>
  	  	<input type="number" class="form-control" name="experience" placeholder="Experience(Year)" required>
  	  	<br>
 	  	
 	  	<h2>Upload Certificate</h2>
<br>
 	  	 	  	<div class="custom-file">
  <input type="file" name="file" class="custom-file-input" id="customFile" required>
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
  	  	<br><br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 </div>
  </section>
  
  
  

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
