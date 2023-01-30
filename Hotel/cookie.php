<?php
/*if (isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['email'])) {
    $loggedUser = [
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['email'],
    ];
}*/
  // Stocker une valeur dans la variable de session 'SESSION_VAR'
 // $_SESSION['SESSION_VAR'] = 'Ma valeur';

  // Écrire le cookie de session
  setcookie(session_name(), session_id(), time() + 3600);
?>
