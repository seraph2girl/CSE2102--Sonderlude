<?php

require_once "includes/connection.php";

$query=mysqli_query($link,"SELECT id FROM users");
$row=mysqli_fetch_array($query);

if ($row!=""){

  // Initialize the session
  session_start();

  // Check if the user is logged in, if not then redirect them to login page
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
     header("location: includes/login.php");
     exit;
 }


 if($_SESSION["position"] == 'Administrator'){
   header("Location:includes/pages/administrator_page.php");

 }elseif($_SESSION["position"] == 'Departments'){
   header("Location:includes/pages/departments_page.php");

 }elseif($_SESSION["position"] == 'Reception') {
   header("Location:includes/pages/reception_page.php");

 }elseif($_SESSION["position"] == "Ministry Personnel"){
   header("Location:includes/pages/ministry_personnel_page.php");

 }elseif($_SESSION["position"] == "Service Directorate"){
   header("Location:includes/pages/service_directorate_page.php");

 }elseif($_SESSION["position"] == "Civilian Directorate") {
   header("Location:includes/pages/civilian_directorate_page.php");
 }

}

else{
  header("Location:includes/register_initial.php");
}

?>
