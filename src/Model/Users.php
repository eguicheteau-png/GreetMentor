<?php

namespace App\Model;


class Users
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $pays;
    private $langue;
    private $role;
    private $bio;
    public $errors = [];

    public function __construct($firstname = null, $lastname = null, $email = null, $password = null, $pays = null, $langue = null, $role = null, $bio = null, $id = null) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->pays = $pays;
        $this->langue = $langue;
        $this->role = $role;
        $this->bio = $bio;
        $this->id = $id;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function getFirstName()
    {
        return $this->firstname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function getPays()
    {
        return $this->pays;
    }

    public function getLangue()
    {
        return $this->langue;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getBio()
    {
        return $this->bio;
    }






        public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail($email)
    {
        if (strlen($email) < 5) {
            $this->errors["email"] = "l'email' est trop petit donc en gros tu dois rajouter des caractère stp";
            return;
        }
        $this->email = $email;
    }

    public function setPassword($password)
    {
        if (strlen($password) < 5) {
            $this->errors["password"] = "le mots de passe est trop petit donc en gros tu dois rajouter des caractère stp, ps: ça arrive d'oublier des mots de passe mais tkt on vas rajouter un bouton 'mot de passe oublier ?'";
            return;
        } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $this->password = $passwordHash;
        }
    }


    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }
}