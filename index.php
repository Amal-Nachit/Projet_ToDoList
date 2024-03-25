<?php

include("./autoload.php");

use PriorityManager\PriorityManager;
use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use TaskManager\TaskManager;

$dbConnexion = new DbConnexion();
$tasksManager = new TaskManager($dbConnexion);
$categoryManager = new CategoryManager($dbConnexion);
$priorityManager = new PriorityManager($dbConnexion);

$tasks = $tasksManager->getAllTasks();
$categories = $categoryManager->getAllCategories();
$priorities = $priorityManager->getAllPriorities();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="Medias/Checklist.jpg"/>
<title>To Do List</title>

	<style>
		.tacheEffectuee {
			text-decoration: line-through;
		}
        body{
            background-image: url('./Medias/background.jpg');
            background-size: cover;
            background-repeat: repeat;
        }
	</style>
</head>

<body class="bg-gray-100 relative">


	<div class="modal absolute container mx-auto my-10">
		<h1 class="text-center text-3xl font-kanit font-semibold mb-8">
			TODO LIST
		</h1>
		<div class="md:w-1/2 mx-auto">
			<div class="bg-white shadow-md rounded-lg p-6">
				<form id="todo-form">
					<div class="flex mb-4">
						<input type="text"
							class="w-full border border-2 border-indigo-300 px-4 py-2 mr-2 rounded-lg
							focus:outline-none
							focus:border-indigo-500" id="todo-input"
							placeholder="Chercher une tâche" required>
						<button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                         Chercher
                        </button>
					</div>
                </form>    
					    <div class="container mx-auto px-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Titre</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Priorité</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                   <td class="px-6 py-4 whitespace-nowrap">
    				<?php foreach ($tasks as $task): ?>
       				 <h3 class="text-black"><?php echo $task->getTITLE(); ?></h3>
    				<?php endforeach; ?>
					</td>

                    <td class="px-6 py-4 whitespace-nowrap"><?php foreach ($tasks as $task): ?>
       				 <h3 class="text-black"><?php echo $task->getDATE(); ?></h3>
    				<?php endforeach; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php foreach ($tasks as $task): ?>
       				 <h3 class="text-black"><?php echo $task->getIDPRIORITY(); ?></h3>
    				<?php endforeach; ?></td>
                  <td class="px-6 py-4 whitespace-nowrap"><?php foreach ($categoryManager as $category): ?>. <h3 class="text-black"><?php echo $category->getIDCATEGORY(); ?></h3>
    				<?php endforeach; ?>
                </td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php foreach ($tasks as $task): ?>
       				 <h3 class="text-black"><?php echo $task->getDESCRIPTION(); ?></h3>
    				<?php endforeach; ?></td>
                    <td>
                    <button type="button" class="btn btn-secondary" title="Update" onclick="editTask()"><i class="fa-solid fa-pencil text-blue-500"></i></button>
                    <button type="button" class="btn btn-danger" title="Delete" onclick="deleteTask()"><i class="fa-solid fa-trash text-red-500"></i></button>
                    </td>
                </tr>
            </tbody>  	
		
			</div>
        </table>
        <?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
        ?>
	</div>

<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=" bottom-0 right-0  text-white bg-indigo-300 hover:bg-indigo-600 font-medium rounded-full text-sm px-3 py-2.5 text-center  type="button" >
<i class="fa-solid fa-plus text-4xl"></i>
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed shadow-lg inset-0 flex items-center justify-center z-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full space-y-6 formTaskRegister " action="/createTask.php" method="POST" name="addTask">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
			Ajouter une tâche
				</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fermer la modale</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre de la tâche</label>
                        <input type="text" name="taskTitle" id="taskTitle" class="taskTitle bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Donnez un titre à votre tâche" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de la tâche</label>
                        <input type="date" name="taskDate" id="date" class="taskDate bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
					<div class="flex items-center justify-between">
                            <label for="priority" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Priorité</label>
                        </div>
                        <div class="mt-2">
                            <select id="priority" name="idPriority" type="text" required class="taskPriority capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 ">
                                <?php
                                foreach ($priorities as $priority) {
                                    echo "<option class='capitalize' value=" . $priority->getIDPRIORITY() . " >" . $priority->getNAME() . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <label for="priority" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Catégorie</label>
                        </div>
            <div class="category flex flex-wrap">
                     <?php
                        $categoriesManager = new CategoryManager($dbConnexion);
                        $categories = $categoriesManager->getAllCategories();

                        foreach ($categories as $categorie) {
                        ?>
                         <div class="px-2.5 w-40">
                             <input type="checkbox" id="<?= $categorie->getIDCATEGORY()  ?> " value="<?= $categorie->getIDCATEGORY()  ?>" name="checkbox" />
                             <label for="checkbox" class="categorieCheckbox"><?php if ($categorie->getIDCATEGORY() == 1) {
                             echo $categorie->getNAME();
                            } else if ($categorie->getIDCATEGORY() == 2) {
                            echo $categorie->getNAME() ;
                            } else if ($categorie->getIDCATEGORY() == 3) {
                             echo $categorie->getNAME();
                            } else if ($categorie->getIDCATEGORY() == 4) {
                            echo $categorie->getNAME();
                            } ?></label>
                         </div>
                     <?php

                        }
                        ?>
                 </div>

             </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4" name="taskDescription" class="taskDescription block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Votre description ici"></textarea>                    
                    </div>

                </div>
                <div class="flex justify-center items-center pb-3">
                <button onclick="handleRegisterTask()" name="addTask" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter la tâche
                </button>
                </div>
            </div>
        </div>
    </div>

</div> 


</body>
	<script>
function addTask(task) {
    const todoList = document.getElementById("todo-list");
    const tbody = document.querySelector("table tbody"); 
    const tr = document.createElement("tr"); 

    const titleCell = document.createElement("td");
    titleCell.textContent = task.title;
    tr.appendChild(titleCell);

    const dateCell = document.createElement("td");
    dateCell.textContent = task.date;
    tr.appendChild(dateCell);

    const priorityCell = document.createElement("td");
    priorityCell.textContent = task.priority; 
    tr.appendChild(priorityCell);

    const categoryCell = document.createElement("td");
    categoryCell.textContent = task.category; 
    tr.appendChild(categoryCell);

    const descriptionCell = document.createElement("td");
    descriptionCell.textContent = task.description; 
    tr.appendChild(descriptionCell);

    tbody.appendChild(tr);

}


		// Event listener for form submission
		document.getElementById("todo-form").addEventListener("submit",
			function (event) {
				event.preventDefault();
				const taskInput = document.getElementById("todo-input");
				const task = taskInput.value.trim();
				if (task !== "") {
					addTask(task);
					taskInput.value = "";
				}
			});



		
document.addEventListener('DOMContentLoaded', function() {
    const modalToggles = document.querySelectorAll('[data-modal-toggle]');

    modalToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const modalId = toggle.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);

            modal.classList.toggle('hidden');
            modal.setAttribute('aria-hidden', modal.classList.contains('hidden'));
        });
    });
});


</script>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/package-json-validator@0.6.3/PJV.min.js"></script>
<script src="https://kit.fontawesome.com/0e2d3a094c.js" crossorigin="anonymous"></script>
<script src="./script.js"></script>
 	<?php
         // Ici on sépare la couche vue du reste de l'application, 
         // on récupère les données plus haut,  et on appelle une vue 
         // avec un include pour les afficher .
         // On pourrait être tentés de mettre aussi la logique métier plus haut dans ce fichier égalemment dans la vue
         // mais c'est anti pattern.


    ?>

</html>

			