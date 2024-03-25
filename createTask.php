<?php
use Task\Task;
use TaskManager\TaskManager;
session_start();
use DbConnexion\DbConnexion;
include("./autoload.php");


if(isset($_POST)){
    $data = file_get_contents("php://input");

    $decodedTask = (json_decode($data, true));

    $task = new Task($decodedTask);
  
    $dbConnexion = new DbConnexion();

    $taskManager = new TaskManager($dbConnexion);


     if($taskManager->insertTask(($task))){

        echo "success";
    }else{
        echo "Error";
    }
}