<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_php";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    // Récupérer les données du formulaire
    $id = $_POST["id"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];

    // Mettre à jour les données dans la base de données
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE personne SET mail = '$mail', password = '$hashedPassword' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Mise à jour réussie !");</script>';
    } else {
        echo '<script>alert("Erreur lors de la mise à jour : ' . $conn->error . '");</script>';
    }
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM personne WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $mail = $row["mail"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
    <title>Modifier la Personne</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-button {
            background-color: #ccc;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #999;
        }
    </style>
</head>
<body>
    <a href="./read.php" class="back-button">Retour</a> <!-- Bouton "Retour" pour revenir à la page read.php -->
    <h2>Modifier la Personne :</h2>
    <div class="container">
        <!-- Créez un formulaire pour la modification -->
        <form method="post" action="update_v.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="mail">Adresse e-mail:</label>
            <input type="text" name="mail" value="<?php echo $mail; ?>" required>
            <label for="password">Nouveau Mot de passe:</label>
            <input type="password" name="password" placeholder="Nouveau Mot de passe" required>
            <button type="submit" name="update">Modifier</button>
        </form>
    </div>
</body>
</html>
