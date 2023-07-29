<?php
include 'includes/db.php';
include 'connexion.php';
$id_p=$_GET['id'];
$sql = "SELECT * FROM `users`WHERE $id_p=`ID`;";
$resultat = $conn->query($sql);
if ($resultat->num_rows > 0) {
  while($row = $resultat->fetch_assoc()) {
     $test=$row["Level"];
  }
}
if($test==1){
        $req="UPDATE `users` 
            SET `Level` = 2 WHERE $id_p=`ID`";

      if ($conn->query($req) == TRUE) {
        header("location:admin.php");
      } else {
        echo "Erreur: " . $req . "<br>" . $conn->error;
      }
      $conn->close();
}else if($test==2){
  $req="UPDATE `users` 
            SET `Level` = 1 WHERE $id_p=`ID`";

      if ($conn->query($req) == TRUE) {
        header("location:admin.php");
      } else {
        echo "Erreur: " . $req . "<br>" . $conn->error;
      }
      $conn->close();
}
?>