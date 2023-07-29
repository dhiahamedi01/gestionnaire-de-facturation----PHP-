<?php
$nomserveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$bd="muhasabe";
// Création d'une connexion
$conn = new mysqli($nomserveur, $utilisateur,
                   $motdepasse,$bd);
// vérification de la connexion
if ($conn->connect_error) {
  die("Echec de connexion: " . $conn->connect_error);
}
//echo "Connexion avec succès";
?>