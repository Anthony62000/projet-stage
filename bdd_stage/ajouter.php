<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Client</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
       // vérifier que le bouton "ajouter" a bien été cliqué
       if(isset($_POST['button'])){
           // extraction des informations envoyées dans les variables par la methode POST
           // "POST" = transmet les infos du formulaire de manière masquée 
           extract($_POST);
           // vérifier que tous les champs ont été remplis
           if (isset($nom) && isset($prenom) && isset($email) && isset($modele) && isset($immatriculation) && isset($entreesortie) && isset($prestation)){
                // connexion à la base de données
                include_once "connexion.php";
                // requête d'ajout
                $req = mysqli_query($con , "INSERT INTO Client VALUES(NULL, '$nom', '$prenom','$email', '$modele', '$immatriculation', '$entreesortie', '$prestation')");
                if($req){// si la requête a été effectuée avec succès , rediriger vers la page d'accueil
                    header("location: index.php");
                }else {// si non
                    $message = "Client non ajouté";
                }

           }else {
               // si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Coordonnées du client / véhicule</h2>
        <p class="erreur_message">
            <?php 
            // si la variable "message" existe, afficher son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>

        <form action="" method="POST">

            <label>Nom</label>
            <input type="text" name="nom">

            <label>Prénom</label>
            <input type="text" name="prenom">

            <label>Email</label>
            <input type="text" name="email">

            <label>Modèle</label>
            <input type="text" name="modele">

            <label>Immatriculation</label>
            <input type="text" name="immatriculation">

            <label>Entrée / Sortie</label>
            <input type="text" name="entreesortie">

            <label>Prestation</label>
            <input type="text" name="prestation">
            
            <input type="submit" value="Ajouter" name="button">

        </form>

    </div>

</body>

</html>
