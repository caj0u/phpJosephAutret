<?php
$host = '127.0.0.1';
$dbname = 'todo';
$username = 'parc';
$password = 'root';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
