<?php
include 'includes/db.php';
include 'connexion.php';
$id_p=$_GET['id'];
$sql = "SELECT * FROM `caisse`WHERE $id_p=`ID`;";
$resultat = $conn->query($sql);
if ($resultat->num_rows > 0) {
  while($row = $resultat->fetch_assoc()) {
     $test=$row["Type"];
  }
}
if($test==1){
        $req="UPDATE `caisse` 
            SET `Type` = 2 WHERE $id_p=`ID`";

      if ($conn->query($req) == TRUE) {
        header("location:boite_affiche.php");
      } else {
        echo "Erreur: " . $req . "<br>" . $conn->error;
      }
      $conn->close();
}else if($test==2){
  $req="UPDATE `caisse` 
            SET `Type` = 1 WHERE $id_p=`ID`";

      if ($conn->query($req) == TRUE) {
        header("location:boite_affiche.php");
      } else {
        echo "Erreur: " . $req . "<br>" . $conn->error;
      }
      $conn->close();
}
?>