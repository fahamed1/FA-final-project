<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Feedback extends Model {

    public function saveFeedback($inputData){
        $query = "insert into feedback (firstName, lastName, feedbackMessage) values (:firstName, :lastName, :feedbackMessage);";
        return $this->fetchAllWithParams($query, $inputData);
    }

}