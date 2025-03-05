<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php

         // connexion à la base de données
          include_once "connexion.php";
         // on récupère le id dans le lien
          $id = $_GET['id'];
          // requête pour afficher les infos d'un client
          $req = mysqli_query($con , "SELECT * FROM Client WHERE id = $id");
          $row = mysqli_fetch_assoc($req);


       // vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           // extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           // vérifier que tous les champs ont été remplis
           if (isset($nom) && isset($prenom) && isset($email) && isset($modele) && isset($immatriculation) && isset($entreesortie) && isset($prestation)){
               // requête de modification
               $req = mysqli_query($con, "UPDATE client SET nom = '$nom' , prenom = '$prenom' , email = '$email', modele = '$modele', immatriculation = '$immatriculation', entreesortie = '$entreesortie', prestation = '$prestation' WHERE id = $id");
                if($req){// si la requête a été effectuée avec succès , rediriger vers la page d'accueil
                    header("location: index.php");
                }else {// si non
                    $message = "Client non modifié";
                }

           }else {
               // si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier le client : <?=$row['nom']?> </h2>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">

            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">

            <label>Email</label>
            <input type="text" name="email" value="<?=$row['email']?>">

            <label>Modèle</label>
            <input type="text" name="modele" value="<?=$row['modele']?>">

            <label>Immatriculation</label>
            <input type="text" name="immatriculation" value="<?=$row['immatriculation']?>">

            <label>Entrée / Sortie</label>
            <input type="text" name="entreesortie" value="<?=$row['entreesortie']?>">

            <label>Prestation</label>
            <input type="text" name="prestation" value="<?=$row['prestation']?>">

            <input type="submit" value="Modifier" name="button">
        </form>

    </div>

</body>

</html>
