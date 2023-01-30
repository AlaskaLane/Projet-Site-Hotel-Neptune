<?php 
session_start();
error_reporting(E_ALL); // activer tous les niveaux de rapport d'erreur
ini_set('display_errors', 'on');
require 'bdd.php';

//Récupéaration propre des variables AVANT de les utiliser
$email = !empty($_SESSION['user']['email']) ? trim($_SESSION['user']['email']) : NULL;

if ($email){
	$sql = 'SELECT * FROM password WHERE email= :email';
	$stmt = $mysqlClient->prepare($sql);
	$stmt->execute(['email' => $email]); //
	$loggedUser = $stmt->fetch();
	$_SESSION['LOGGED_IN'] = true;
}

/*
if(!empty($_SESSION)){
  $sqlQuery = 'SELECT * FROM password WHERE email =:email';
  $pswStmt = $mysqlClient->prepare($sqlQuery ); //prépare la requête en évitant les injonctions sql
  $pswStmt->execute(['email' => $_SESSION['user']]); //vérifie si l'utiisateur existe bien
  $user = $pswStmt->fetch(); 
}
?>*/