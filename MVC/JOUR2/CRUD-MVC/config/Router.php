<?php

class Router 
{
    public function __construct()
    {
        
    }
    
    // 
    // METHOD
    // 
public function handleRequest(array $get): void
{
    $controller = new UserController();

    if (isset($get['route'])) {
        switch ($get['route']) {
            case 'show_user':
                if (isset($get['id'])) {
                    $controller->show((int)$get['id']);
                } else {
                    echo "Erreur : ID manquant pour afficher l'utilisateur.";
                }
                break;

            case 'create_user':
                $controller->create();
                break;

            case 'check_create_user':
                $controller->checkCreate();
                break;

            case 'update_user':
                if (isset($get['id'])) {
                    $controller->update((int)$get['id']);
                } else {
                    echo "Erreur : ID manquant pour modifier l'utilisateur.";
                }
                break;

            case 'check_update_user':
                if (isset($get['id'])) {
                    $controller->checkUpdate((int)$get['id']);
                } else {
                    echo "Erreur : ID manquant pour valider la mise à jour.";
                }
                break;

            case 'delete_user':
                if (isset($get['id'])) {
                    $controller->delete((int)$get['id']);
                } else {
                    echo "Erreur : ID manquant pour supprimer l'utilisateur.";
                }
                break;

            default:
                echo "Erreur : route non reconnue.";
                break;
        }
    } else {
        // Si aucune route n'est spécifiée, afficher la liste des utilisateurs
        $controller->list();
    }
}
}