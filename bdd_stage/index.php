<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Clients</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Modèle</th>
                <th>Immatriculation</th>
                <th>Prestation</th>
                <th>Entrée / Sortie</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>

            <?php 
                // inclure la page de connexion
                include_once "connexion.php";
                // requête pour afficher la liste des clients
                $req = mysqli_query($con , "SELECT * FROM client");
                if(mysqli_num_rows($req) == 0){
                    // s'il n'existe pas de clients dans la base de données, alors on affiche ce message :
                    echo "Il n'y a pas encore de clients ajoutés !" ;
                    
                }else {
                    // si non , afficher la liste de tous les clients
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['modele']?></td>
                            <td><?=$row['immatriculation']?></td>
                            <td><?=$row['prestation']?></td>
                            <td><?=$row['entreesortie']?></td>
                            <!-- mettre l'id de chaque client dans ces liens -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>    
         
        </table>   
   
    </div>

</body>

</html>
