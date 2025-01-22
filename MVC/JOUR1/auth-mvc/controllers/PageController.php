<?php

class PageController 
{
    public function connexion(): void
    {
        $route = "connexion";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    
    public function checkConnexion(): void
    {
        $route = "check-connexion";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    
    public function inscription(): void
    {
        $route = "inscription";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function checkInscription():void
    {
        $route = "check-inscription";
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function espacePerso():void
    {
        $route = "espace-perso";
        require_once __DIR__."/../templates/layout.phtml";
    }
}