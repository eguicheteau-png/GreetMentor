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

    public function createEleve(Users $user)
    {
        $request = $this->pdo->prepare(
            "INSERT INTO eleve (nom, prenom, role, bio, email, mot_de_passe, langue, pays)
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


    public function createMentor(Users $user)
    {
        $request = $this->pdo->prepare(
            "INSERT INTO mentor (nom, prenom, role, bio, email, mot_de_passe, langue, pays)
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


    public function readAllEleve()
    {
        $request = $this->pdo->query("SELECT * FROM eleve");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }


    public function readAllMentor()
    {
        $request = $this->pdo->query("SELECT * FROM mentor");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function userId($eleve, $mentor, $data) 
    {
        for ($i = 0; $i < count($eleve); $i++) {
                if ($eleve[$i]["email"] == $data["email"]) {
                    if (password_verify($data["password"], $eleve[$i]["mot_de_passe"])) {
                        return [$i, "eleve"];
                    }
                }
        }
        for ($i = 0; $i < count($mentor); $i++) {
                if ($mentor[$i]["email"] == $data["email"]) {
                    if (password_verify($data["password"], $mentor[$i]["mot_de_passe"])) {
                        return [$i, "mentor"];
                    }
                }        
        }
        return false;
    }

    public function readAllGoodMentor() {
       $langue = $_SESSION['langue'];
       $pays = $_SESSION['pays'];
       $request = $this->pdo->query("SELECT * FROM mentor WHERE langue = '$langue' AND pays = '$pays'");
       $result = $request->fetchAll(PDO::FETCH_ASSOC);

       return $result;
    }

    public function createEleveMentor($idMentor, $idEleve) {
            $request = $this->pdo->prepare(
            "INSERT INTO eleve_mentor (id_eleve, id_mentor)
            VALUES (:id_eleve, :id_mentor)"
        );

        $request->bindValue(":id_eleve", $idEleve);
        $request->bindValue(":id_mentor", $idMentor);

        
        $result = $request->execute();

        return "q";
    }

    

    public function readAllMessage() {
    $id = $_SESSION["id"];
    if ($_SESSION["role"] == "eleve") {
        $request = $this->pdo->query("SELECT * FROM chat WHERE id_eleve = '$id'");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    } else if ($_SESSION["role"] == "mentor") {
        $request = $this->pdo->query("SELECT * FROM chat WHERE id_mentor = '$id'");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        return $results;
      }
    }

    public function addMessage($data, $idOther) {
        $id = $_SESSION["id"];
        $role = $_SESSION["role"];
        $request = $this->pdo->prepare (
            "INSERT INTO chat (texte, date, id_mentor, id_eleve, origin)
            VALUES (:texte, :date, :id_mentor, :id_eleve, :origin)"
        );

        $request->bindValue(":texte", $data["message"]);
        $request->bindValue(":date", date("Y-m-d"));
        if ($role == "mentor") {
            $request->bindValue(":id_mentor", $id);
            $request->bindValue(":id_eleve", $idOther);
        } else if ($role == "eleve") {
            $request->bindValue(":id_mentor", $idOther);
            $request->bindValue(":id_eleve", $id);
        }
        $request->bindValue(":origin", $role);
        
        $result = $request->execute();
    }

    public function readEleveMentor() {
    $id = $_SESSION["id"];
    if ($_SESSION["role"] == "eleve") {
        $request = $this->pdo->query("SELECT * FROM eleve_mentor WHERE id_eleve = '$id'");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        $result = $results[0]["id_mentor"];
        return $result;
    } else if ($_SESSION["role"] == "mentor") {
        $request = $this->pdo->query("SELECT * FROM eleve_mentor WHERE id_mentor = '$id'");
        $results = $request->fetchAll(PDO::FETCH_ASSOC);

        $result = $results[0]["id_eleve"];
        return $result;
      }
    }

}