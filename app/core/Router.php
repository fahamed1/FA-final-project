<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\UserController;
//use app\controllers\FeedbackController;
use app\controllers\AQController;

class Router {
    public $urlArray;

    function __construct()
    {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handleUserRoutes();
       // $this->handleFeedbackRoutes();
        $this->handleAirQualityRoutes();
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {

        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        } else {
            $mainController = new MainController();
            $mainController->notFound();
        }
    }

    protected function handleUserRoutes() {
        if ($this->urlArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->usersView();
        }

        //give json/API requests a api prefix
        if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new UserController();
            $userController->getUsers();
        }
    }

    // protected function handleFeedbackRoutes() {         
//    if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'feedback' && $_SERVER['REQUEST_METHOD'] === 'POST') {
//         error_log("Routing to Feedback POST");
//         $feedbackController = new FeedbackController();
//         $feedbackController->saveFeedback();
        
//     }
    
//     // Match GET requests to /api/feedback
//     if ($this->urlArray[1] === 'api' && $this->urlArray[2] === 'feedback' && $_SERVER['REQUEST_METHOD'] === 'GET') {
//         $feedbackController = new FeedbackController();
//         $feedbackController->getFeedback();

// if ($_SERVER['REQUEST_URI'] == '/submit-feedback' && $_SERVER['REQUEST_METHOD'] == 'POST') {
//     $feedbackController = new FeedbackController();
//     $feedbackController->submitFeedback();
// }

//     }

//     }

    // protected function handleAirQualityRoutes() {
    //     if ($_SERVER['REQUEST_URI'] == '/submit-feedback' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $feedbackController = new FeedbackController();
    //         $feedbackController->submitFeedback();
    //     }
        
    // }
// 
//     
}