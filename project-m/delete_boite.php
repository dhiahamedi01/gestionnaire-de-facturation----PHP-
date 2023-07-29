<?php
include 'includes/db.php';
include 'connexion.php';
$id_p=$_GET['id'];
$userid= mysqli_real_escape_string($conn, $_POST['userid']);
              $queryd= "DELETE FROM caisse WHERE ID='$id_p';";
              $del= mysqli_query ($conn,$queryd);
              header("location:boite_affiche.php");

?>