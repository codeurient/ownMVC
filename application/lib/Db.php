<?php

namespace application\lib;

use PDO;

class Db {

    protected $db;

    public function __construct(){
        $config = require 'application/config/db.php';
        $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password'], $option);
    }

    public function query($sql, $params = []) {
         $stmt = $this->db->prepare($sql);
         if (!empty($params)) {
             foreach ($params as $key => $val){
                 $stmt->bindValue(':'.$key, $val);
             }
         }
         $stmt->execute();
         return $stmt;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll();
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        // fetchColumn() используется для извлечения одного столбца из базы данных
        return $result->fetchColumn();
    }
}



//function dbConnection(){
//    $driver = 'mysql';
//    $host = 'localhost';
//    $db_name = 'practice';
//    $db_user = 'root';
//    $db_pass = 'root';
//    $charset = 'utf8';
//
//    $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
//
//    try {
//        return new PDO(
//            "$driver:host=$host;dbname=$db_name;charset=$charset",
//            $db_user, $db_pass, $option
//        );
//    }catch (PDOException $i) {
//        die("Could not connect to database");
//    }
//}