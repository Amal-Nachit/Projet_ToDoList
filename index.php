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
							placeholder="Ajouter une nouvelle tâche" required>
						<button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                         Ajouter
                        </button>
					</div>
				</form>	
			<div>
				<ul id="todo-list">
				</ul>
			</div>
		</div>
	</div>

<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="fixed bottom-0 right-0 block text-white bg-indigo-300 hover:bg-indigo-600 font-medium rounded-full text-sm px-3 py-2.5 text-center type="button">
<i class="fa-solid fa-plus text-4xl"></i>
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center z-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full space-y-6 formRegister " action="traitement.php" method="POST" name="addTask">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                        <input type="text" name="task-Name" id="name" class="Title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Donnez un titre à votre tâche" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date de la tâche</label>
                        <input type="date" name="task-Date" id="date" class="Date bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    </div>
					<div class="flex items-center justify-between">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Priorité</label>

                        </div>
                        <div class="mt-2">
                            <select id="priority" name="id_priority" type="text" required class="capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 Priority">
                                <?php
                                foreach ($priorities as $priority) {

                                    echo "<option class='capitalize' value=" . $priority->getIDPRIORITY() . " >" . $priority->getNAME() . "</option>";
                                }
                                ?>
                            </select>
                        </div>

						<div class="flex items-center justify-between">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Catégorie</label>

                        </div>
                        <div class="mt-2">
                            <select id="category" name="id_category" type="text" required class="capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 Category">
                                <?php
                                foreach ($categories as $category) {

                                    echo "<option class='capitalize' value=" . $category->getIDCATEGORY() . " >" . $category->getNAME() . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 Description" placeholder="Votre description ici"></textarea>                    
                    </div>

                </div>
                <button onclick="handleRegisterTask()" name="addTask" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter la tâche
                </button>
            </div>
        </div>
    </div>

</div> 


</body>
	<script>
		function addTask(task) {
			const todoList = document.getElementById("todo-list");
			const li = document.createElement("li");
			li.className = "border-b border-gray-200 flex items-center justify-between py-4";
			li.innerHTML = `<label class="flex items-center text-xl font-semibold">
					<input type="checkbox" class="mr-2 h-6 w-6 ">
					<span>${task}</span>
				</label>
				<div>
                    <button class="text-blue-500 mr-2 hover:text-blue-700 edit-btn">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </button>
					<button class="text-red-500 hover:text-red-700
					mr-2 delete-btn"><i class="fa-solid fa-trash"></i></button>
				</div>
			`;
			todoList.appendChild(li);

			// Add event listener to the checkbox
			const checkbox = li.querySelector('input[type="checkbox"]');
			checkbox.addEventListener('change', function () {
				const taskText = this.nextElementSibling;
				if (this.checked) {
					taskText.classList.add('tacheEffectuee');
				} else {
					taskText.classList.remove('tacheEffectuee');
				}
			});
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

		// Event listener for delete button click
		document.getElementById("todo-list")
		.addEventListener("click",
			function (event) {
				if (event.target.classList.contains("delete-btn")) {
					event.target.parentElement.parentElement.remove();
				}
			});

		// Event listener for edit button click
		document.getElementById("todo-list")
		.addEventListener("click",
			function (event) {
				if (event.target.classList.contains("edit-btn")) {
					const taskText = event.target.
						parentElement.parentElement.querySelector("span");
					const newText = 
						prompt("Entrer nouvelle tâche", taskText.textContent);
					if (newText !== null) {
						taskText.textContent = newText.trim();
					}
				}
			});




		
document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez tous les boutons qui ont l'attribut data-modal-toggle
    const modalToggles = document.querySelectorAll('[data-modal-toggle]');

    // Ajoutez un écouteur d'événements pour chaque bouton
    modalToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const modalId = toggle.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);

            // Basculer la visibilité de la modal
            modal.classList.toggle('hidden');
            modal.setAttribute('aria-hidden', modal.classList.contains('hidden'));
        });
    });
});


</script>
 	<?php
         // Ici on sépare la couche vue du reste de l'application, 
         // on récupère les données plus haut,  et on appelle une vue 
         // avec un include pour les afficher .
         // On pourrait être tentés de mettre aussi la logique métier plus haut dans ce fichier égalemment dans la vue
         // mais c'est anti pattern.
         include("./Views/Alltasks.php");
         include("./Views/AddProduct.php") ;
         include("./TaskRegister/TaskRegister.php");

    ?>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/0e2d3a094c.js" crossorigin="anonymous"></script>
<script src="./script.js"></script>
</html>

			