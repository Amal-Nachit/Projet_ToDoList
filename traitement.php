<?php
include("autoload.php");

session_start();
use Category\Category;
use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use Task\Task;
use TaskManager\TaskManager;

// if (isset($_POST["addTask"])) {
//     $obj = new Task($_POST);
//     $dbConnexion = new DbConnexion;
//     $manager = new TaskManager($dbConnexion);
//     if ($manager->insertTask($obj)) {
//         header("Location:index.php");
//         echo "success";
//     } else {
//         var_dump('tu as fauté');
//     }
// }

// if (isset($_POST["addCategory"])) {
//     $obj = new Category($_POST);
//     $dbConnexion = new DbConnexion;
//     $manager = new CategoryManager($dbConnexion);
//     if ($manager->insertCategory($obj)) {
//         header("Location:index.php");
//         echo "success";
//     } else {
//         var_dump('tu as fauté');
//     }
// }

// if (isset($_POST["editTask"])) {
//     $obj = new Task($_POST);
//     $obj->setIDTASK($_SESSION["idToUpdate"]);
//     $dbConnexion = new DbConnexion;
//     $manager = new TaskManager($dbConnexion);
//     if ($manager-> editTask($obj)) {
//         header("Location:index.php");
//         echo "success";
//     } else {
//         var_dump('tu as fauté');
//     }
// }


// Assurez-vous que la session est démarrée pour utiliser $_SESSION
session_start();

// Vérifiez si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $taskName = $_POST['task-Name'];
    $taskDate = $_POST['task-Date'];
    $idPriority = $_POST['id_priority'];
    $idCategory = $_POST['id_category'];
    $taskDescription = $_POST['task-description'];

    // Validez les données si nécessaire (par exemple, vérifiez si elles ne sont pas vides)
    if (empty($taskName) || empty($taskDate) || empty($idPriority) || empty($idCategory) || empty($taskDescription)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Connectez-vous à la base de données
    $dbConnexion = new DbConnexion(); // Assurez-vous que cette classe est correctement définie

    // Préparez la requête SQL pour insérer la tâche
    $sql = "INSERT INTO tdl_task (NAME, DATE, ID_PRIORITY, ID_CATEGORY, DESCRIPTION) VALUES (?, ?, ?, ?, ?)";
    $stmt = $dbConnexion->prepare($sql);

    // Liez les paramètres à la requête préparée
    $stmt->bind_param("ssiis", $taskName, $taskDate, $idPriority, $idCategory, $taskDescription);

    // Exécutez la requête
    if ($stmt->execute()) {
        // Redirigez l'utilisateur ou affichez un message de succès
        echo "La tâche a été ajoutée avec succès.";
    } else {
        // Gérez les erreurs
        echo "Une erreur est survenue lors de l'ajout de la tâche : " . mysqli_error($dbConnexion);
    }

    // Fermez la connexion à la base de données
    $stmt->close();
    $dbConnexion->close();
}