<?php
session_start();
use DbConnexion\DbConnexion;
use Task\Task;
use TaskManager\TaskManager;
include("./autoload.php");

if(isset($_POST)){
    $data = file_get_contents("php://input");
    // Php a besoin de JSON decode pour interpréter du JSON, on applique donc cette fonction
    $decodedTask = (json_decode($data, true));


    // on applique le format de la classe User pour avoir accès aux méthodes de cette classse ( ex: $user->getId())
    $task = new Task($decodedTask);
  
    // On instancie une connexion à notre base de données
    $dbConnexion = new DbConnexion();
    // Que l'on peut passer à TaskManager
    $taskManager = new TaskManager($dbConnexion);

    
    // ici je pourrais utilsier une fonction de UserManager pour vérifier que l'email n'existe pas et renvoyé une erreur si il existe

    // Je peux égalemment  vérifier a travers une fonction checkEmail exist
    // if($userManager->checkEmailExist){
    //      echo "Email already taken "
    // }


    if($taskManager->insertTask(($task))){
        $_SESSION["id"] = $task->getIDTASK();
        echo "inserted";
    }else{
        echo "Error";
    }






}
