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
    public function checkCreate() : void
    {
        if  ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['first_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $lastname = $_POST['last_name'] ?? '';
            
            $user = new User();
            $user->setFirstName($firstname);
            $user->setEmail($email);
            $user->setLastName($lastname);
            
            $userManager = new UserManager();
            if ($userManager->create($user)) {
               
                header('Location: /index.php');
                exit();
            }
        }
    }
    
}