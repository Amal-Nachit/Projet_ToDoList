<?php
use Task\Task;
use TaskManager\TaskManager;
session_start();
use User\User;
use UserManager\UserManager;
use DbConnexion\DbConnexion;
include("./autoload.php");

if(isset($_POST)){
    $data = file_get_contents("php://input");

    $decodedUser = (json_decode($data, true));


    $user = new User($decodedUser);
  
    $dbConnexion = new DbConnexion();

    $userManager = new UserManager($dbConnexion);


    if($userManager->checkUserExist($user) ){
        echo "Email already taken";
        return;
    }

    var_dump("USER", $user);

    var_dump($user->getIDUSER());

    if($userManager->register(($user))){
        $_SESSION["id"] = $user->getIDUSER();
        header("Location: connexion.php");
    }else{
        echo "Error";
    }


}



if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // 
  header('location:./index.php');
  die;
}

$succes = null;
$echec = null;
if (isset($_GET['succes']) && $_GET['succes'] === "inscription") {
  $succes = true;
}
if (isset($_GET['erreur'])) {
  $echec = true;
}

