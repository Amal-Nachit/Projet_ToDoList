<?php
include("./autoload.php");
use DbConnexion\DbConnexion;
use Task\Task;
use TaskManager\TaskManager;

if(isset($_POST)){
    $data = file_get_contents("php://input");

    $decodedTask = (json_decode($data, true));


    $task = new Task($decodedTask);
  

    $dbConnexion = new DbConnexion();

    $taskManager = new TaskManager($dbConnexion);

    if($taskManager->insertTask(($task))){
        $_SESSION["id"] = $task->getIDTASK();
        echo "inserted";
    }else{
        echo "Error";
    }

}