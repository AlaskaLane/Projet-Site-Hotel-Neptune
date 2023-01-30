<?php
include 'session.php';
require 'bdd.php';
//-----------------------------------------------------------//
// Validation du formulaire
//-----------------------------------------------------------//
//Récupéaration propre des variables AVANT de les utiliser
// pour ça, tu peux utilisr l'écriture ternaire (sorte de if/else)
$email = !empty($_POST['email']) ? trim($_POST['email']) : NULL;
$pswd = !empty($_POST['pswd']) ? trim($_POST['pswd']) : NULL;

/*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorMessage = "Veuillez entrer une adresse email valide.";
  $_SESSION['error'] = $errorMessage;
  header("Location: connexion.php");
  exit;
}
else{*/
  if ($email && $pswd) {
    //-----------------------------------------------------------//
    // On récupère les infos de l'utilisateur en fonction de son email  
    //-----------------------------------------------------------//
    $sql = 'SELECT * FROM password WHERE email =:email';
    $stmt = $mysqlClient->prepare($sql ); //prépare la requête en évitant les injonctions sql
    $stmt->execute(['email' => $email]); //vérifie si l'utiisateur existe bien
    $user = $stmt->fetch(); // ajoute les résultats de la colonne au tableau $user
    
    if(isset($user['pswd'])){
    $bddPswd = $user['pswd']; // NB : On ne doit pas stocker le mot de passe en clair dans la bdd... il faut le "crypter" ( renseignes toi sur les fonctions password_hash et password_verify
    if (password_verify($pswd, $bddPswd)){
      $_SESSION['user'] = ['email'=>$user['email'],'id'=>$user['id']];
      header("Location:index.php");
      exit;
    } else {
      $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
        $email
      );
      $_SESSION['error']=$errorMessage; 
      echo $errorMessage;
      exit;
      header("Location:connexion.php");
    }  
    }
    else{
    include 'navbar.php';
    $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier, réessayez');
    $_SESSION['error']=$errorMessage;
    header("Location:connexion.php");
    }
  }
  else{
    include 'navbar.php';
    $errorMessage = sprintf('Il manque des information pour vous identifier, réessayez');
    $_SESSION['error']=$errorMessage;
    header("Location:connexion.php");
  }
//}
?>