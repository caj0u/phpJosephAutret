<?php

class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createTask($user_id, $titre, $description) {
        $stmt = $this->db->prepare("INSERT INTO task (user_id, titre, description) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $titre, $description]);
    }

    public function getTasksByUserId($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM task WHERE user_id = ?");
        $stmt->execute([$user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTask($task_id, $titre, $description) {
        $stmt = $this->db->prepare("UPDATE task SET titre = ?, description = ? WHERE id = ?");
        $stmt->execute([$titre, $description, $task_id]);
    }

    public function deleteTask($task_id) {
        $stmt = $this->db->prepare("DELETE FROM task WHERE id = ?");
        $stmt->execute([$task_id]);
    }
}
?>
