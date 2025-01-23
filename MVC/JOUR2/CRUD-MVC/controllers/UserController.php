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
        $userManager = newUserManager();
        $user = $userManager->findAll();
        
        require_once __DIR__ . '/../templates/users/list.phtml';
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