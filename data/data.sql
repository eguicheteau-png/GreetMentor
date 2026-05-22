CREATE DATABASE IF NOT EXISTS GreetMentor;

USE GreetMentor;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(50) NOT NULL,
    langue VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mot_de_passe VARCHAR(100) NOT NULL,
    role VARCHAR(30) NOT NULL
);

CREATE TABLE chat (
    id_chat INT AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(2000) NOT NULL,
    date DATE NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);