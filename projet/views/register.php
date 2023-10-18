<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="register-container">
        <h2>Inscription</h2>
        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>
        <form method="post" action="/index.php?action=register">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" required>
            </div>
            <div class="form-group">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
        <p>Déjà un compte ? <a href="/index.php?action=login">Connectez-vous ici</a></p>
    </div>
</body>
</html>
