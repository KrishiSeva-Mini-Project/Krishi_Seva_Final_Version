<?php require "dbconnection.php";?>


<?php 
if(!isset($_SESSION['user'])) 
   header("location:../index.html");
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
        <a class="nav-link" href="adminDashbaod.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultantRequest.php">consultantRequest</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="farmerVeriyfy.php">farmerVerify</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="adminAggrement.php">Agreement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logOut.php">LogOut</a>
      </li>
    </ul>
  </div>
</nav>
  </section>
  
   <!-- famer Details-->
   
<h1 style="text-align: center;">Farmers Details for verify</h1>

<section>
<div class="container">

	
	<br>
	
	<?php 
		$tQuery1 ="SELECT  *  FROM `famerdetails` where `Status`='Pending';" ;
							$getResult1 = mysqli_query($connection,$tQuery1);
								
							while($row1=mysqli_fetch_array($getResult1)){
								
							
						
	
	?>
  <hr>
             
             <br><br>
  <table class="table table-striped">
  
  <?php 			
			$farmer_id=$row1['farmer_id'];
	
							
							
							
							$tQuery ="SELECT  *  FROM `farmer_details` where `farmer_id`='$farmer_id' ;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							$row=mysqli_fetch_array($getResult);
	?>
    <thead>
	<h3 style="text-align: center;">Personal Details</h3>
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
	 <tr> <td></td><th><h3 style="text-align: center;">Farming Details</h3><th></tr>
	  <tr>
        <td>Phosphorus</td>
        <td> <?php echo $row1['phosphorus'];?></td>
		        <td>Potassium</td>
        <td> <?php echo $row1['potassium'];?></td>
		
      </tr>
	  <tr>
        <td>Calcium</td>
        <td> <?php echo $row1['calcium'];?></td>
		        <td>Magnesium</td>
        <td> <?php echo $row1['magnesium'];?></td>
		
      </tr>
	  <tr>
        <td>Nitrogen</td>
        <td> <?php echo $row1['nitrogen'];?></td>
		        <td>Sulphur</td>
        <td> <?php echo $row1['sulphur'];?></td>
		
      </tr>
	   <tr>
        <td>Mositure Level</td>
        <td><?php echo $row1['mositureLevel'];?></td>
       
      </tr>
	  <tr>
        <td>Climate</td>
        <td><?php echo $row1['climate'];?></td>
       
      </tr>
	  <tr>
        <td>Soil pH</td>
        <td><?php echo $row1['soilpH'];?></td>
       
      </tr>
	  <tr>
        <td>Water Source</td>
        <td><?php echo $row1['waterSource'];?></td>
       
      </tr>
	  <tr>
        <td>Labour</td>
        <td><?php echo $row1['labour'];?></td>
       
      </tr>
	   <tr>
        <td>Economic Condition</td>
        <td><?php echo $row1['Economic'];?></td>
       
      </tr>
	  <tr>
        <td>Soil Type</td>
        <td><?php echo $row1['soilType'];?></td>
       
      </tr>
	  <tr>
        <td>Technology Use</td>
        <td><?php echo $row1['technology'];?></td>
       
      </tr><tr>
        <td>Experience</td>
        <td><?php echo $row1['experience'];?></td>
       
      </tr>
	  <tr>
        <td>Certificate</td>
        <td><a href="../file/<?php echo $row1['file']; ?>" download="<?php echo $row['file']; ?>"><button class="btn btn-sm btn-primary">Download</button></a> </td>
       
      </tr>
	  
	   <tr>
        <td>Action</td>
        <td> 
		<a  href="farmerVerifying.php?utcid=<?php echo $row1['id']; ?>" onclick="return confirm('Do you really want to Cancel ?');"><button class="btn btn-sm btn-danger">Cancel</button></a> 
									 <a  href="farmerVerifying.php?utaid=<?php echo $row1['id']; ?>" onclick="return confirm('Do you really want to Verify ?');"><button class="btn btn-sm btn-primary">Verify</button></a> 
                              

</td>
		<td> </td>
       
      </tr>
       
    </tbody>
  </table>
							<?php }?>
</div>
	


</section>

  
 

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
