<?php
session_start();

require "./config/db-config.php";

require "auto-load.php";

use App\Controller\MainController;
use App\Repository\MainRepository;

$repo = new MainRepository($pdo);
$MainController = new MainController($repo);


$route = $_GET["route"] ?? "/";
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {

    case "/":
        $MainController->index();
        break;

    case "/login":
        $MainController->loginForm();
        break;

    case "/account/create/form":
        $MainController->createAccountForm();
        break;
    
    case "/dashboard":
        $MainController->dashboard();
        break;

    case "/handle/create/account":
        $data = $_POST;
        $MainController->createUser($data);
        break;

    case "/handle/login":
        $data = $_POST;
        $MainController->login($data);
        break;

    case "/off/session":
        $MainController->offSession();
        break;
}



