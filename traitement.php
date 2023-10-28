<?php 
session_start();
require_once('dbConnexion.php');

// Vérifiez si les données de session existent
if (isset($_SESSION["email"]) && isset($_SESSION["mot_de_passe"])) {
    $email = $_SESSION["email"];
    $motDePasse = $_SESSION["mot_de_passe"];

    // Déclarez les expressions régulières ici
    $regex_nom = "/^[a-zA-Z]{2,}$/";
    $regex_prenom = "/^[a-zA-Z]{3,}$/";
    $regex_tel = "/^7+[0-9]{1,7}$/";

    if (isset($_POST["inscription"])) {
        if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["telephone"])) {
            $prenom = htmlspecialchars($_POST["prenom"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $telephone = $_POST["telephone"];
        } else {
            echo "Veuillez remplir tous les champs du formulaire d'inscription.";
            die();
        }

        // Vérification des expressions régulières ici

        // Assurez-vous que la connexion à la base de données est établie
        $bdd = new BaseDeDonnees();
        $mysqlClient = $bdd->getConnexion();

        $sqlQuery = 'INSERT INTO utilisateur (email, mot_de_passe, prenom, nom, telephone) VALUES (:email, :mot_de_passe, :prenom, :nom, :telephone)';
        $insertUser = $mysqlClient->prepare($sqlQuery);

        $insertUser->execute([
            'email' => $email,
            'mot_de_passe' => $motDePasse,
            'prenom' => $prenom,
            'nom' => $nom,
            'telephone' => $telephone
        ]);

        echo "Inscription réussie";
    } else {
        echo "Les données de session sont invalides. Veuillez vous inscrire à partir du premier formulaire.";
    }
} else {
    echo "Les données de session ne sont pas disponibles. Veuillez vous inscrire à partir du premier formulaire.";
}
?> 
