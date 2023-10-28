<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
   <div class="Containeur_formulaire">
    <div class="formulaire">
        <form action="verifConnexion.php" method="post">
            <div class="form"></div>
            <h1>Connexion</h1>
            <h2>Votre Chauffeur à un clic</h2>
            <div class="lienFacebook">
                <a href="">Continuer avec Facebook</a>
            </div>
            <div class="emailPassword">
                <label for="email">Email</label>
            </div>
            <input type="text" id="email" class="emailInput" name="emailConnect">
            <!-- <span style="color:red"><?php echo $email_erreur; ?></span> -->
            <div class="emailPassword">
                <label for="mot_de_passe">Mot de Passe</label>
            </div>
             <input type="password" id="mot_de_passe" class="mot_de_passeInput" name="mot_de_passeConnect">
            <div class="bas">
                <div class="lienCreer">
                    <a href="inscription.php">S'inscrire??</a>
                </div>
                <div class="lienInscription">
                    <input type="submit" name="seConnecter" value="se connecter" >
                    <!-- <button> Connecter</button> -->
                </div>
            </div>
        </form>
    </div>
       
   </div>
</body>
</html>