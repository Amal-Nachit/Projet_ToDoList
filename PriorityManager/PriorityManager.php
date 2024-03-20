<?php

namespace PriorityManager;

use DbConnexion\DbConnexion;
use Priority\Priority;

class PriorityManager
{

    private $pdo;

    public function __construct(DbConnexion $dbConnexion)
    {
        // On récupére la fonctin getPdo de DbConnexion
        $this->pdo = $dbConnexion->getPDO();
    }

    public function getAllPriorities()
    {
        // On déclare une variable products comme tableau vide
        $priorities = [];

        try {
            // Le manager récupère l'instance de connexion pdo fournit par la classe DBConnexion
            // Il utilise cette instance de connexion et utilise la fonction query qui commme son nom l'indique
            // requête sur la bdd via notre instance de connexion
            $stmt = $this->pdo->query("SELECT * FROM tdl_priority");

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                // Pour chaque ligne de résultat de la requête on ajoute 
                // cette ligne dans $priorities
                // au format Product ( notre classe qui agit comme un moule a gauffre)
                // Dans priorities se trouvera un tableau d'objet au format Product
                // Et donc avec les méthodes de classes ( getters et setters)
                $priorities[] = new Priority($row);
            }
        } catch (\PDOException $e) {
            var_dump($e);
            // Ici si il y a une erreur on la var_dump
        }

        // Une fois la requete finie on return le tableau de products
        return $priorities;
    }


}