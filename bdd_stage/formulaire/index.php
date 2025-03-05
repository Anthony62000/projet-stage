<?php 
 // démarreage de la session en priorité
   session_start() ;
  if(isset($_POST['bouton-valider'])){ // Si on clique sur le bouton , alors :
    // verifier les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['mdp'])) { // on verifie si l'utilisateur a rentré des informations
      // mettre l'email et le mot de passe dans des variables
      $email = $_POST['email'] ;
      $mdp = $_POST['mdp'] ;
      $erreur = "" ;
       // verifier si les informations entrées sont correctes
       // connexion a la base de données
       $nom_serveur = "localhost";
       $utilisateur = "root";
       $mot_de_passe = "";
       $nom_base_données = "form" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       // requete pour selectionner l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp ='$mdp' ") ;
        $num_ligne = mysqli_num_rows($req) ;// compter le nombre de lignes en rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:bienvenu.php") ;// si le nombre de ligne est > 0 , on sera redirigé vers la page de bienvenue
            // création d'une variable de type session qui va contenir l'email de l'utilisateur
            $_SESSION['email'] = $email ;
        }else {// si non
            $erreur = "Adresse Mail ou Mot de Passe incorrectes !";
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <section>
       <h1>Connexion</h1>

       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>

       <form action="" method="POST">  <!--on ne met plus rien au niveau de l'action , pour pouvoir envoyer les données dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="email">
           <label >Mots de Passe</label>
           <input type="password" name="mdp">
           <input type="submit" value="Valider" name="bouton-valider">
       </form>
   </section> 

</body>

</html>
