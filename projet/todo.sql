create database todo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(100),
    pseudo VARCHAR(50),
    mdp VARCHAR(255)
);

CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, 
    titre VARCHAR(100),
    description TEXT
);


