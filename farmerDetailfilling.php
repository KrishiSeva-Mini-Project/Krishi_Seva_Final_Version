<?php require "dbconnection.php";?>
<?php


$phosphorus= $_POST['phosphorus'];
$potassium=$_POST['potassium'];
$calcium=$_POST['calcium'];
$magnesium= $_POST['magnesium'];
$nitrogen= $_POST['nitrogen'];
$sulphur= $_POST['sulphur'];

$mositureLevel= $_POST['mositureLevel'];
$highRainfall= " ";
$highTemp=" ";
$highwind=" ";





if (isset($_POST['highTemp'])) {
   $highTemp=$_POST['highTemp'];
}
if (isset($_POST['highwind'])) {
  $highwind=$_POST['highwind'];
}
if (isset($_POST['highRainfall'])) {
 $highRainfall= $_POST['highRainfall'];
}
$climate= $highRainfall." ".$highTemp." ".$highwind;
$soilpH=$_POST['soilpH'];
$waterSource=$_POST['waterSource'];
$labour=$_POST['labour'];
$Economic=$_POST['Economic'];
$cropType= $_POST['cropType'];
$soilType=$_POST['soilType'];
$technology=$_POST['technology'];
$experience=$_POST['experience'];

$soilRating=0;
$cropRating=0;


// different crop and different soil rating and nutrition check

if($cropType=="pulse"){
	if($soilType=="loamSoil"){
		$soilRating=$soilRating+2;
		
	}else{
		$soilRating=$soilRating+1;
		
	}
	if($nitrogen>=85 && $nitrogen<=95 && $phosphorus>=5 && $phosphorus<=15 && $potassium >=45 && $potassium<= 55 && $sulphur>=5 && $sulphur<=15){
						$soilRating=$soilRating+3;
	}
	else if($nitrogen>=85 && $nitrogen<=95 && $phosphorus>=5 && $phosphorus<=15 || $nitrogen>=85 && $nitrogen<=95 && $potassium >=45 && $potassium<= 55 || $nitrogen>=85 && $nitrogen<=95 && $sulphur>=5 && $sulphur<=15 )
	{$soilRating=$soilRating+2;
}
else if( $nitrogen>=85 && $nitrogen<=95 || $phosphorus>=5 && $phosphorus<=15 || $potassium >=45 && $potassium<= 55 || $sulphur>=5 && $sulphur<=15){
	$soilRating=$soilRating+1;
}

}
else if($cropType=="wheat"){
	if($soilType=="loamSoil"){
		$soilRating=$soilRating+2;
		
	}else{
		$soilRating=$soilRating+1;
		
	}
	if($nitrogen>=95 && $nitrogen<=105 && $phosphorus>=15 && $phosphorus<=25 && $potassium >=55 && $potassium<= 65){
						$soilRating=$soilRating+3;
	}
	else if($nitrogen>=95 && $nitrogen<=105 && $phosphorus>=15 && $phosphorus<=25 || $nitrogen>=95 && $nitrogen<=105 && $potassium >=55 && $potassium<= 65  )
	{$soilRating=$soilRating+2;
}
else if( $nitrogen>=95 && $nitrogen<=105 || $phosphorus>=15 && $phosphorus<=25 || $potassium >=55 && $potassium<= 65){
	$soilRating=$soilRating+1;
}

}
else{
	if($soilType=="loamSoil"){
		$soilRating=$soilRating+2;
		
	}else{
		$soilRating=$soilRating+1;
		
	}
	if($nitrogen>=75 && $nitrogen<=85 && $phosphorus>=25 && $phosphorus<=35 && $potassium >=120 && $potassium<= 125 && $sulphur>=12 && $sulphur<=20){
						$soilRating=$soilRating+3;
	}
	else if($nitrogen>=75 && $nitrogen<=85 && $phosphorus>=25 && $phosphorus<=35 || $nitrogen>=75 && $nitrogen<=85 && $potassium >=120 && $potassium<= 125 || $nitrogen>=75 && $nitrogen<=85 && $sulphur>=12 && $sulphur<=20 )
	{$soilRating=$soilRating+2;
}
else if($nitrogen>=75 && $nitrogen<=85 || $phosphorus>=25 && $phosphorus<=35 || $potassium >=120 && $potassium<= 125 || $sulphur>=12 && $sulphur<=20 ){
	$soilRating=$soilRating+1;
}
}
// Moisture level 

if($mositureLevel=="medium"){
	$soilRating=$soilRating+2;
}
else{
	$soilRating=$soilRating+1;
}

// soil pH

if($soilpH>=6 && $soilpH<=7){
	$soilRating=$soilRating+2;
	
}
else if($soilpH>=5 && $soilpH<=8){
	
	$soilRating=$soilRating+1;

}
// climate change

if($highTemp==" " && $highRainfall==" " && $highwind==" "){
		$soilRating=$soilRating+1;
}

echo"$soilRating";

//water sources

if($waterSource!="Not Enough"){
	$cropRating=$cropRating+1;
	
}

//Labour Availability
if($labour=="Yes"){
	$cropRating=$cropRating+1;
}

//Economic Condition
if($Economic=="Good"){
$cropRating=$cropRating+1;	
}else if($Economic=="Average"){
	$cropRating=$cropRating+0.5;
}

//use of technology

if($technology=="Yes"){
	$cropRating=$cropRating+1;
}

//Experience

if($experience>=5){
	$cropRating=$cropRating+1;
}
else if($experience>=3){
	$cropRating=$cropRating+.5;
}
echo "$cropRating";

$cropRating=$cropRating+ $soilRating/2 ;
echo "$cropRating";


//file certificate

$attached = null;
if (isset($_FILES["file"])) {
	




    $attached = md5(random_bytes(35));
    $filename = $_FILES["file"]["name"];
    $extention = explode(".", $filename)[count(explode(".", $filename)) - 1];
    $attached .= ".".$extention;
    move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ ."/file/$attached");
	
	
}
$famer_id=$_SESSION['user'];
$getQuery = "INSERT INTO `famerdetails`(`farmer_id`, `phosphorus`, `potassium`, `calcium`, `magnesium`, `nitrogen`, `sulphur`, `mositureLevel`, `climate`, `soilpH`, `waterSource`, `labour`, `Economic`, `cropType`, `soilType`, `technology`, `experience`, `file`, `soilRating`, `cropRating`) VALUES ('$famer_id','$phosphorus','$potassium','$calcium','$magnesium','$nitrogen','$sulphur','$mositureLevel','$climate','$soilpH','$waterSource','$labour','$Economic','$cropType','$soilType','$technology','$experience','$attached','$soilRating','$cropRating') ;";

$result = mysqli_query($connection, $getQuery);


header("location: farmerDashboad.php");
?>