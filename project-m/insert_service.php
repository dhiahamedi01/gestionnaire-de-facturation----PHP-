<?php
include 'includes/db.php';
include 'includes/authentication.php';
if(isset($_POST['create'])){
  $nom= $_POST['nom'];
  $service= $_POST['service'];
  $prix   = $_POST['prix'];
  $sql = "INSERT INTO `services` (`ID`, `sname`, `sprovider`, `sprice`) VALUES (NULL,'$nom','$service','$prix');";
  $result = mysqli_query($conn,$sql);
  header("location:service.php");
}
?>