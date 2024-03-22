<?php
namespace AllTasks;

include './Category/Category.php';
include './Task/Task.php';
echo"<div>
  <h1 class='  text-red-500 text-3xl text-center pt-4 ml-12'>
                Votre liste de tâches
            </h1>
            <div class='todos-list flex flex-wrap w-10/12'>
            
            ";
            // Une fois les produits reçus dans le tableau products, je peux les parcourir avec un forEach
            // Etant donné que mon productManager, a moulé, ou construit les résultats SQL au format de la classe Product
            // Je peux utiliser les méthodes de cette classe ( ex: $product->getName() )
                
                foreach ($tasks as $task) {

                    echo "<div class='w-1/3 mx-8 my-8 py-4 px-4 border border-solid border-2 border-white pl-12'>

                            <h3 class='text-white'>" . $task->getTITLE() . "</h3>
                            <p class='text-white' > 
                            Prix :" . $task->getDATE() . "</p>
                            <p class='text-white' > 
                            Description :" . $task->getDESCRIPTION() . "</p>
                               <p class='text-white' > 
                            catégory :" . $task->getIDCATEGORY() . "</p>
                            </div>
                            </div>";
                }
                ?>
         
?>