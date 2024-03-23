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



// include('./DbConnexion/DbConnexion.php');

if (isset($_POST["addTask"])) {
    $taskTitle = $_POST['taskTitle'];
    $taskDate = $_POST['taskDate'];
    $idPriority = $_POST['idPriority'];
    $taskDescription = $_POST['taskDescription'];

    if(empty($taskTitl || $taskDate || $idPriority)){
        header('location:index.php?message=Vous devez remplir les champs obligatoires');
    }else{
        $query = $taskManager->insertTask($task);   
    }
    try {
        $stmt = $conn->prepare("INSERT INTO `tdl_task` (`ID_TASK`, `DATE`, `TITLE`, `ID_PRIORITY`, `DESCRIPTION`) VALUES (NULL, :task-Date, :task-Title, :id_priority, :task-description)");

        $stmt->bindParam(':task-Title', $taskTitle, PDO::PARAM_STR);
        $stmt->bindParam(':task-Date', $taskDate, PDO::PARAM_INT);
        $stmt->bindParam(':id_priority', $idPriority, PDO::PARAM_STR);
        $stmt->bindParam(':task-description', $taskDescription);
        
        $stmt->execute();

        echo "
        <script>
            alert('Task Added Successfully');
        </script>
        ";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "
        <script>
            // alert('Failed to Add Task');
        </script>
        ";
}