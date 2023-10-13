<?php
session_start();

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue sur le Tableau de bord</h1>
    <p>Vous êtes connecté en tant qu'utilisateur.</p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
