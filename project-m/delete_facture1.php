<?php
include 'includes/db.php';
include 'connexion.php';
$id_p=$_GET['id'];
$userid= mysqli_real_escape_string($conn, $_POST['userid']);
              $queryd= "DELETE FROM accounting WHERE ID='$id_p';";
              $del= mysqli_query ($conn,$queryd);
              header("location:caisse1.php");

?>