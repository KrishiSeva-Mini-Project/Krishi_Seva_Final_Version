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
  
  <script>
  </script>
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
  
  <section>
  
  
  
    <center>
	<div style=" width:30%;">
		<h2> Book Your Slot</h2>
		
		<form class="contact-form" action="slotBooking.php" method="POST" onsubmit="return confirm('Do you really want to submit ?');">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Subject" name="subject">
						
					</div>
										<div class="form-group">
						<input type="date" class="form-control" placeholder="Choose date" name="date" min="<?php echo date("Y-m-d"); ?>" >
						
					</div>
										<div class="form-group">
						
		
						<select name="time"  class="form-control" placeholder="Select time">
								 <option value="9AM-10AM">9AM - 10AM</option>
							 <option value="10AM-11AM">10AM - 11AM</option>
							  <option value="11AM-12PM">11AM - 12PM</option>
							<option value="12PM-1PM">12PM - 1PM</option>
							 <option value="1PM-2PM">1PM - 2PM</option>
							 <option value="2PM-3PM">2PM - 3PM</option>
							 <option value="3PM-4PM">3PM - 4PM</option>
							 <option value="4PM-5PM">4PM - 5PM</option>
							 <option value="5PM-6PM">5PM - 6PM</option>
							 <option value="6PM-7PM">6PM - 7PM</option>
							 
							 <option value="9AM-10AM">9AM - 10AM</option>
							 <option value="10AM-11AM">10AM - 11AM</option>
						
									</select>
					</div>
										<div class="form-group">
										
						<textarea class="form-control" rows="4" placeholder="Your Message" name ="details"></textarea>
						
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		
	</div>
	</center>
	</section>

 
<section>
<div class="col-12">

            <div class="panel panel-primary">

                <div class="panel-heading">

                    <h3> Slot Booking Details</h3>

                </div>
<br>

                    <table class="table table-bordered">

                      <thead class="thead-dark" style="background: #2e6fa7; color: white;">

                        <tr>

                          <th scope="col">#</th>

                        

                          <th scope="col">Subject</th>

                          
						  
						  <th scope="col">Date</th>
						  
                          <th scope="col">Time</th>
							<th scope="col">Meeting Link</th>
                          <th scope="col">Details</th>

                          <th scope="col">Status</th>
						  
							
                        </tr>

                      </thead>

                      <tbody>

                        <?php $count = 0; ?>

                        <?php 
						$user_id=$_SESSION['user'];
							$tQuery ="SELECT  *  FROM `slotBook` where `farmer_id`='$user_id' ;" ;
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
								    <td>
									<a href="<?php echo $row['ZoomLink'];?>" target="_blank"><?php echo substr($row['ZoomLink'], 0,50); ?></a>
									</td>
								  
                              <td><?php echo substr($row['details'], 0,50); ?></td>

                             
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