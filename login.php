<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Si l'utilisateur est déjà connecté, redirigez-le vers la page d'accueil
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Remplacez cette section par la vérification dans votre base de données
    // Assurez-vous de stocker les mots de passe de manière sécurisée en utilisant password_hash

    // Exemple de vérification (remplacez par une requête à votre base de données)
    $correct_username = "utilisateur_en_base"; // Remplacez par le nom d'utilisateur correct en base de données
    $correct_password_hash = "hash_de_mot_de_passe_en_base"; // Remplacez par le mot de passe haché correct en base de données

    if ($username === $correct_username && password_verify($password, $correct_password_hash)) {
        // Authentification réussie, définissez la session et redirigez vers la page d'accueil
        $_SESSION['user_id'] = 1; // Vous pouvez utiliser l'ID de l'utilisateur à partir de votre base de données
        header("Location: index.php");
        $error_message = "Nom d'utilisateur est existe . ";

        echo '<script>alert("Nom d\'utilisateur est connecté .");</script>';

        exit;
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        // Ajoutez une alerte JavaScript pour afficher un message d'erreur
        echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form action="login.php" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
