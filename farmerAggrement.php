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

  
<!--  Items list -->

<section>
<div class="col-12">

            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h3 class="text-center" style="text-decoration: underline;"> Request of Agreement</h3>

                </div>
<br>

                    <table class="table table-bordered">

                      <thead class="thead-dark" style="background: #2e6fa7; color: white;">

                        <tr>

                          <th scope="col">#</th>

                        

                          <th scope="col">BuyerName</th>

                          <th scope="col">Buyer Address</th>
						  <th scope="col">Buyer phone</th>
						  
						  <th scope="col">BuyerStatus</th>
						  
                          <th scope="col">BuyerDate</th>

                          <th scope="col">Admin Status</th>
										
                          <th scope="col">Your Status</th>
						  
						  <th scope="col">file</th>
							
							<th scope="col">Action</th>
                        </tr>

                      </thead>

                      <tbody>

                        <?php $count = 0; ?>

                        <?php 
						$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `aggrement` where `farmerId`='$user_id' ;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
							
                            <?php                             

                                $count++;
                             ?>

                           
                            <tr>

                              <th scope="row"><?php echo $count; ?></th>
							  
								<?php
								$buyer_id=$row['buyerId'];
								$subquery="SELECT * from `buyer` where `buyer_id`='$buyer_id'";
								
								$result=mysqli_query($connection,$subquery);
								$row1=mysqli_fetch_array($result);
								?>
                              <td><?php echo $row['buyerName']; ?></td>
							   <td><?php echo $row1['address']; ?></td>
							   <td><?php echo $row1['phone']; ?></td>
							    
								 
								  
								  
                              <td><?php echo $row['buyerStatus']; ?></td>

                             
                              <td><?php echo $row['buyerDate']; ?></td>
								  

                                 <td><?php echo $row['adminStatus']; ?></td>

                           

                                    <td><?php echo $row['farmerStatus']; ?></td>
									
							 

<td>					
			<?php 
			if($row['file']=="NA"){
				echo "NA";
			}
			else{
				
			?>
			<a href="admin/file/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>"><button class="btn btn-sm btn-primary">Download</button></a> 
			<?php } ?>	
	</td>
							<td>

                               

                           

                                  
								<?php 
								if($row['farmerStatus']=="pending"){
									
								
								
								?>
                                  

                                    <a  href="farmerAggrementAction.php?utcid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Cancel ?');"><button class="btn btn-sm btn-danger">Cancel</button></a> 
									 <a  href="farmerAggrementAction.php?utaid=<?php echo $row['id']; ?>" onclick="return confirm('Do you really want to Accept ?');"><button class="btn btn-sm btn-primary">Accept</button></a> 
                              

<?php

								}
?>
                              
							  
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
