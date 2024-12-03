<?php

// Include required files
require '../app/core/setup.php';
require "../app/models/User.php";
require "../app/models/Feedback.php";
require "../app/controllers/UserController.php";
require '../app/controllers/MainController.php';
require '../app/controllers/FeedbackController.php';

use app\controllers\UserController;
use app\controllers\MainController;
use app\controllers\FeedbackController;

use app\core\Router;
$router = new Router();

$url = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'users') {
    $userController = new UserController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userController->saveUserData();
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $userController->getUsersData();
    }
    exit();
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'feedback' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackController = new FeedbackController();
    $feedbackController->saveFeedback();
    exit();
}

if ($uriArray[1] === '' || $uriArray[1] === 'homepage') {
    $mainController = new MainController();
    $mainController->homepage();
    exit();
}

// Default fallback for unknown routes
http_response_code(404);
echo json_encode(["error" => "Route not found"]);
exit();

?>

