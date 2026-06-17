<?php
require "./config/db-config.php";

require "auto-load.php";

use App\Controller\MainController;
use App\Repository\MainRepository;

$repo = new MainRepository($pdo);
$MainController = new MainController($repo);


$route = $_GET["route"] ?? "/";
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case "/login":
        $MainController->index();
        break;

    case "/account/create/form":
        $MainController->createAccountForm();
        break;

    case "/handle/create/account":
        $data = $_POST;
        $MainController->createUser($data);
        break;
}




