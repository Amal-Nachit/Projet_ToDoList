<?php

// Vérifie si une session est déjà active
if (session_status() == PHP_SESSION_NONE) {
    // Démarre une nouvelle session si aucune n'est active
    session_start();
}

// Le reste de votre code PHP

spl_autoload_register(function($class){
	$class = strtr($class,"\\",DIRECTORY_SEPARATOR);
	require_once($class.".php");
});