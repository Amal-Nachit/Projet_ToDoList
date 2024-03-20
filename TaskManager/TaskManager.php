<?php

namespace TaskManager;

use DbConnexion\DbConnexion;
use Task\Task;

class TaskManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupére la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }

    public function getAllTasks()
    {
        // On déclare une variable products comme tableau vide
        $tasks = [];

        try {
            // Le manager récupère l'instance de connexion pdo fournit par la classe DBConnexion
            // Il utilise cette instance de connexion et utilise la fonction query qui commme son nom l'indique
            // requête sur la bdd via notre instance de connexion
            $stmt = $this->pdo->query("SELECT * FROM tdl_task");

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // Pour chaque ligne de résultat de la requête on ajoute 
                // cette ligne dans $products
                // au format Product ( notre classe qui agit comme un moule a gauffre)
                // Dans products se trouvera un tableau d'objet au format Product
                // Et donc avec les méthodes de classes ( getters et setters)
                $tasks[] = new Task($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
            // Ici si il y a une erreur on la var_dump
        }

        // Une fois la requete finie on return le tableau de products
        return $tasks;
    }


    public function insertTask(Task $objet)
    {

        $idTask = $objet->getIDTASK();
        $titleTask = $objet->getTITLE();
        $descriptionTask = $objet->getDESCRIPTION();
        $dateTask = $objet->getDATE();
        $idUser = $objet->getIDUSER();
        $idPriority = $objet->getIDPRIORITY();
        
        try {

            $stmt = $this->pdo->prepare("INSERT INTO tdl_task VALUES(NULL,?,?,?,?,?)");

            $stmt->execute([$idTask, $titleTask, $descriptionTask,$dateTask, $idUser, $idPriority]);

            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }

    public function deleteTask($id)
    {
        try {
            // Après avoir récupéré l'id en GET, je passe cet id dans ma requête SQL, 

            $stmt = $this->pdo->query("DELETE FROM tdl_task WHERE idTask = $id");
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }



    public function getSingleTaskById($id)
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_task INNER JOIN tdl_category ON tdl_task.idTask = tdl_category.idTask  WHERE idTask = $id ");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $task = new Task($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
        }
        return $task;
    }


    public function editTask(Task $objet)
    {
        $idTask = $objet->getIDTASK();
        $titleTask = $objet->getTITLE();
        $descriptionTask = $objet->getDESCRIPTION();
        $dateTask = $objet->getDATE();
        $idUser = $objet->getIDUSER();
        $idPriority = $objet->getIDPRIORITY();

        try {
    
            $stmt = $this->pdo->prepare("UPDATE `tdl_task` SET `TITLE` = ?,`DESCRIPTION` = ?,`DATE` = ?, `ID_USER` = ?, `ID_PRIORITY` = ? WHERE `tdl_task`.`ID_TASK` = '$idTask' ");
            $stmt->execute([$idTask, $titleTask, $descriptionTask,$dateTask, $idUser, $idPriority]);
      return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }
    }
}