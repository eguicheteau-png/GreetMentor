<?php 

namespace App\Controller;

use App\Repository\MainRepository;
use App\Model\Users;

class MainController 
{
    private MainRepository $repo;

    public function __construct(MainRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        if (isset($_SESSION["id"]) == false) {
            $eleveMentor =  $this->repo->readEleveMentor();
        } 

        require __DIR__. "/../../views/accueil.php";
    }

    public function loginForm()
    {
        require __DIR__. "/../../views/login-form.php";
    }

    public function createAccountForm()
    {
        require __DIR__. "/../../views/account-create-form.php";
    }


    public function createEleve(array $data)
    {
        $firstname = trim($data["firstName"]);
        $lastName = trim($data["lastName"]);
        $email = trim($data["email"]);
        $password = trim($data["password"]);
        $pays = trim($data["pays"]);
        $langue = trim($data["langue"]);
        $role = trim($data["role"]);
        $bio = "nothing";

        $new_user = new Users();
        $new_user->setFirstName($firstname);
        $new_user->setLastName($lastName);
        $new_user->setEmail($email);
        $new_user->setPassword($password);
        $new_user->setPays($pays);
        $new_user->setLangue($langue);
        $new_user->setRole($role);
        $new_user->setBio($bio);

        $errors = $new_user->getErrors();

        if (count($errors) > 0) {
            require "views/account-create-form.php";
            return;
        }

        $createdUsers = $this->repo->createEleve($new_user);

        var_dump($createdUsers);
    }



    public function createMentor(array $data)
    {
        $firstname = trim($data["firstName"]);
        $lastName = trim($data["lastName"]);
        $email = trim($data["email"]);
        $password = trim($data["password"]);
        $pays = trim($data["pays"]);
        $langue = trim($data["langue"]);
        $role = trim($data["role"]);
        $bio = "nothing";

        $new_user = new Users();
        $new_user->setFirstName($firstname);
        $new_user->setLastName($lastName);
        $new_user->setEmail($email);
        $new_user->setPassword($password);
        $new_user->setPays($pays);
        $new_user->setLangue($langue);
        $new_user->setRole($role);
        $new_user->setBio($bio);

        $errors = $new_user->getErrors();

        if (count($errors) > 0) {
            require "views/account-create-form.php";
            return;
        }

        $createdUsers = $this->repo->createMentor($new_user);

        var_dump($createdUsers);
    }
  
    public function dashboard() {
        require __DIR__."/../../views/dashboard.php";
    }

    public function login(array $data) {
        $AllEleve = $this->repo->readAllEleve();
        $AllMentor = $this->repo->readAllMentor();

        $userId = $this->repo->userId($AllEleve, $AllMentor, $data);

        // var_dump($userId[0]);

        if ($userId == false) {
            var_dump("nooooooooooooo");
        } else if ($userId[1] == "eleve") {
            $_SESSION["id"] = $AllEleve[$userId[0]]["id"];
            $_SESSION["email"] = $AllEleve[$userId[0]]["email"];
            $_SESSION["prenom"] = $AllEleve[$userId[0]]["prenom"];
            $_SESSION["role"] = $AllEleve[$userId[0]]["role"];
            $_SESSION["langue"] = $AllEleve[$userId[0]]["langue"];
            $_SESSION["pays"] = $AllEleve[$userId[0]]["pays"];
            var_dump($_SESSION["email"]);
            var_dump($_SESSION["role"]);
            var_dump("yeaaaaaaaaaaaaa");
        } else if ($userId[1] == "mentor") {
            $_SESSION["id"] = $AllMentor[$userId[0]]["id"];
            $_SESSION["email"] = $AllMentor[$userId[0]]["email"];
            $_SESSION["prenom"] = $AllMentor[$userId[0]]["prenom"];
            $_SESSION["role"] = $AllMentor[$userId[0]]["role"];
            $_SESSION["langue"] = $AllMentor[$userId[0]]["langue"];
            $_SESSION["pays"] = $AllMentor[$userId[0]]["pays"];
            var_dump($_SESSION["email"]);
            var_dump($_SESSION["role"]);
            var_dump("yeaaaaaaaaaaaaa");
        }
    }

    public function offSession() {
        session_unset();
    }

    public function selectMentor() {
        $allMentor = $this->repo->readAllGoodMentor();

        $currentPage = 1;
        $id = 0;

        $nbrPages = count($allMentor);
        $count = 0;
        $limit = count($allMentor) - $id;
        if ($limit > 12) {
            $limit = 12;
        }
        for ($i = 0; $i < 1; $i++) {
            if ($nbrPages > 0) {
                $nbrPages -= 12;
                $count++;
                $i -= 1;
            }
        }

        require __DIR__. "/../../views/select-mentor.php";
    }

    public function selectMentorPages(array $data) {
        $allMentor = $this->repo->readAllGoodMentor();
        $count = $data["count"];
        $currentPage = $data["current-page"] + 1;
        $id = $data["id"] + 12;


        $limit = count($allMentor) - $id;
        if ($limit > 12) {
            $limit = 12;
        }

        if ($currentPage > $count) {
            $id -= 12;
            $currentPage -= 1;
            $limit += 12;
        }

        require __DIR__. "/../../views/select-mentor.php";
    }


    public function selectMentorPage(array $data) {
        $allMentor = $this->repo->readAllGoodMentor();
        $count = $data["count"];
        $currentPage = $data["current-page"] - 1;
        $id = $data["id"] -12;

        if ($id < 0) {
            $id = 0;
        }

        $limit = count($allMentor) - $id;
        if ($limit > 12) {
            $limit = 12;
        }

        if ($currentPage < 1) {
            $currentPage += 1;
        }

        require __DIR__. "/../../views/select-mentor.php";
    }

    public function addMentorHandle($id) {
        
        var_dump($id);
        var_dump($_SESSION["id"]);
        $createdEleveMentor = $this->repo->createEleveMentor($id, $_SESSION["id"]);
    }

    public function chat() {
        $allMessage = $this->repo->readAllMessage();

        require __DIR__. "/../../views/chat.php";
    }

    public function addMessage($data) {
        $readEleveMentor = $this->repo->readEleveMentor();
        $addMessage = $this->repo->addMessage($data, $readEleveMentor);
        $allMessage = $this->repo->readAllMessage();



        // $MainController->chat();
        require __DIR__. "/../../views/chat.php";
    }
}