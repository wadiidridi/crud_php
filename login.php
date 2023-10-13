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
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    $sql = "SELECT id, password FROM personne WHERE mail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashed_password)) {
        // Authentification réussie
        $_SESSION['user_id'] = $user_id;
        header("Location: dashboard.php");
        exit();
    } else {
        // Authentification échouée
        $message = "Adresse e-mail ou mot de passe incorrect.";
    }
}

$conn->close();
?>
