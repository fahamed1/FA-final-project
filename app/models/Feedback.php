<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Feedback extends Model {

    public function getAllFeedback() {
        $query = "SELECT * FROM feedback";
        return $this->fetchAll($query);
    }

    public function getFeedbackByUser($name) {
        $query = "select * from feedback WHERE CONCAT(firstName,' ',lastName) like :name";
        return $this->fetchAllWithParams($query, ['name' => '%' . $name . '%']);
    }

    public function saveFeedback($inputData) {
        $query = "INSERT INTO feedback (firstName, lastName, feedbackMessage) VALUES (:firstName, :lastName, :feedbackMessage)";

        return $this->query($query, $inputData);
    }

}
