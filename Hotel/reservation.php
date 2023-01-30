<!DOCTYPE html>
<head>
	<title>Hôtel Neptune</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!--viewport=zone de la fenêtre dans laquelle le contenu web peut être vu, 
	device-width= largeur de l'écran en pixels CSS à une échelle de 100% -->
	<meta charset= UTF8>
	<link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
	<meta name="description" content="Bienvenue sur le site de l'hôtel Neptune à Carnon 34280 (Hérault), venez découvrir notre établissement et réserver vos vacances.">
</head>
<body>
<?php include 'navbar.php';
      
  if(isset($loggedUser)){
      $sqlQuery = "SELECT trip_start, trip_end, nbrpers
      FROM reservations
      WHERE email_client = :email";
      $stmt = $mysqlClient->prepare($sqlQuery);
      $stmt->execute(['email' => $loggedUser['email']]);
      $reservations = $stmt->fetchAll();
      if(!empty($reservations)){
        // On définis une fonction de comparaison pour usort qui compare les dates de début de voyage
        function compareTripStart($a, $b) {
          return strtotime($a['trip_start']) - strtotime($b['trip_start']);
        }
        // Obtenez le timestamp courant
        $currentTimestamp = time();

        // Filtrez les données pour ne garder que les dates de début de voyage qui sont dépassées
        $passedReservations = array_filter($reservations, function($reservation) use ($currentTimestamp)
        {
            $tripStartTimestamp = strtotime($reservation['trip_start']);
            return $tripStartTimestamp < $currentTimestamp;
        });
        // Filtrez les données pour ne garder que les dates de début de voyage qui ne sont pas dépassées
        $futurReservations = array_filter($reservations, function($reservation) use ($currentTimestamp) 
        {
          $tripStartTimestamp = strtotime($reservation['trip_start']);
          return $tripStartTimestamp >= $currentTimestamp;
        });
        ?>
        <?php 
        // On trie le tableau $reservations en utilisant la fonction compareTripStart
        usort($futurReservations, 'compareTripStart');
        usort($passedReservations, 'compareTripStart');

        // Affichez les données triées
          if (!empty($futurReservations)){
          echo "<p class='welcome'>Réservations à venir</p>";
          echo "<div class='BoxRésérvations'>";
          foreach($futurReservations as $reservations):?>
            <p>
            <div class="content">
              <div class="box">
                <p>
                  <strong>Nombre de personnes : </strong> <?php echo $reservations['nbrpers'];?>
                </p>
                <p>
                  <strong>Date de début : </strong> <?php echo $reservations['trip_start'];?>
                </p>
                <p>
                  <strong>Fin du séjour : </strong> <?php echo $reservations['trip_end'];?>
                </p>
              </div>
            </div>
            --------------------------------------------
            </p>
          <?php endforeach;
        }?>
        </div>
        <p>
        <?php
        // Affichez les données triées
        if (!empty($passedReservations)){
          echo "<p class='welcome'>Réservations passées</p>";
          echo "<div class='past'>";
          foreach($passedReservations as $reservations):?>
            <div class="content">
                <p>
                  <strong>Nombre de personnes : </strong> <?php echo $reservations['nbrpers'];?>
                </p>
                <p>
                  <strong>Date de début : </strong> <?php echo $reservations['trip_start'];?>
                </p>
                <p>
                  <strong>Fin du séjour : </strong> <?php echo $reservations['trip_end'];?>
                </p>
            </div>
            --------------------------------------------
            </p>
          <?php endforeach;
        }?>
        </div>
        </div>
        </p>
    <?php
    }
    else{
      echo "<div style='height: 100px'>
              <div class='BoxRésérvations'>
                <div class='reserves'>
                  Vous n'avez pas effectué de réservations pour le moment
                </div>
              </div>
            </div>";
    }?>
<div class="image">
	<img src="Logo-Neptune-The-Originals-2.png" width= 150px>
</div>
<?php  }
else {
  echo "<div style='height: 100px'>
          <div class='BoxRésérvations'>
            <div class='reserves'>
              Vous devez vous connecter pour effectuer une reservation.
            </div>
          </div>
        </div>";
}?>
</body>
</html>