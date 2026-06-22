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


    public function createUser(array $data)
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

        $createdUsers = $this->repo->create($new_user);

        var_dump($createdUsers);
    }
  
    public function dashboard() {
        require __DIR__."/../../views/dashboard.php";
    }

    public function login(array $data) {
        $AllUsers = $this->repo->readAllUsers();

        // var_dump($AllUsers);
        $userId = $this->repo->userId($AllUsers, $data);

        if ($userId == false) {
            var_dump("nooooooooooooo");
        } else {
            $_SESSION["email"] = $AllUsers[$userId]["email"];
            $_SESSION["prenom"] = $AllUsers[$userId]["prenom"];
            $_SESSION["role"] = $AllUsers[$userId]["role"];
            $_SESSION["langue"] = $AllUsers[$userId]["langue"];
            $_SESSION["pays"] = $AllUsers[$userId]["pays"];
            var_dump($_SESSION["email"]);
            var_dump("yeaaaaaaaaaaaaa");
        }
    }

    public function offSession() {
        session_unset();
    }

    public function selectMentor() {
        $allMentor = $this->repo->readAllMentor();

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
        $allMentor = $this->repo->readAllMentor();
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
        $allMentor = $this->repo->readAllMentor();
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
}