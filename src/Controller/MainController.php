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
}