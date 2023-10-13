<?php
session_start();

// Déconnectez l'utilisateur en détruisant la session
session_destroy();

// Redirigez l'utilisateur vers la page de connexion
header("Location: login.php");
exit();
?>
