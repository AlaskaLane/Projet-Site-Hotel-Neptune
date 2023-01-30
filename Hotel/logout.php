<?php
  session_start();
  $expiredate = time() - 3600;
  session_destroy();

// Récupérer tous les noms de cookies enregistrés pour votre site
  $cookies = array_keys($_COOKIE);

// Pour chaque cookie, utiliser la fonction setcookie() pour le supprimer
    foreach ($cookies as $cookie) {
    setcookie($cookie, '', $expiredate);
}
  header('Location: index.php');
?>