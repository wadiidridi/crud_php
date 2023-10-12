<?php
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud_php";
    
    return new mysqli($servername, $username, $password, $database);
}

function deletePerson($idToDelete) {
    $conn = getDatabaseConnection();
    
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $sql = "DELETE FROM personne WHERE id = $idToDelete";
    $success = $conn->query($sql);

    $conn->close();
    return $success;
}

function fetchAllPersons() {
    $conn = getDatabaseConnection();
    
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM personne";
    $result = $conn->query($sql);
    $persons = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $persons[] = $row;
        }
    }

    $conn->close();
    return $persons;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $idToDelete = $_POST["delete"];
    $success = deletePerson($idToDelete);
    if ($success) {
        echo '<script>alert("Suppression réussie !");</script>';
    } else {
        echo '<script>alert("Erreur lors de la suppression.");</script>';
    }
}

$persons = fetchAllPersons();

include 'liste_personnes.php';
?>
