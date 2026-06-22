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


    public function readAllUsers()
    {
        $request = $this->pdo->query("SELECT * FROM users");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function userId($users, $data) 
    {
        for ($i = 0; $i < count($users); $i++) {
                if ($users[$i]["email"] == $data["email"]) {
                    if (password_verify($data["password"], $users[$i]["mot_de_passe"])) {
                        return $i;
                    }
                }
        }
        return false;
        
    }

    public function readAllMentor() {
       $langue = $_SESSION['langue'];
       $pays = $_SESSION['pays'];
       $request = $this->pdo->query("SELECT * FROM users WHERE langue = '$langue' AND pays = '$pays'");
       $result = $request->fetchAll(PDO::FETCH_ASSOC);

       return $result;
    }
}