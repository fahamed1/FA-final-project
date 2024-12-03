<?php

namespace app\controllers;
use app\models\User;

class UserController extends Controller {
    public function getUsersData() {
        $userAQModel = new User();
    
        $data = $userAQModel->getSavedUserAQData();
        
        //$this->returnView('./assets/views/userview.html', ['data' => $data]);
        if ($data) {
            $this->returnJSON($data);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'No data found.']);
        }
        exit();
    }

    public function saveUserData() {
        $city = $_POST['city'] ?: null;
        $errors = [];

        if ($city) {
            $city = htmlspecialchars($city);

            if (strlen($city) < 2) {
                $errors['city'] = 'City name is too short';
            }
        } else {
            $errors['city'] = 'City name is required';
        }

        //If error 
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $userAQModel = new User();
        $data = $userAQModel->getAllUsersData($city);
        var_dump($data);

        if ($data) {
            // Return the saved data as a JSON response
            echo json_encode($data);
        } else {
            // Handle API or database errors
            http_response_code(500);
            echo json_encode(['error' => 'Failed to fetch and save air quality data.']);
        }

        exit();
    }

    }

    public function usersView() {
        $this->returnView('./assets/views/users/usersView.html');
    }



