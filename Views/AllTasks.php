<?php

namespace AllTasks;
use CategoryManager\CategoryManager;
use Category\Category;
use RelationTaskCategory\RelationTaskCategory;

echo"<div>
  <h1 class='  text-red-500 text-3xl text-center pt-4 ml-12'>
                Votre liste de tâches
            </h1>
            <div class='todos-list flex flex-wrap w-10/12'>
            
            ";
            // Une fois les produits reçus dans le tableau products, je peux les parcourir avec un forEach
            // Etant donné que mon productManager, a moulé, ou construit les résultats SQL au format de la classe Product
            // Je peux utiliser les méthodes de cette classe ( ex: $product->getName() )
                
