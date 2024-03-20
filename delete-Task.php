<?php
include("./autoload.php");

use DbConnexion\DbConnexion;
use TaskManager\TaskManager;


// J'ai passé dans l'url , l'id du produit a supprimer, via le lien
if(isset($_GET["id"])){

    // Instance de connexion
$dbConnexion = new DbConnexion();
// instance du manager de produit pour utiliser les fonctions
$manager = new TaskManager($dbConnexion);


// Je récupère l'id passé dans le lien pour le passer à ma fonction deleteTask
  if ($manager->deleteTask($_GET["id"])) {
        header("Location:index.php");
        echo "success";
    } else {
        var_dump('tu as fauter');
    }
}