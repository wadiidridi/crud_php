<?php
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

    $sql = "DELETE FROM personne WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Si la suppression est réussie, redirigez vers index.php avec un message de succès
        echo "<script>alert('Suppression réussie !');</script>";
        echo "<script>window.location = 'index.php';</script>";
    } else {
        // En cas d'erreur, affichez un message d'erreur
        echo "Erreur lors de la suppression de l'enregistrement : " . $conn->error;
    }
    $conn->close();

    
}
?>
