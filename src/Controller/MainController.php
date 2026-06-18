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
}
