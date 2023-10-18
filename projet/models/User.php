<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($nom, $prenom, $email, $pseudo, $mdp) {
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (nom, prenom, email, pseudo, mdp) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $pseudo, $hashedPassword]);
    }

    public function getUserByUsername($pseudo) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE pseudo = ?");
        $stmt->execute([$pseudo]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
