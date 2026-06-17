CREATE DATABASE IF NOT EXISTS GreetMentor;

USE GreetMentor;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    role VARCHAR(50),
    bio TEXT,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    langue VARCHAR(50) NOT NULL,
    pays VARCHAR(50) NOT NULL
);



CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texte TEXT NOT NULL,
    date DATETIME NOT NULL
);


CREATE TABLE user_chat (
    user_id INT NOT NULL,
    chat_id INT NOT NULL,
    PRIMARY KEY (user_id, chat_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (chat_id) REFERENCES chat(id)
);
