<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assests/style.css">
    <title>CRUD PHP</title>
</head>
<body>
    <!-- Bouton "utilisateur" -->
    <div class="user-button">
        <a href="http://localhost:8000/read.php">Utilisateur</a>
    </div>

    <!-- Formulaire d'ajout -->
    <div class="container">
        <h2 style="text-align: center;">Formulaire d'Ajout</h2>
        <form action="create.php" method="post">
            <label for="mail">Adresse mail:</label>
            <input type="text" name="mail" placeholder="Adresse e-mail" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
