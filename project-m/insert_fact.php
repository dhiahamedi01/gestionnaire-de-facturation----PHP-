<?php
session_start();
include 'includes/db.php';
include 'includes/authentication.php';
if(isset($_POST['create'])){
  $Client= $_POST['Client'];
  $sprovider= $_POST['sprovider'];
  $gender   = $_POST['gender'];
  $_SESSION['sprovider']=$sprovider;	
  $_SESSION['Client']=$Client;	
  $_SESSION['gender']=$gender;	

  //$sql = "INSERT INTO `accounting` (`ID`, `Customer`, `Supplier`, `Collector`) VALUES (NULL,'$Client','$sprovider','$gender');";
  //$result = mysqli_query($conn,$sql);
  header('location:facture_next.php');

}
?>
