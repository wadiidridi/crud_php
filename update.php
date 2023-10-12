<?php
$idToUpdate = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Adresse du serveur MySQL
    $username = "root"; // Nom d'utilisateur MySQL
    $password = ""; // Mot de passe MySQL
    $database = "crud_php"; // Nom de la base de données

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $id = $_POST["id"];
    $newMail = $_POST["new_mail"];
    $newPassword = $_POST["new_password"];

    $sql = "UPDATE personne SET mail='$newMail', password='$newPassword' WHERE id=$idToUpdate";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
        $newMail = $_POST["new_mail"];
        $newPassword = $_POST["new_password"];
    
        $sql = "UPDATE personne SET mail='$newMail', password='$newPassword' WHERE id=$idToUpdate";
    
        if ($conn->query($sql) === TRUE) {
            // Mise à jour réussie, affichez une alerte JavaScript
            echo '<script>alert("Mise à jour réussie !");</script>';
            // Ajoutez un délai de redirection
            echo '<script>setTimeout(function() { window.location = "read.php"; }, 1000);</script>';
            // Utilisez un délai d'1 seconde (1000 millisecondes) avant de rediriger
        } else {
            // Erreur lors de la mise à jour, affichez une autre alerte
            echo '<script>alert("Erreur lors de la mise à jour : ' . $conn->error . '");</script>';
        }
    }

    $conn->close();
}
?>
