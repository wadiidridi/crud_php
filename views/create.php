<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assests/style.css">

    <title>Formulaire d'ajout</title>
    <style>
      
    </style>
</head>
<body>
    <?php
    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérez les données du formulaire
        $mail = $_POST["mail"];
        $password = $_POST["password"];

        // Connexion à la base de données
        $servername = "localhost"; // Adresse du serveur MySQL
        $username = "root"; // Nom d'utilisateur MySQL
        $password = ""; // Mot de passe MySQL
        $database = "crud_php"; // Nom de la base de données

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué : " . $conn->connect_error);
        }

        // Hachez le mot de passe en utilisant password_hash()
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparez et exécutez la requête SQL pour insérer les données dans la table "personne"
        $sql = "INSERT INTO personne (mail, password) VALUES ('$mail', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Enregistrement réussi, affichez une alerte JavaScript
            echo '<script>alert("Enregistrement réussi !");</script>';
        } else {
            // Erreur lors de l'enregistrement
            echo "Erreur lors de l'enregistrement : " . $conn->error;
        }

        // Fermez la connexion à la base de données
        $conn->close();
    }
    ?>
    
    <!-- Formulaire d'ajout -->
    <div class="container">
    <a href="/authentification.php">
        <button type="submit">Connecté</button>

        </a>
        <a href="./read.php">
        <button type="submit">utilisateurs</button>

        </a>
</br></br></br>
        <h2 style="text-align: center;">Inscription</h2></br></br>
        <form method="post">
            <label for="mail">Adresse e-mail:</label>
            <input type="text" name="mail" placeholder="Adresse e-mail" required>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" placeholder="Mot de passe" required></br></br>
            <button type="submit">Ajouter</button>
        </form>
     

    </div>
</body>
</html>
