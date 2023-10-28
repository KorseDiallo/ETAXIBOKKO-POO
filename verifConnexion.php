<?php
session_start();
require_once('utilisateur.php');
require_once('dbConnexion.php');

$bdd = new BaseDeDonnees();
$mysqlClient = $bdd->getConnexion();

if (isset($_POST["seConnecter"])) {
    $emailConnect = htmlspecialchars($_POST["emailConnect"]);
    $motDePasseConnect = md5($_POST["mot_de_passeConnect"]);

    $connexionReussie = Utilisateur::verifierConnexion($mysqlClient, $emailConnect, $motDePasseConnect);

    if ($connexionReussie) {
        echo "Connexion réussie";
    } else {
        echo "Votre email ou mot de passe est incorrect";
    }
}

// Récupération des inscrits depuis la base de données
$sqlSelect = 'SELECT nom, prenom, date_inscription FROM utilisateur';
$req = $mysqlClient->prepare($sqlSelect);
$req->execute();
$affiche = $req->fetchAll();
?>

<h1>Liste des Inscrits</h1>
<table border="1">
    <tr>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Date Inscription</td>
    </tr>
    <?php foreach ($affiche as $value): ?>
        <tr>
            <td><?php echo $value["nom"] ?></td>
            <td><?php echo $value["prenom"] ?></td>
            <td><?php echo $value["date_inscription"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
