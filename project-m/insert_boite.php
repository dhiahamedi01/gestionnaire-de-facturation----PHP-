<?php
include 'includes/db.php';
if(isset($_POST['create'])){
  $Customer= $_POST['Customer'];
  $type= $_POST['type'];
  $prix= $_POST['prix'];
  $Obser   = $_POST['Obser'];
  $sql = "INSERT INTO `caisse` (`ID`, `Type`, `Customer`, `Amount`, `Notes`) VALUES (NULL,'$type','$Customer','$prix','$Obser');";
  $result = mysqli_query($conn,$sql);
  header("location:boite.php");
} if(isset($_POST['affiche'])){
  header("location:boite_affiche.php");
}
?>