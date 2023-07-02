<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="View/auth.css">
    <script defer src="Controller/login.js"></script>
</head>

<body>
    <div class="card">
        <h1 class="text-center text-spaced">Connexion</h1>
        <form method="post" id="login">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd" required>
            <input class="btn" type="submit" name="submit" value="Se connecter">
        </form>
        <a class="text-center" href="index.php?register">S'inscrire</a>
    </div>
</body>

</html>