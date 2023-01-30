<?php
//-----------------------------------------------------------//
					// Connexion à la bdd 
//-----------------------------------------------------------//
$mysqlClient = null;
try{
	$mysqlClient = new PDO('mysql:host=localhost;dbname=neptune;charset=utf8', 'root', 'root');
	// Activation des erreurs PDO
	$mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
	$mysqlClient->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
 } 
 catch(PDOException $e) {
	 die('Erreur : ' . $e->getMessage());
 }