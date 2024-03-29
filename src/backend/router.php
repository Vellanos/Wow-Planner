<?php

// Charge les fichiers des classes des contrôleurs.
require __DIR__ . "/Controllers/HomeController.php";
require __DIR__ . "/Controllers/AuthController.php";
require __DIR__ . "/Controllers/ProfileController.php";
require __DIR__ . "/Controllers/PersonnageController.php";
require __DIR__ . "/Controllers/EventController.php";

// Crée des instances des contrôleurs.
$homeController = new HomeController();
$authController = new AuthController();
$profileController = new ProfileController();
$personnageController = new PersonnageController();
$eventController = new EventController();

// Récupère l'URI de la requête actuelle pour déterminer la route demandée par l'utilisateur.
$route = $_SERVER['REQUEST_URI'];

$uri = parse_url($route);
$uri_path = $uri['path'];

switch ($route) {
    case URL_HOMEPAGE:
        $homeController->index();
        break;
    case URL_AUTH_Login:
        $authController->index_Login();
        break;
    case URL_AUTH_Login . "/treatment":
        $authController->fLogin();
        break;
    case URL_AUTH_SignUp:
        $authController->index_SignUp();
        break;
    case URL_AUTH_SignUp . "/treatment":
        $authController->fSignUp();
        break;
    case URL_AUTH_Profile:
        $profileController->isLogged();
        $profileController->index();
        break;
    case URL_AUTH_Profile . "/logout":
        $profileController->isLogged();
        $profileController->logout();
        break;
    case URL_AUTH_Profile . "/User":
        $profileController->isLogged();
        $profileController->indexUser();
        break;
    case URL_AUTH_Profile . "/User/Edit":
        $profileController->isLogged();
        $profileController->indexUserEdit();
        break;
    case URL_AUTH_Profile . "/User/Edit/treatment":
        $profileController->isLogged();
        $profileController->editProfile();
        break;
    case URL_AUTH_Profile . "/User/Delete":
        $profileController->isLogged();
        $profileController->deleteProfile();
        break;
    case URL_AUTH_Profile . "/Characters":
        $profileController->isLogged();
        $personnageController->index();
        break;
    case URL_AUTH_Profile . "/Characters/Create":
        $profileController->isLogged();
        $personnageController->indexCreate();
        break;
    case URL_AUTH_Profile . "/Characters/Create/treatment":
        $profileController->isLogged();
        $personnageController->Create();
        break;
    case URL_AUTH_Profile . "/Characters/Edit":
        $profileController->isLogged();
        $personnageController->indexEdit();
        break;
    case URL_AUTH_Profile . "/Characters/Edit/treatment":
        $profileController->isLogged();
        $personnageController->editCharacter();
        break;
    case URL_AUTH_Profile . "/Characters/Delete":
        $profileController->isLogged();
        $personnageController->deleteCharacter();
        break;
    case str_contains($route, $uri_path) && $uri_path === "/~david/brief_wow_planner/public/Profile/Characters/Details":
        $profileController->isLogged();
        $uri_query = $uri['query'];
        parse_str($uri_query, $output);
        $personnageController->indexDetails($output['id']);
        break;
    case URL_AUTH_Profile . "/Events":
        $profileController->isLogged();
        $eventController->index();
        break;
    case URL_AUTH_Profile . "/Events/Create":
        $profileController->isLogged();
        $eventController->indexCreate();
        break;
    case URL_AUTH_Profile . "/Events/Create/treatment":
        $profileController->isLogged();
        $eventController->Create();
        break;
    case URL_AUTH_Profile . "/Events/Edit":
        $profileController->isLogged();
        $eventController->indexEdit();
        break;
    case URL_AUTH_Profile . "/Events/Edit/treatment":
        $profileController->isLogged();
        $eventController->editEvent();
        break;
    case URL_AUTH_Profile . "/Events/Delete":
        $profileController->isLogged();
        $eventController->deleteEvent();
        break;
    case str_contains($route, $uri_path) && $uri_path === "/~david/brief_wow_planner/public/Profile/Events/Details":
        $profileController->isLogged();
        $uri_query = $uri['query'];
        parse_str($uri_query, $output);
        $eventController->indexDetails($output['id']);
        break;
    default:
        $homeController->not_found_404();
        break;
}
