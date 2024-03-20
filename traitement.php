<?php
include("autoload.php");

session_start();
use Category\Category;
use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use Task\Task;
use TaskManager\TaskManager;

if (isset($_POST["addTask"])) {
    $obj = new Task($_POST);
    $dbConnexion = new DbConnexion;
    $manager = new TaskManager($dbConnexion);
    if ($manager->insertTask($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauté');
    }
}

if (isset($_POST["addCategory"])) {
    $obj = new Category($_POST);
    $dbConnexion = new DbConnexion;
    $manager = new CategoryManager($dbConnexion);
    if ($manager->insertCategory($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauté');
    }
}

if (isset($_POST["editTask"])) {
    $obj = new Task($_POST);
    $obj->setIDTASK($_SESSION["idToUpdate"]);
    $dbConnexion = new DbConnexion;
    $manager = new TaskManager($dbConnexion);
    if ($manager-> editTask($obj)) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauté');
    }
}

