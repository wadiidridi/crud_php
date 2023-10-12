<?php
// Démarrez la session (si ce n'est pas déjà fait)
session_start();

// Vérifiez si l'utilisateur est déjà connecté (vous pouvez personnaliser cette condition)
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); // Redirigez l'utilisateur vers une page connectée
    exit();
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ici, vous devrez effectuer une requête SQL pour vérifier les informations d'identification dans la base de données
    // Par exemple, supposons une base de données "utilisateurs" avec une table "utilisateurs" contenant des colonnes "id", "nom_utilisateur" et "mot_de_passe".

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud_php";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $database);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $sql = "SELECT id, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashed_password)) {
        // L'authentification est réussie
        $_SESSION['user_id'] = $user_id; // Enregistrez l'ID de l'utilisateur dans la session
        header("Location: dashboard.php"); // Redirigez l'utilisateur vers une page connectée
        exit();
    } else {
        // L'authentification a échoué
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php
    if (isset($message)) {
        echo '<p style="color: red;">' . $message . '</p>';
    }
    ?>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
