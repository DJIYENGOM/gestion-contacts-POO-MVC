<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        Création de compte et Connexion
    </header>
    <div class="container">
        <div class="form">

            <h2>Création de compte</h2>
            <form action="controleur/inscription.php" method="post">
                <div class="form-group">
                    <label for="nom">Nom d'utilisateur:</label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="email">Adresse email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="motDePasse">Mot de passe:</label>
                    <input type="password" id="motDePasse" name="password">
                </div>
                <div class="form-group">
                    <label for="motDePasse">Confirmer le Mot de passe:</label>
                    <input type="password" id="motDePasse" name="password_con">
                </div>
                <div class="form-group">
                <input type="submit" name="inscription" value="S'inscrire">
                </div>
            </form>

        </div>
       <div class="separateur"><div class="separateur2"></div></div>

        <div class="divider"></div>

        <div class="form">
            <h2>Connexion</h2>
            <form action="controleur/connexion.php" method="post">
                <div class="form-group">
                    <label for="emailConnexion">Email</label>
                    <input type="email" id="emailConnexion" name="email">
                </div>
                <div class="form-group">
                    <label for="motDePasseConnexion">Mot de passe</label>
                    <input type="password" id="motDePasseConnexion" name="password">
                </div>
                <div class="form-group">
                <input type="submit" name="connexion" value="Se connecter">
                </div>
                <div class='oubier'> <a href="mdp_oublie.php">mot de passe oublié</a></div>
            </form>
        </div>

    </div>
</body>
</html>
