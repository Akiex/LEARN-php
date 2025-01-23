<?php

class UserController
{
    public function show(): void
    {
        $route = "show_user";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function create(): void
    {
        $route = "create_user";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function update(): void
    {
        $route = "update_user";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function list(): void
    {
        $route = "list";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    
}