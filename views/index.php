<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page d'Accueil Professionnelle</title>
    <style>
        /* Réinitialisation des styles du navigateur */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Style du corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Style de la barre de navigation */
        .navbar {
            background-color: #35495e;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin: 0 20px;
        }

        /* Style de la div de bienvenue */
        .welcome {
            text-align: center;
            padding: 100px 0;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .welcome h1 {
            font-size: 36px;
            color: #35495e;
            margin-bottom: 20px;
        }

        .welcome p {
            font-size: 18px;
            color: #777;
            margin-bottom: 40px;
        }
      
        /* Style du bouton d'appel à l'action */
        .cta-button {
            background-color: #ff6b6b;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            transition: background-color 0.3s;
            cursor: pointer;
            display: inline-block;
        }

        .cta-button:hover {
            background-color: #ff4f4f;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <div class="navbar">
        <a href="http://localhost:8000/create.php" class="signup">Inscription</a>
        <a href="authentification.php" class="login">Connexion</a>

    </div>

    <!-- Div de bienvenue -->
    <div class="welcome">
        <h1>Bienvenue sur Notre Site</h1>
        <p>Découvrez nos services .</p>
        <a href="http://localhost:8000/services" class="cta-button">Nos Services</a>
    </div>

    <!-- Le reste de votre contenu HTML peut être ajouté ici -->

</body>
</html>
