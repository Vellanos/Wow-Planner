<?php

// Charge les fichiers des classes des contrôleurs.
require __DIR__ . "/Controllers/HomeController.php";
require __DIR__ . "/Controllers/AuthController.php";

// Crée des instances des contrôleurs.
$homeController = new HomeController();
$authController = new AuthController();

// Récupère l'URI de la requête actuelle pour déterminer la route demandée par l'utilisateur.
$route = $_SERVER['REQUEST_URI'];

switch ($route) {
    case URL_HOMEPAGE:
        $homeController->index();
        break;
    case URL_AUTH_Login:
        $authController->index_Login();
        break;
    case URL_AUTH_SignUp:
        $authController->index_SignUp();
        break;
    default:
        $homeController->not_found_404();
        break;
}