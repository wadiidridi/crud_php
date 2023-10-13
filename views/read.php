<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_php";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    // Supprimer un enregistrement si le bouton de suppression est cliqué
    $idToDelete = $_POST["delete"];
    $sql = "DELETE FROM personne WHERE id = $idToDelete";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Suppression réussie !");</script>';
    } else {
        echo '<script>alert("Erreur lors de la suppression : ' . $conn->error . '");</script>';
    }
}

$sql = "SELECT * FROM personne";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->

    <title>Liste des Personnes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<a href="./create.php">
    <button type="button">Ajouter</button>
</a>
<a href="./delete_v.php">
    <button type="button">supprimer</button>
</a>
    <h2>Liste des personnes :</h2>
    <table>
        <thead>
            <tr>
                
                <th>Mail</th>
                <th>Date de Création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                   
                    echo '<td>' . $row["mail"] . '</td>';
                    echo '<td>' . $row["date_creation"] . '</td>';
                    echo '<td>';
                    echo '<form method="post">';
                    echo '<button type="submit" name="delete" value="' . $row["id"] . '" class="delete-btn">Supprimer</button>';
                    echo '<a href="./update_v.php?id=' . $row["id"] . '" class="edit-btn">Modifier</a>'; // Lien vers la page de modification

                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">Aucun enregistrement trouvé.</td></tr>';
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
