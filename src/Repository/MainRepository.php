<?php

namespace App\Repository;

use \PDO;
use App\Model\Users;

class MainRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Users $user)
    {
        $request = $this->pdo->prepare(
            "INSERT INTO users (nom, prenom, role, bio, email, mot_de_passe, langue, pays)
            VALUES (:nom, :prenom, :role, :bio, :email, :mot_de_passe, :langue, :pays)"
        );

        $request->bindValue(":nom", $user->getLastName());
        $request->bindValue(":prenom", $user->getFirstName());
        $request->bindValue(":role", $user->getRole());
        $request->bindValue(":bio", $user->getBio());
        $request->bindValue(":email", $user->getEmail());
        $request->bindValue(":mot_de_passe", $user->getPassword());
        $request->bindValue(":langue", $user->getLangue());
        $request->bindValue(":pays", $user->getPays());    
        
        $result = $request->execute();
    }
}