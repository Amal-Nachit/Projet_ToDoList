<?php
namespace TaskManager;

use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use RelationTaskCategoryManager\RelationTaskCategoryManager;
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
        $tasks = [];

        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_task");

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
 
                $tasks[] = new Task($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);

        }

        return $tasks;
    }

public function insertTask(Task $objet)
{
session_start();


    $titleTask = $objet->getTITLE();
    $descriptionTask = $objet->getDESCRIPTION();
    $dateTask = $objet->getDATE();
    $idUser = 3;
    $idPriority = $objet->getIDPRIORITY();
    
    try {
        // Préparation de la requête SQL pour insérer une nouvelle tâche
        // Supposons que l'ID de la tâche est généré automatiquement par la base de données
        $stmt = $this->pdo->prepare("INSERT INTO tdl_task VALUES (NULL,?, ?, ?, ?, ?)");
        
        // Exécution de la requête avec les valeurs appropriées
        $stmt->execute([$titleTask, $descriptionTask, $dateTask, $idUser, $idPriority]);
        
        // Retourne true si une ligne a été insérée, false sinon
        return $stmt->rowCount() == 1;
    } catch (\PDOException $e) {
        // Gestion de l'erreur
        var_dump($e);
        // Retourne false en cas d'erreur
        return false;
    }
}


    public function deleteTask($id)
    {
    try {
        // Préparation de la requête SQL pour supprimer une tâche
        $stmt = $this->pdo->prepare("DELETE FROM tdl_task WHERE idTask = ?");
        // Exécution de la requête avec l'ID de la tâche comme paramètre
        $stmt->execute([$id]);
        // Retourne true si une ligne a été supprimée, false sinon
        return $stmt->rowCount() == 1;
    } catch (\PDOException $e) {
        // Gestion de l'erreur
        var_dump($e);
        // Retourne false en cas d'erreur
        return false;
    }
    }




    public function getSingleTaskById($id)
    {
        try {
            $stmt = $this->pdo->query(" SELECT tdl_task.*, tdl_category.NAME AS CategoryName,
            tdl_priority.NAME AS PriorityName
            FROM tdl_task
            INNER JOIN tdl_relation_task_category ON tdl_task.ID_TASK = tdl_relation_task_category.ID_TASK
            INNER JOIN tdl_category ON tdl_relation_task_category.ID_CATEGORY = tdl_category.ID_CATEGORY
            INNER JOIN 
            tdl_priority ON tdl_task.ID_PRIORITY = tdl_priority.ID_PRIORITY
            WHERE tdl_task.ID_TASK = :id");
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
 
        $stmt = $this->pdo->prepare("UPDATE `tdl_task` SET `TITLE` = ?,`DESCRIPTION` = ?,`DATE` = ?, `ID_USER` = ?, `ID_PRIORITY` = ? WHERE `tdl_task`.`ID_TASK` = ?");

        $stmt->execute([$titleTask, $descriptionTask, $dateTask, $idUser, $idPriority, $idTask]);
        return $stmt->rowCount() == 1;
    } catch (\PDOException $e) {
        // Gestion de l'erreur
        var_dump($e);
    }
}
}