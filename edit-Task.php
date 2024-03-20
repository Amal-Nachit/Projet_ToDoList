<?php
include("./autoload.php");

use CategoryManager\CategoryManager;
use DbConnexion\DbConnexion;
use TaskManager\TaskManager;

if(isset($_GET["id"])){
$dbConnexion = new DbConnexion();
$taskManager = new TaskManager($dbConnexion);
$categoryManager = new CategoryManager($dbConnexion);

$task = $taskManager->getSingleTaskById($_GET["id"]);
$categories = $categoryManager->getAllCategories();
session_start();
$_SESSION["idToUpdate"] = $_GET["id"];

var_dump($task);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit task</title>
</head>
<body>
     <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit a  task</h2>
        </div>
            <form class="space-y-6" action="traitement.php" method="POST" name="editProduct">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Product name</label>
                    <div class="mt-2">
                        <input value='<?php echo $product->getName_products() ?>' id="name" name="name_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>

                    </div>
                    <div class="mt-2">
                        <input id="description" name="description_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>
                </div>


                <div>
                    <div class="flex items-center justify-between">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>

                    </div>
                    <div class="mt-2">
                        <input id="price" name="price_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Image</label>

                        </div>
                        <div class="mt-2">
                            <input id="image" name="image_products" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="category" class="block text-sm font-medium leading-6 text-gray-900 mt-2">Category</label>

                        </div>
                        <div class="mt-2">
                            <select id="category" name="id_category" type="text" required class="capitalize block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3">
                                <?php
                                foreach ($categories as $category) {

                                    echo "<option class='capitalize' value=" . $category->getId_category() . " >" . $category->getName_category() . "</option>>";
                                }
                                ?>
                            </select>
                        </div>




                    </div>

                    <div>
                        <button type="submit" name="editProduct" class="mt-4 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit product</button>
                    </div>
            </form>

        </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>
