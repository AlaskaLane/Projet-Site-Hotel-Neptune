<?php
session_start:
require_once "../bdd.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_POST['id_reservation']!= NULL)
{
$id = $_POST['id_reservation'];
// Requête SQL pour récupérer les données des réservations
$sqlQuery = "UPDATE reservations
SET trip_start = :trip_start, trip_end = :trip_end, nbrpers = :nbrpers, email_client = :email_client, id_reservation = :id_reservation
WHERE id_reservation = '$id'";

$stmt = $mysqlClient->prepare($sqlQuery);
$stmt->execute(array(
  ':trip_start'=> $_POST['trip_start'],
  ':trip_end'=> $_POST['trip_end'],
  ':nbrpers'=> $_POST['nbrpers'],
  ':email_client'=> $_POST['email'],
  ':id_reservation'=> $id
));
$sqlQuery = "UPDATE password
SET first_name = :first_name, last_name = :last_name
WHERE email = :email";
$stmt = $mysqlClient->prepare($sqlQuery);
$stmt->execute(array(
  ':first_name'=> $_POST['first_name'],
  ':last_name'=> $_POST['last_name'],
  ':email'=> $_POST['email']
));}
else{
  var_dump($_POST);
}
header('Location: admin.php');



