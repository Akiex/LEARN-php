<?php
require"../connexion.php";

function getCategory(int $categoryId) : array
{
    // remplissez cette fonction pour qu'elle puisse récupérer toutes les infos d'une catégorie

    return [];
}

function getCategories() : array
{
    // remplissez cette fonction pour qu'elle puisse récupérer toutes les infos de toutes les catégories

    return [];
}

function getPostsForCategory(int $categoryId) : array
{
    // remplissez cette fonction pour qu'elle puisse récupérer tous les articles d'une catégorie ainsi que les infos de leur image
    $db->prepare();
    
    $parameters = [
        
        ];
    $db->execute();
    $posts = $db->;
    
        
        
        return $posts;
}

?>