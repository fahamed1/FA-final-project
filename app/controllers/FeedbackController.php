<?php

namespace app\controllers;

use app\models\Feedback;

class FeedbackController
{
        public function validateFeedback($inputData) {
        $errors = [];
        $firstName = $inputData['firstName'];
        $lastName = $inputData['lastName'];
        $feedbackMessage = $inputData['feedbackMessage'];

        if ($firstName) {
            $firstName = htmlspecialchars($firstName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($firstName) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
        }

        if ($feedbackMessage) {
            $feedbackMessage = htmlspecialchars($feedbackMessage, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($feedbackMessage) < 10) {
                $errors['feedbackMessageShort'] = 'Add more feedback';
            }
        } else {
            $errors['requiredFeedbackMessage'] = 'Feedback is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        // $firstName = htmlspecialchars($firstName, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // $lastName = htmlspecialchars($lastName, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // $feedbackMessage = htmlspecialchars($feedbackMessage, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'feedbackMessage' => $feedbackMessage,
        ];
    } 

    public function saveFeedback() {
        $inputData = [
            'firstName' => $_POST['firstName'] ? $_POST['firstName'] : false,
            'lastName' => $_POST['lastName'] ? $_POST['lastName'] : false,
            'feedbackMessage' => $_POST['feedbackMessage'] ? $_POST['feedbackMessage'] : false,
        ];
        $feedbackData = $this->validateFeedback($inputData);

        $feedback = new Feedback();
        $feedback->saveFeedback(
            [
                'firstName' => $feedbackData['firstName'],
                'lastName' => $feedbackData['lastName'],
                'feedbackMessage' => $feedbackData['feedbackMessage'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    // public function usersView() {
    //     include '../public/assets/views/user/users-view.html';
    //     exit();
    // }

    public function usersFeedback() {
        include '../public/assets/views/main/feedback.html';
        exit();
    }

}