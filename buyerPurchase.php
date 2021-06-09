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
  
 
 <!-- Orders -->

<section>
<div class="col-12">

            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h3 class="text-center" style="text-decoration: underline;"> History of Orders</h3>

                </div>
<br>

                    <table class="table table-bordered">

                      <thead class="thead-dark" style="background: #2e6fa7; color: white;">

                        <tr>

                          <th scope="col">#</th>

                        

                          <th scope="col">Crop</th>

                          
						  
						  <th scope="col">FarmerName</th>
						  
                          <th scope="col">Total Quantity</th>

                          <th scope="col">Buyer Quantity</th>
										 <th scope="col">Price</th>
										  <th scope="col">Date</th>
                          <th scope="col">Buyer Address</th>
						  <th scope="col">Buyer phone</th>
						  
							<th scope="col">Status</th>
							
                        </tr>

                      </thead>

                      <tbody>

                        <?php $count = 0; ?>

                        <?php 
						$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `orders` where `buyer_id`='$user_id' ;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
							
                            <?php                             

                                $count++;
                             ?>

                           
                            <tr>

                              <th scope="row"><?php echo $count; ?></th>

                              <td><?php echo $row['cropName']; ?></td>
							   <td><?php echo $row['farmerName']; ?></td>
							    
								 <td><?php echo $row['Quantity']; ?></td>
								  
								  
                              <td><?php echo $row['buyerQuantity']; ?></td>

                             
                              <td><?php echo $row['Price']; ?></td>
								  

                                 <td><?php echo $row['buyerDate']; ?></td>

                           

                                    <td><?php echo $row['buyerAddress']; ?></td>
								
									  <td><?php echo $row['phone']; ?></td>

									  <td><?php echo $row['status']; ?></td>
							  
							
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
