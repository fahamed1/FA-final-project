<?php

namespace app\controllers;

class MainController extends Controller {

    public function homepage() {
        //remember to route relative to index.php
        //require page and exit to return an HTML page
        // $this->returnView('./assets/views/main/homepage.html');

        $userAQModel = new \app\models\User(); 
        $data = $userAQModel->getSavedUserAQData(); 

        ob_start();
        include './assets/views/main/homepage.html'; 
        $content = ob_get_clean();

       
        exit();
    }

    public function notFound() {
    }

}