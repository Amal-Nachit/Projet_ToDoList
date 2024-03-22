<?php
include("./autoload.php");
use DbConnexion\DbConnexion;
use Task\Task;
use TaskManager\TaskManager;

// if(isset($_POST)){
//     $data = file_get_contents("php://input");

//     $decodedTask = (json_decode($data, true));


//     $task = new Task($decodedTask);
  

//     $dbConnexion = new DbConnexion();

//     $taskManager = new TaskManager($dbConnexion);

//     if($taskManager->insertTask(($task))){
//         $_SESSION["id"] = $task->getIDTASK();
//         echo "inserted";
//     }else{
//         echo "Error";
//     }


if (isset($_POST)) {
    $data = file_get_contents("php://input");

    // Décoder les données JSON et convertir en tableau
    $decodedTask = json_decode($data, true);

    // Vérifier si $decodedTask est un tableau
    if (is_array($decodedTask)) {
        // Si c'est un tableau, crée une nouvelle instance de Task
        $task = new Task($decodedTask);

        $dbConnexion = new DbConnexion();
        $taskManager = new TaskManager($dbConnexion);

        if ($taskManager->insertTask($task)) {
            $_SESSION["id"] = $task->getIDTASK();
            echo "inserted";
        } else {
            echo "Error";
//         }
//     } else {
//         // Gérer le cas où $decodedTask n'est pas un tableau
//         echo "Error: Les données reçues ne sont pas au format attendu.";
//     }
// } else {
//     echo "Error: Aucune donnée POST reçue.";
}
    }
}