<?php
session_start();

require_once 'config/config.php';
require_once 'models/User.php';
require_once 'models/Task.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/TaskController.php';

$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$userModel = new User($db);
$taskModel = new Task($db);

$authController = new AuthController($userModel);
$taskController = new TaskController($taskModel);

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'login':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Traitement de la soumission du formulaire de connexion
                $pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];

                if ($authController->login($pseudo, $mdp)) {
                    // Rediriger vers la page de liste de tâches
                    header("Location: index.php?action=todo");
                    exit;
                } else {
                    $error = "Identifiants incorrects. Veuillez réessayer.";
                }
            }
            include 'views/login.php';
            break;

        case 'register':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Traitement de la soumission du formulaire d'inscription
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $email = $_POST['email'];
                $pseudo = $_POST['pseudo'];
                $mdp = $_POST['mdp'];

                $authController->registerUser($nom, $prenom, $email, $pseudo, $mdp);

                // Rediriger vers la page de connexion après l'inscription
                header("Location: index.php?action=login");
                exit;
            }
            include 'views/register.php';
            break;

        case 'addTask':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Traitement de l'ajout de tâche
                $user_id = $_SESSION['user_id'];
                $titre = $_POST['titre'];
                $description = $_POST['description'];

                $taskController->createTask($user_id, $titre, $description);
            }
            $tasks = $taskController->getTasksByUserId($_SESSION['user_id']);
            include 'views/todo.php';
            break;
        case 'logout':
            $authController->logout();
            break;
            

    }
} elseif (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté, afficher la page de liste de tâches
    $tasks = $taskController->getTasksByUserId($_SESSION['user_id']);
    include 'views/todo.php';
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: index.php?action=login");
    exit;
}
