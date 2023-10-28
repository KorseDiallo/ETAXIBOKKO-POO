<?php
session_start();
require_once('utilisateur.php');
require_once('dbConnexion.php');

if (isset($_POST["valider"])) {
    if (isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {
        $_SESSION["email"] = htmlspecialchars($_POST["email"]);
        $_SESSION["mot_de_passe"] = md5($_POST["mot_de_passe"]);
        // Redirigez vers la page avec le deuxième formulaire d'inscription.
        header("Location: inscriptionSuite.php");
    } else {
        echo "Veuillez remplir tous les champs du formulaire d'inscription.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="Containeur_formulaire1">
    <div class="formulaire">
        <form action="traitement.php" method="post">
            <h1>Bienvenue</h1>
            <h2>Finalisez votre inscription en renseignant les informations manquantes</h2>
            <div class="inputPrenom">
                <label for="prenom">Prenom</label>
                <label for="nom">Nom</label>
            </div>
            <div class="inputPrenom">
                <input type="text" id="prenom" name="prenom">
                <input type="text" id="nom" name="nom" class="nom">
            </div>
           
            <div class="telephone">
                <label for="telephone">Telephone</label>
            </div>
            <div class="containeur">
                <div class="prefixe">+221</div>
                <div >
                    <input type="text" class="A" name="telephone">
                </div>
            </div>
            <div class="ajoutCodePromo">
                <a href="#">Ajouter un code promo</a>
            </div>
            <div class="containeurBouttonBas">
                <div class="bouttonBas">
                    <input type="submit" value="S'inscrire" name="inscription">
                </div>
            </div>
        </form>
    </div>
   </div>
</body>
</html>
