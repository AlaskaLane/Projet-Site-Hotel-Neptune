<?php 
require_once('../session.php');
?>
<?php if($loggedUser['email'] == 'la@sauveuse.ouat'):?>
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
    <?php
    require_once "../bdd.php";
    ?>
    <div class="content">
    <?php
        $sqlQuery = "SELECT password.first_name, password.last_name, password.email,
        reservations.trip_start, reservations.trip_end, reservations.nbrpers, reservations.id_reservation
        FROM password
        JOIN reservations
        ON password.email = reservations.email_client";
        $stmt = $mysqlClient->prepare($sqlQuery);
        $stmt->execute();
        $results = $stmt->fetchAll();

        if (!$stmt) {
            die(var_dump($mysqlClient->errorInfo()));
        }

        if(!empty($results)){
            // On définis une fonction de comparaison pour usort qui compare les dates de début de voyage
            function compareTripStart($a, $b) {
                return strtotime($a['trip_start']) - strtotime($b['trip_start']);
            }
            usort($results, 'compareTripStart');  
            
            // Obtenez le timestamp courant
            $currentTimestamp = time();

            // Filtrez les données pour ne garder que les dates de début de voyage qui sont dépassées
            $passedReservations = array_filter($results, function($results) use ($currentTimestamp)
            {
                $tripStartTimestamp = strtotime($results['trip_start']);
                return $tripStartTimestamp < $currentTimestamp;
            });
            // Filtrez les données pour ne garder que les dates de début de voyage qui ne sont pas dépassées
            $futurReservations = array_filter($results, function($results) use ($currentTimestamp) 
            {
            $tripStartTimestamp = strtotime($results['trip_start']);
            return $tripStartTimestamp >= $currentTimestamp;
            });
        
        echo "<p class='welcome'>Réservations à venir</p>";
        echo "<table class=\"table table-striped\">";
        echo "<tr>";
        echo "<th>Prénom</th>";
        echo "<th>Nom</th>";
        echo "<th>Adresse mail</th>";
        echo "<th>Début du séjour</th>";
		echo "<th>Fin du séjour</th>";
		echo "<th>Nombre de personnes</th>";
		echo "<th>Modifier?</th>";
		echo "<tr>";
		foreach($futurReservations as $results) {
			$id = $results['id_reservation']; // Récupère la valeur de la colonne id_reservation de la ligne actuelle
			echo "<tr id='$id'>";
			echo "<td>$results[first_name]</td>";
			echo "<td>$results[last_name]</td>";
			echo "<td>$results[email]</td>";
			echo "<td>$results[trip_start]</td>";
			echo "<td>$results[trip_end]</td>";
			echo "<td>$results[nbrpers]</td>";
			echo "<td><a href='modify.php?id=$id'><button class='btn btn-outline-primary'>Modifier</button></a><td>";
			echo "</tr>";
		  }
		echo "</table>";
        echo "<table class=\"table table-striped\">";
        echo "<tr>";
        echo "<th>Prénom</th>";
        echo "<th>Nom</th>";
        echo "<th>Adresse mail</th>";
        echo "<th>Début du séjour</th>";
		echo "<th>Fin du séjour</th>";
		echo "<th>Nombre de personnes</th>";
		echo "<th>Modifier?</th>";
		echo "<tr>";
        echo "<p class='welcome'>Réservations passées</p>";
		foreach($passedReservations as $results) {
			$id = $results['id_reservation']; // Récupère la valeur de la colonne id_reservation de la ligne actuelle
			echo "<tr id='$id'>";
			echo "<td>$results[first_name]</td>";
			echo "<td>$results[last_name]</td>";
			echo "<td>$results[email]</td>";
			echo "<td>$results[trip_start]</td>";
			echo "<td>$results[trip_end]</td>";
			echo "<td>$results[nbrpers]</td>";
			echo "<td><a href='modify.php?id=$id'><button class='btn btn-outline-primary'>Modifier</button></a><td>";
			echo "</tr>";
		  }
		echo "</table>";
        }
		?>
		</div>
	<?php else:
    header ('Location: indexe.php');
    endif;?>
    
    /*
				// PASSE L'IDENTIFIANT DE LA LIGNE EN TANT QU'ARGUMENT DE LA FONCTION addInputFields()

	onclick='addInputFields(\"$id\")


    function addInputFields(id) {
	debugger;
      // Récupérez les éléments de la ligne correspondante dans le tableau
      var firstNameCell = row.querySelector('td:nth-child(1)');
      var lastNameCell = row.querySelector('td:nth-child(2)');
      var emailCell = row.querySelector('td:nth-child(3)');
      var tripStartCell = row.querySelector('td:nth-child(4)');
      var tripEndCell = row.querySelector('td:nth-child(5)');
      var nbrPersCell = row.querySelector('td:nth-child(6)');

      // Créez des champs de saisie pour chaque élément de la ligne
      var firstNameInput = document.createElement('input');
      firstNameInput.setAttribute('type', 'text');
      firstNameInput.setAttribute('name', 'first_name');
      firstNameInput.setAttribute('value', firstNameCell.innerText);
      firstNameCell.innerText = '';
      firstNameCell.appendChild(firstNameInput);

      var lastNameInput = document.createElement('input');
      lastNameInput.setAttribute('type', 'text');
      lastNameInput.setAttribute('name', 'last_name');
      lastNameInput.setAttribute('value', firstNameCell.innerText);
	  lastNameCell.innerText = '';
	  lastNameCell.appendChild(lastNameInput);
	}
	</script>*/
