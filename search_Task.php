<?php
require_once 'Database.php'; 

$searchTerm = $_GET['task'] ?? '';

// Préparez la requête SQL pour rechercher la tâche
$query = "SELECT * FROM task WHERE NOM LIKE :searchTerm";
$statement = $this->DB->prepare($sql);

// Exécutez la requête avec le terme de recherche
$statement->execute(['searchTerm' => '%' . $searchTerm . '%']);

// Récupérez les résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichez les résultats
foreach ($results as $task) {
    echo $task['NOM'] . "<br>";
}
