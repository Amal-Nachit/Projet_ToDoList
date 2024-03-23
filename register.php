<?php
session_start();
use User\User;
use UserManager\UserManager;
include("./autoload.php");

if(isset($_POST)){
    $data = file_get_contents("php://input");

    $decodedUser = (json_decode($data, true));


    $user = new User($decodedUser);
  
    $dbConnexion = new $dbConnexion();

    $userManager = new UserManager($dbConnexion);


    
    if($userManager->checkUserExist($user) ){
        echo "Email already taken";
        return;
    }



    if($userManager->register(($user))){
        $_SESSION["id"] = $user->getIDUSER();
        echo "inserted";
    }else{
        echo "Error";
    }

}
