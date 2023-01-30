<?php 
require_once('session.php');?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<!--viewport=zone de la fenêtre dans laquelle le contenu web peut être vu, 
	device-width= largeur de l'écran en pixels CSS à une échelle de 100% -->
	<meta charset= UTF8>
	<link rel="stylesheet" href="Style.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
</head>
<body>
<nav class="navbar" style="background-color: rgb(202, 235, 255);">
 	<div class="container-fluid">
    <div class="Neptune">Hôtel Neptune</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chambre.php">Nos chambres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservation.php">Vos réservations</a>
        </li>
        <?php if(!isset($loggedUser['email'])):?>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Se connecter</a>
        </li>
        <?php endif;?>
        <?php 
        if (isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] === true):
          if($loggedUser['email'] == 'la@sauveuse.ouat'):?>
          <li class="nav-item">
            <a class="nav-link" href="admin/admin.php">Administration du site</a>
          </li>
          <?php endif;?>
        <?php endif;?>
      <?php
      if (isset($_SESSION['LOGGED_IN']) && $_SESSION['LOGGED_IN'] === true):?>
        <a href="logout.php"><button class="btn btn-outline-primary">Se déconnecter</button></a>
      </div>
 	 </div>
  </div>
  </ul>
	</nav>
        <?php else:?>
        </div>
 	 </div>
  </div>
  </ul>
	</nav>
        <?php endif;?>
        </div>
</body>