<?php 
class Utilisateur {
    private $email;
    private $motDePasse;
    private $prenom;
    private $nom;
    private $telephone;

    public function __construct($email, $motDePasse, $prenom, $nom, $telephone) {
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->telephone = $telephone;
    }

    public function enregistrerUtilisateur(PDO $conn) {
        $sqlQuery = 'INSERT INTO utilisateur (email, mot_de_passe, prenom, nom, telephone) VALUES (:email, :mot_de_passe, :prenom, :nom, :telephone)';
        $insertUser = $conn->prepare($sqlQuery);

        $insertUser->execute([
            'email' => $this->email,
            'mot_de_passe' => $this->motDePasse,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'telephone' => $this->telephone
        ]);

        echo "Inscription réussie";
    }

    public static function verifierConnexion(PDO $conn, $email, $motDePasse) {
        $sqlQuery = 'SELECT * FROM utilisateur WHERE email=:email AND mot_de_passe=:mot_de_passe';
        $selectUser = $conn->prepare($sqlQuery);
        $selectUser->execute([
            "email" => $email,
            "mot_de_passe" => $motDePasse
        ]);

        if ($selectUser->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
