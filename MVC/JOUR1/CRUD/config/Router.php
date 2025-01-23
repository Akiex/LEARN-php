<?php

class Router
{
    public function handleRequest(array $get): void
    {
        $route = $get['route'] ?? '';

        switch ($route) {
            case 'create_user':
                $controller = new UserController();
                $controller->create();
                break;

            case 'show_user':
                $controller = new UserController();
                $controller->show();
                break;

            case 'check_create_user':
                $controller = new UserController();
                $controller->checkCreate();
                break;

            case 'update_user':
                $controller = new UserController();
                $controller->update();
                break;

            case 'check_update_user':
                $controller = new UserController();
                $controller->checkUpdate();
                break;

            case 'delete_user':
                $controller = new UserController();
                $controller->delete();
                break;

            case 'list_users':
                $controller = new UserController();
                $controller->list();
                break;
                
            default:
            // Redirection vers layout.phtml
            require_once __DIR__ . '/../templates/layout.phtml';
            break;
            
        }
    }
}