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
}