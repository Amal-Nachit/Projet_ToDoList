<?php

namespace RelationTaskCategoryManager;

use DbConnexion\DbConnexion;
use RelationTaskCategory\RelationTaskCategory;

class RelationTaskCategoryManager {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Fonction pour ajouter une relation entre une tâche et une catégorie
    public function addRelation($taskId, $categoryId)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO `task_category` (`task_id`, `category_id`) VALUES (?, ?)");
            $stmt->execute([$taskId, $categoryId]);
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // Gestion de l'erreur
            var_dump($e);
        }
    }

    // Fonction pour supprimer une relation entre une tâche et une catégorie
    public function removeRelation($taskId, $categoryId)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM `task_category` WHERE `task_id` = ? AND `category_id` = ?");
            $stmt->execute([$taskId, $categoryId]);
            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            // Gestion de l'erreur
            var_dump($e);
        }
    }

    // Fonction pour récupérer toutes les catégories d'une tâche
    public function getCategoriesByTask($taskId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT `category_id` FROM `task_category` WHERE `task_id` = ?");
            $stmt->execute([$taskId]);
            return $stmt->fetchAll(\PDO::FETCH_COLUMN);
        } catch (\PDOException $e) {
            // Gestion de l'erreur
            var_dump($e);
        }
    }

    // Fonction pour récupérer toutes les tâches d'une catégorie
    public function getTasksByCategory($categoryId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT `task_id` FROM `task_category` WHERE `category_id` = ?");
            $stmt->execute([$categoryId]);
            return $stmt->fetchAll(\PDO::FETCH_COLUMN);
        } catch (\PDOException $e) {
            // Gestion de l'erreur
            var_dump($e);
        }
    }

    // Fonction pour mettre à jour la relation entre une tâche et une catégorie
    public function updateRelation($taskId, $categoryId)
    {

    }
}

