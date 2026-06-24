CREATE DATABASE IF NOT EXISTS greetmentor;

USE GreetMentor;


CREATE TABLE eleve (
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



CREATE TABLE mentor (
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

CREATE TABLE eleve_mentor (
    id_eleve INT NOT NULL,
    id_mentor INT NOT NULL,
    PRIMARY KEY (id_eleve, id_mentor),
    FOREIGN KEY (id_eleve) REFERENCES eleve(id),
    FOREIGN KEY (id_mentor) REFERENCES mentor(id)
);



CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texte TEXT NOT NULL,
    date DATETIME NOT NULL,
    id_mentor INT NOT NULL,
    id_eleve INT NOT NULL,
    origin VARCHAR(50),
    FOREIGN KEY (id_mentor) REFERENCES mentor(id),
    FOREIGN KEY (id_eleve) REFERENCES eleve(id)
);
