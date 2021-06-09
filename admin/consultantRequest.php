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
  <!-- Request-->
  
  
  
<section>
<div class="col-12">

            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h3 style="text-align: center;"> Farmer Request Details</h3>

                </div>
<br>

                    <table class="table table-bordered">

                      <thead class="thead-dark" style="background: #2e6fa7; color: white;">

                        <tr>

                          <th scope="col">#</th>

                        

                          <th scope="col">Subject</th>

                          
						  
						  <th scope="col">Date</th>
						  
                          <th scope="col">Time</th>

                          <th scope="col">Details</th>

                          <th scope="col">Status</th>
						  <th scope="col">Action</th>
							
                        </tr>

                      </thead>

                      <tbody>

                        <?php $count = 0; ?>

                        <?php 
						$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `slotBook` ;" ;
							$getResult = mysqli_query($connection,$tQuery);
								
							while($row=mysqli_fetch_array($getResult)){
								
							
							?>
							
                            <?php                             

                                $count++;
                             ?>

                           
                            <tr>

                              <th scope="row"><?php echo $count; ?></th>

                              <td><?php echo $row['subject']; ?></td>
							   <td><?php echo $row['date']; ?></td>
							    
								 <td><?php echo $row['time']; ?></td>
								  
								  
                              <td><?php echo substr($row['details'], 0,50); ?></td>

                             
                              <td><?php echo $row['status']; ?></td>
								  

                               

                           
<td>

                               

                           

                                  
								
                                  <?php 
								  if($row['status']=="Pending"){?>

                                    <a  href="adminAction.php?utcid=<?php echo $row['slot_id']; ?>"  onclick="return confirm('Do you really want to Cancel ?');"><button class="btn btn-sm btn-danger">Cancel</button></a> 
									 <a  href="adminAction.php?utaid=<?php echo $row['slot_id']; ?>" onclick="return confirm('Do you really want to Accept ?');"><button class="btn btn-sm btn-primary">Accept</button></a> 
                              

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
