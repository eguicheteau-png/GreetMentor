<?php
// require "./config/db-config.php";
// require "./views/navbar.php";

// require "auto-load.php";

// use App\Controller\FilmController;
// use App\Controller\PersonController;
// use App\Controller\UsersController;
// use App\Repository\FilmRepository;
// use App\Repository\PersonRepository;
// use App\Repository\UsersRepository;

// $repo = new PersonRepository($pdo);
// $controller = new PersonController($repo);

// $filmRepo = new FilmRepository($pdo);
// $filmController = new FilmController($filmRepo);

// $usersRepo = new UsersRepository($pdo);
// $usersController = new UsersController($usersRepo);


// // $route = $_GET["route"] ?? "person/index";
// $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// switch ($url) {
//     case "/person/showForm":
//         $controller->showCreationForm();
//         break;

//     case "/person/handleCreationForm":
//         $data = $_POST;
//         $controller->handleCreationForm($data);
//         break;

//     case "/person/index":
//         $controller->index();
//         break;
    
//     // case "/person/showOne":
//     //     $personId = $_GET["id"];
//     //     $controller->showById($personId);
//     //     break;

//     // case "/person/showOne":
//     //     $id = $_GET['id'];
//     //     $controller->showById($id);
//     //     break;

//     case "/person/showCreationForm":
//         $controller->showCreationForm();
//         break;

//     case "/person/handleCreationForm";
//         $data = $_POST;
//         $controller->handleCreationForm($data);
//         break;

//     case "/person/updatePerson":
//         $id = $_POST['id'];
//         var_dump($id);
//         $controller->showUpdateForm($id);
//         break;

//     case "/person/handleUpdateForm":
//         $data = $_POST;
//         $controller->handleUpdateForm($data);
//         break;

//     // Films
//     case "/film/index":
//         $filmController->index();
//         break;

//     case "/film/showOne":
//         $id = $_GET['id'];
//         $filmController->showById($id);
//         break;

//     case "/film/showCreationForm":
//         $filmController->showCreationForm();
//         break;

//     case "/film/handleCreationForm";
//         $data = $_POST;
//         $filmController->handleCreationForm($data);
//         break;

//     case "/film/updateFilm":
//         $id = $_POST['id'];
//         $filmController->showUpdateForm($id);
//         break;

//     case "/film/handleUpdateForm":
//         $data = $_POST;
//         $filmController->handleUpdateForm($data);
//         break;

//     case "/register/form":
//         $usersController->registerForm();
//         break; 

//     case "/users/handleregister":
//         $data = $_POST;
//         $usersController->handlecreation($data);
//         break;


//     default:
//         http_response_code(404);
//         echo "Route introuvable";


// }

var_dump("oqjigsdvq");


// http://localhost/?route="person/showOne"


