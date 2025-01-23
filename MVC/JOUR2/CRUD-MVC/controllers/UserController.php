<?php

class UserController
{
    public function show(): void
    {
        $route = "show_user";
        require_once __DIR__. "/../templates/layout.phtml";
        // $userManager = newUserManager();
        // $userManager->findOne();
    }
    public function create(): void
    {
        $route = "create_user";
        require_once __DIR__. "/../templates/layout.phtml";
        // $userManager = newUserManager();
        // $userManager->create();
    }
    public function update(): void
    {
        $route = "update_user";
        require_once __DIR__. "/../templates/layout.phtml";
        // $userManager = newUserManager();
        // $userManager->update();
    }
    public function list(): void
    {
        $route = "list";
        require_once __DIR__. "/../templates/layout.phtml";
        
        // $userManager = newUserManager();
        // $userManager->findAll();
    }
    
}