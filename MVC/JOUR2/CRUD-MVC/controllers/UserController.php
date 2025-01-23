<?php

class UserController
{
    public function show(int $id): void
    {
        $route = "show_user";
        $userManager = new UserManager();
        $user = $userManager->findOne($id);
        require_once __DIR__. "/../templates/layout.phtml";
        
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
        $userManager = newUserManager();
        $userManager->update(); 
        
        require_once __DIR__. "/../templates/layout.phtml";
        
    }
    public function list(): void
    {
        $route = "list";
        
        
        $userManager = new UserManager();
        $user = $userManager->findAll();
        
        require_once __DIR__. "/../templates/layout.phtml";
    }
    public function checkCreate() : void
    {
        if  ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if(
            !empty($_POST['first_name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['last_name'])
            )
            {
            $firstname = $_POST['first_name'];
            $email = $_POST['email'];
            $lastname = $_POST['last_name'];
            
            $user = new User();
            $user->setFirstName($firstname);
            $user->setEmail($email);
            $user->setLastName($lastname);
            
            $userManager = new UserManager();
                if ($userManager->create($user)) 
                {
                   
                    header('Location: /index.php');
                    exit();
                }
            } else{
                echo "Tous les champs sont requis.";
            }
        }
    }

    
}