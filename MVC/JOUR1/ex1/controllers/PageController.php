<?php

class PageController 
{
    public function home(): void
    {
        $route = "home";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    
    public function about(): void
    {
        $route = "about";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    
    public function notFound(): void
    {
        $route = "notFound";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function contact():void
    {
        $route = "contact";
        require_once __DIR__. "/../templates/layout.phtml";
    }
}