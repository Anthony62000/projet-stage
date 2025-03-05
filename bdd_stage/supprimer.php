<?php
  // connexion a la base de données
  include_once "connexion.php";
  // récupération de l'id dans le lien
  $id= $_GET['id'];
  // requête de suppression
  $req = mysqli_query($con , "DELETE FROM client WHERE id = $id");
  // rediriger vers la page d'accueil
  header("Location:index.php")
?>
