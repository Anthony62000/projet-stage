<?php 
// démarrage de la session sur sur cette page 
session_start() ;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    // affichage du contenu de la variable session
    echo "<p class ='message'> Bonjour " .  $_SESSION['email'] . "</p>";
    // diriger vers la base de données en cas de connexion réussie
    header("Location: http://127.0.0.2/index.php") ;
    ?>

</body>

</html>
