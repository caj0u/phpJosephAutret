<?php

class TaskController {
    private $taskModel;

    public function __construct($taskModel) {
        $this->taskModel = $taskModel;
    }

    public function createTask($user_id, $titre, $description) {
        // Valider les données de la tâche


        // Créer la tâche
        $this->taskModel->createTask($user_id, $titre, $description);
    }

    public function updateTask($task_id, $titre, $description) {
        // Valider les données de la tâche


        // Mettre à jour la tâche
        $this->taskModel->updateTask($task_id, $titre, $description);
    }

    public function deleteTask($task_id) {
        // Supprimer la tâche
        $this->taskModel->deleteTask($task_id);
    }

    public function getTasksByUserId($user_id) {
        // Récupérer les tâches de l'utilisateur depuis la base de données
        return $this->taskModel->getTasksByUserId($user_id);
    }
}

?>
