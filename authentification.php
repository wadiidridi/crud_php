<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_php";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["mail"]) && isset($_POST["password"])) {
        $mail = $_POST["mail"];
        $password = $_POST["password"];

        $sql = "SELECT id, password FROM personne WHERE mail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $result=$stmt->get_result();
        $user=$result->fetch_assoc();
         echo   $user['password'];
         if (password_verify($password, $user['password'])) {
            // Authentification réussie
            $_SESSION['user_id'] = $user['id'];
            header("Location: views/read.php"); // Redirigez l'utilisateur vers le tableau de bord
        } else {
            // Authentification échouée
            $_SESSION['message'] = "Adresse e-mail ou mot de passe incorrect.";
            header("Location: login.php"); // Redirigez l'utilisateur vers la page de connexion
        }
        
        
    }
}

// Si un message est défini dans la session, affichez-le
$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

// Réinitialisez le message pour éviter qu'il ne s'affiche à nouveau
unset($_SESSION['message']);

// Si l'utilisateur est connecté, affichez l'interface
if (isset($_SESSION['user_id'])) {
    // Vous pouvez personnaliser le contenu de l'interface ici
    echo "<h1>Bienvenue sur le Tableau de bord</h1>";
    echo "<p>Vous êtes connecté en tant qu'utilisateur.</p>";
    echo '<a href="?logout=1">Déconnexion</a>';

    // Gestion de la déconnexion
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
} else {
    // Affichez le formulaire de connexion avec le message d'avertissement
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
</head>
<body>
    <h1>Connexion</h1>';
    if (!empty($message)) {
        echo '<p style="color: red;">' . $message . '</p>';
    }
    echo '<form method="post">
    <label for="mail">Adresse e-mail:</label>
    <input type="email" name="mail" required autocomplete="new-email">
    <br>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required autocomplete="new-password">
    <br>
    <button type="submit">Se connecter</button>
</form>

</body>
</html>';
}

$conn->close();
?>
