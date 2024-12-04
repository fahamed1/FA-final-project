<?php

namespace app\models;

abstract class Model {

    public function findAll() {
        $query = "select * from $this->table";
        return $this->query($query);
    }

    private function connect() {

//         $type = 'mysql';
//         $port = '8889';
//         $charset = 'utf8mb4';

// //      some of these are optional
//         $dsn = "$type:hostname=" . DBHOST .";dbname=" . DBNAME . ";port=$port;charset=$charset";

//         $options = [
//             //we can set the error mode, to throw exceptions or PDO type errors
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//             //set the default fetch type
//             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//         ];

//         try {
//             return new PDO($dsn, DBUSER, DBPASS, $options);
//         } catch (PDOException $e) {
//             throw new PDOException($e->getMessage(), $e->getCode());
//         }

        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new \PDO($string, DBUSER, DBPASS);
        return $con;

        try {
            $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
            $con = new \PDO($string, DBUSER, DBPASS);
            $con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (\PDOException $e) {
            // Catching the error and printing the message
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