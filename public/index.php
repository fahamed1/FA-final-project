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
// require_once '../app/controllers/AQController.php';
//require_once '../app/models/AQModel.php';

use app\core\setup;
use app\controllers\UserController;
use app\controllers\MainController;
use app\controllers\FeedbackController;
use app\controllers\AQController;


use app\core\Router;
$router = new Router();
error_log('Router initialized');

$router->handleFeedbackRoutes();

$url = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $url);

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'feedback' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackController = new FeedbackController();
    $feedbackController->saveFeedback();
}



//views


if ($uri === '/feedback' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $feedbackController = new FeedbackController();
    $feedbackController->usersFeedback();
}


exit();

// Default fallback for unknown routes
http_response_code(404);
echo json_encode(["error" => "Route not found"]);
exit();

?>

