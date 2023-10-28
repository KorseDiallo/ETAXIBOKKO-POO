<?php 
class BaseDeDonnees {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=e_taxibokko;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getConnexion() {
        return $this->conn;
    }
}
