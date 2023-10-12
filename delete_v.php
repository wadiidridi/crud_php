<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un utilisateur</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #3498db;
            color: white;
            padding: 10px;
        }

        form {
            background-color: white;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h2>Supprimer un utilisateur</h2>
    <form action="delete.php" method="post">
        <label for="id">ID à supprimer :</label>
        <input type="text" name="id" id="id" placeholder="ID à supprimer" required>
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>
