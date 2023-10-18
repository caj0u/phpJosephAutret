<?php

class AuthController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function registerUser($nom, $prenom, $email, $pseudo, $mdp) {
        // Valider les données d'inscription

        // Créer l'utilisateur
        $this->userModel->createUser($nom, $prenom, $email, $pseudo, $mdp);
    }

    public function login($pseudo, $mdp) {
        // Valider les données de connexion

        // Récupérer l'utilisateur depuis la base de données
        $user = $this->userModel->getUserByUsername($pseudo);

        if ($user && password_verify($mdp, $user['mdp'])) {
            // L'utilisateur est authentifié
            $_SESSION['user_id'] = $user['id'];

            // Rediriger vers la page de liste de tâches en utilisant un chemin relatif
            header("Location: /views/todo.php");
            exit;
        } else {
            return false;
        }
    }
    public function logout() {
        // Déconnectez l'utilisateur en détruisant la session
        session_destroy();
    
        // Redirigez l'utilisateur vers la page de connexion (login.php) après la déconnexion
        header("Location: views/login.php");
        exit;
    }
    
    
    
    
    
}


?>
