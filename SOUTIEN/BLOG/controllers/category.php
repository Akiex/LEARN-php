<?php

function categoryPage() : void
{
    // remplacez ce code pour récupérer l'id de la catégorie passé en paramètres
    if (isset($_GET["category"]) && is_numeric($_GET["category"])) {
        $categoryId = (int)$_GET["category"];
    } else {
        
        echo "Catégorie invalide.";
        return; 
    }

    require "managers/category_manager.php";

    // remplacez ce code pour appeler la fonction qui permet de récupérer tous les articles d'une catégorie
    $categoryPosts = getPostsForCategory($categoryId);

    $template = "templates/category.phtml";
    require "templates/layout.phtml";
}

?>