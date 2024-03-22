<?php

namespace CategoryManager;

use DbConnexion\DbConnexion;
use Category\Category;

class CategoryManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        $this->pdo = $dbConnexion->getPDO();
    }

    public function getAllCategories()
    {
        $categories = [];

        try {
            $stmt = $this->pdo->query("SELECT * FROM tdl_category ");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $categories[] = new Category($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
        }


        return $categories;
    }

 public function insertCategory(Category $objet){
        $name = $objet->getName();

        try{
            $stmt = $this->pdo->prepare("INSERT INTO tdl_category VALUES(NULL,?)");
              $stmt->execute([$name ]);
            return $stmt->rowCount() == 1;

        } catch (\PDOException $e) {
            // erreur
            var_dump($e);
        }

    }


public function getCategoryByID($id)
{
    try {
        // Préparation de la requête SQL pour sélectionner une catégorie par son ID
        $stmt = $this->pdo->prepare("SELECT * FROM tdl_category WHERE ID_CATEGORY = ?");
        
        // Exécution de la requête avec l'ID de la catégorie comme paramètre
        $stmt->execute([$id]);
        
        // Récupération de la première ligne retournée par la requête
        $category = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        // Si une catégorie a été trouvée, retourne l'objet Category
        if ($category) {
            return new Category($category);
        }
        
        // Si aucune catégorie n'a été trouvée, retourne null ou lance une exception
        return null;
    } catch (\PDOException $e) {
        // Gestion de l'erreur
        var_dump($e);
        // Retourne null en cas d'erreur
        return null;
    }
}
    
}
