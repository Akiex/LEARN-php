<?php

class Router 
{
    public function __construct()
    {
        
    }
    
    // 
    // METHOD
    // 
    
    public function handleRequest(array $get) : void
    {
        if(isset($get["route"]) && $get["route"] === "a-propos")
        {
            $controlller = new PageController();
            $controlller->about();
            
        }else if(!isset($get["route"]))
        {
            $controlller = new PageController();
            $controlller->home();
        } elseif(isset($get["route"]) && $get["route"] === "contact")
        {
          $controlller = new PageController();
          $controlller->contact();  
        }
        {
          $controlller = new PageController();
          $controlller->notFound();  
        }
    }
}