<?php
include 'includes/db.php';
include 'includes/authentication.php';
if(isset($_POST['create'])){
  $nusername= $_POST['username'];
  $npassword= $_POST['password'];
  $nlevel   = $_POST['level'];
  $sql = "INSERT INTO `users` (`ID`, `Username`, `Password`, `Level`) VALUES (NULL,'$nusername','$npassword','$nlevel');";
  $result = mysqli_query($conn,$sql);
  header("location:add_user.php");
}
?>