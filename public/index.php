<?php

// Include required files
require_once '../app/core/setup.php';
require_once "../app/core/Router.php";
require_once '../app/models/Model.php';
require_once '../app/models/User.php';
require_once "../app/models/Feedback.php";
require_once "../app/controllers/UserController.php";
require_once '../app/controllers/MainController.php';
require_once '../app/controllers/FeedbackController.php';

use app\controllers\UserController;
use app\controllers\MainController;
use app\controllers\FeedbackController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use app\core\Router;
$router = new Router();

$url = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $url);

// if ($uriArray[1] === 'api' && $uriArray[2] === 'users') {
//     $userController = new UserController();
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $userController->saveUserData();
//     } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
//         $userController->getUsersData();
//     }
//     exit();
// }

// if ($uriArray[1] === 'api' && $uriArray[2] === 'feedback' && $_SERVER['REQUEST_METHOD'] === 'POST') {
//     $feedbackController = new FeedbackController();
//     $feedbackController->saveFeedback();
//     exit();
// }

// if ($uriArray[1] === '' || $uriArray[1] === 'homepage') {
//     $mainController = new MainController();
//     $mainController->homepage();
//     exit();
// }

// Default fallback for unknown routes
http_response_code(404);
echo json_encode(["error" => "Route not found"]);
exit();

?>

