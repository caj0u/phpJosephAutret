<!DOCTYPE html>
<html>
<head>
    <title>Liste de tâches</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="todo-container">
        <h2>Liste de tâches</h2>
        <form method="post" action="/index.php?action=addTask">
            <div class="form-group">
                <label for="titre">Titre de la tâche :</label>
                <input type="text" name="titre" required>
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Ajouter une tâche</button>
            </div>
        </form>
        <ul class="task-list">
            <?php foreach ($tasks as $task): ?>
                <li>
                    <h3><?= $task['titre']; ?></h3>
                    <p><?= $task['description']; ?></p>
                    <a href="/index.php?action=editTask&id=<?= $task['id']; ?>">Modifier</a>
                    <a href="/index.php?action=deleteTask&id=<?= $task['id']; ?>">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <form method="post" action="/index.php?action=logout">
    <div class="form-group">
        <button type="submit">Déconnexion</button>
    </div>
</form>
</body>
</html>
