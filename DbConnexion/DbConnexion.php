<?php

namespace DbConnexion;

class DbConnexion{

    private $host   = "localhost";
    private $login  = "todo list";
    private $pass   = "Password123";
    private $bdd    = "todolist";
    private $pdo;

    function __construct()
    {
        try {
           
         $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->bdd};charset=utf8", $this->login, $this->pass);
        } catch (\PDOException $e) {
            die("Service indisponible");
        }
    }
    public function prepare($dbConnexion) {
        return $this->$dbConnexion->prepare($dbConnexion);
    }

    // public function close() {
    //     $this->$dbConnexion->close();
    // }
    public function getPDO()
    {
        return $this->pdo;
 
    }
}