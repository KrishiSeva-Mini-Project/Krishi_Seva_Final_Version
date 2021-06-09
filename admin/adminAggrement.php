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

  
<!--  Items list -->

<section>
<div class="col-12">

            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h3 class="text-center" style="text-decoration: underline;"> Request of Agreement Approval</h3>

                </div>
<br>

                    <table class="table table-bordered">

                      <thead class="thead-dark" style="background: #2e6fa7; color: white;">

                        <tr>

                          <th scope="col">#</th>

                        

                          <th scope="col">BuyerName</th>

                         
						  
						  <th scope="col">BuyerStatus</th>
						  
                          <th scope="col">BuyerDate</th>
						  

						  <th scope="col">FarmerName</th>
						  
						  <th scope="col">FarmerStatus</th>
						  
                          <th scope="col">FarmerDate</th>
										
                          
										
                          <th scope="col">Your Status</th>
						  
						   <th scope="col">Action</th>
                        </tr>

                      </thead>

                      <tbody>

                        <?php $count = 0; ?>

                        <?php 
						$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `aggrement`;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
							
                            <?php                             

                                $count++;
                             ?>

                           
                            <tr>

                              <th scope="row"><?php echo $count; ?></th>
							  
								<?php
								
								?>
                              <td><?php echo $row['buyerName']; ?></td>
							 
							    
								 
								  
								  
                              <td><?php echo $row['buyerStatus']; ?></td>

                             
                              <td><?php echo $row['buyerDate']; ?></td>
							   
							   <td><?php echo $row['farmerName']; ?></td>
							 
							    
								 
								  
								  
                              <td><?php echo $row['farmerStatus']; ?></td>

                             
                              <td><?php echo $row['farmerDate']; ?></td>
								  

                                 <td><?php echo $row['adminStatus']; ?></td>

                           

                                  
								
							  
							<td>

                               
<form class="contact-form" action="adminAggrementAction.php?utcid=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                           

<br>
 	  	 	  	<div class="custom-file">
  <input type="file" name="file" class="custom-file-input" id="customFile" required>
  <label class="custom-file-label" for="customFile">Upload Certificate</label>
  
</div>
<br><br>
<?php
if($row['farmerStatus']=="Accepted"){?>


  <button type="submit" class="btn btn-primary">Submit</button>                                
<?php 
}
?>								
                                  </form>

                                    
                              


                              
							  
</td>
                            </tr>

							<?php
							
							}
							?>

                      </tbody>

                    </table>

                </div>

            </div>

        </div>

</section>

 

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
