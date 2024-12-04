<?php

namespace app\models;

abstract class Model {

    public function findAll() {
        $query = "select * from $this->table";
        return $this->query($query);
    }

    private function connect() {
        // $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        // $con = new \PDO($string, DBUSER, DBPASS);
        // return $con;

        // try {
        //     $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        //     $con = new \PDO($string, DBUSER, DBPASS);
        //     $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        //     return $con;
        // } catch (\PDOException $e) {
        //     // Catching the error and printing the message
        //     die("Database connection failed: " . $e->getMessage());
        // }

        try {
            $string = "mysql:host=" . DBHOST . ";port=8889;dbname=" . DBNAME;
            $con = new \PDO($string, DBUSER, DBPASS); // DBPASS can be empty
            $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

    }

    public function query($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            $result = $stm->fetchAll(\PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}