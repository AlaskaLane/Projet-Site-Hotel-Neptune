<?php 
require_once('../session.php');
?>
<!DOCTYPE html>
<head>
    <title>Hôtel Neptune</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!--viewport=zone de la fenêtre dans laquelle le contenu web peut être vu, 
    device-width= largeur de l'écran en pixels CSS à une échelle de 100% -->
    <meta charset= UTF8>
    <link rel="stylesheet" href="../Style.css">
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
    <div class="Neptune"><a class="sans" href="../index.php">Hôtel Neptune</a></div>
    <div class="content">
    <?php
    // Récupération de l'identifiant unique de la ligne à partir du paramètre dans l'URL
    $id = !empty($_GET['id']) ? $_GET['id'] : die('Erreur: Identifiant de la réservation non trouvé.');

    // Requête SQL pour récupérer les données des réservations
    $sqlQuery = "SELECT password.first_name, password.last_name, password.email,
    reservations.trip_start, reservations.trip_end, reservations.nbrpers, reservations.id_reservation
    FROM password
    JOIN reservations
    ON password.email = reservations.email_client
    WHERE reservations.id_reservation = '$id'";

    $stmt = $mysqlClient->prepare($sqlQuery);
    $stmt->execute();
    $reservation = $stmt->fetch();

        // Vérification que la réservation a été trouvée
    $id = !empty($_GET['id']) ? $_GET['id'] : die('Erreur: Identifiant de la réservation non trouvé.');

    // Affichage des champs modifiables pour la réservation sélectionnée
    echo "<form action='rosebud.php' method='post'>";
    echo "<input type='hidden' name='id_reservation' value='$reservation[id_reservation]'>";
    echo "<table class='table table-striped'>";
    echo "<tr>";
    echo "<th>Prénom:</th>";
    echo "<td><input type='text' name='first_name' value='$reservation[first_name]' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Nom:</th>";
    echo "<td><input type='text' name='last_name' value='$reservation[last_name]' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Adresse email:</th>";
    echo "<td><input type='email' name='email' value='$reservation[email]' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Date de début du séjour:</th>";
    echo "<td><input type='date' name='trip_start' value='$reservation[trip_start]' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Date de fin du séjour:</th>";
    echo "<td><input type='date' name='trip_end' value='$reservation[trip_end]' /></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Nombre de personnes:</th>";
    echo "<td><input type='number' name='nbrpers' value='$reservation[nbrpers]' /></td>";
    echo "</tr>";
    echo "</table>";
    echo "<input type='submit' name='submit' value='Enregistrer' />";
    echo "</form>";?>
    <form action="delete.php" method="post">
        <input type="hidden" name="id_reservation" value="<?php echo $reservation['id_reservation']; ?>" />
        <input type="submit" value="Supprimer la réservation" />
    </form>