<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="View/auth.css">
    <script defer src="Controller/register.js"></script>
</head>

<body>
    <div class="card">
        <h1 class="text-center text-spaced">Inscription</h1>
        <form method="post" id="register">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>
            <div class="input-group">
                <div class="input">
                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" required>
                </div>
                <div class="input">
                    <label for="filiere">Filière</label>
                    <select name="filiere" id="filiere">
                        <option value="MMI">MMI</option>
                        <option value="Eco Gestion">Eco Gestion</option>
                    </select>
                </div>
            </div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" required>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="pwd" id="pwd" required>
            <label for="pwd_confirm">Confirmer le mot de passe</label>
            <input type="password" name="pwd_confirm" id="pwd_confirm" required>
            <input class="btn" type="submit" name="submit" value="S'inscrire">
        </form>
        <a class="text-center" href="index.php?login">Se connecter</a>
    </div>
</body>

</html>