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
    case "/":
        $MainController->index();
        break;

}

switch ($url) {
    case "/dashboard":
        $MainController->dashboard();
        break;
}

var_dump("It's the page");


