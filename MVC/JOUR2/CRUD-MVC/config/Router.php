<?php

class Router 
{
    public function __construct()
    {
        
    }
    
    // 
    // METHOD
    // 
    public function handleRequest(array $get) :void
    {
        if(isset($get["route"]) && $get["route"] === "show_user")
        {
            $controller = new UserController();
            $controller->show();
        }elseif(isset($get["route"]) && $get["route"] === "create_user")
        {
            $controller = new UserController();
            $controller->create();
        }elseif(isset($get["route"]) && $get["route"] === "check_create_user")
        {
            $controller = new UserController();
            $controller->checkCreate();
        }elseif(isset($get["route"]) && $get["route"] === "update_user")
        {
            $controller = new UserController();
            $controller->update();
        }elseif(isset($get["route"]) && $get["route"] === "check_update_user")
        {
            $controller = new UserController();
            $controller->checkUpdate();
        }elseif(isset($get["route"]) && $get["route"] === "delete_user")
        {
            $controller = new UserController();
            $controller->delete();
        }else 
        {
            $controller = new UserController();
            $controller->list();
        }
    }
}