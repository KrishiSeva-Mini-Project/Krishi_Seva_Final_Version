<?php



require "dbconnection.php";





//Protecting Pages

//if (!isset($_SESSION['user'])) {

  //  header("location: index.html");

//}

session_destroy();

header("location:index.html");