<?php

class UserController
{
    private UserManager $userManager;

    public function __construct() {
        $this->userManager = new UserManager();
    }
    public function create():void
    {
        $route = "create_user";
        require_once __DIR__."/../templates/layout.phtml";
    }
    public function show():void
    {
        $id = $_GET['id'] ?? 0;
        $user = $this->userManager->findOne((int) $id);
        
        if ($user === null) {
            echo "Utilisateur introuvable.";
        } else {
            // Traitez l'utilisateur trouvé
            include '/../templates/users/show.phtml';
        }
    }
    public function checkCreate(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $firstname = $_POST['first_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $lastname = $_POST['last_name'] ?? '';

            
            if (empty($firstname) || empty($email) || empty($lastname)) {
                echo "Tous les champs sont obligatoires.";
                return;
            }

            
            $user = new User();
            $user->setFirstName($firstname);
            $user->setEmail($email);
            $user->setLastName($lastname); 

            
            $userManager = new UserManager();
            if ($userManager->create($user)) {
               
                header('Location: /index.php');
                exit();
            } else {
                echo "Erreur lors de la création de l'utilisateur.";
            }
        } else {
            echo "Méthode HTTP non autorisée.";
        }
    }
    public function update():void
    {
        $route = "update_user";
        require_once __DIR__."/../templates/layout.phtml";
    }
    public function checkUpdate():void
    {
        $route = "check_update_user";
        require_once __DIR__."/../templates/layout.phtml";
    }
    public function delete():void
    {
        $route = "delete_user";
        require_once __DIR__."/../templates/layout.phtml";
    }
    public function list() {
        $users = $this->userManager->findAll();
        include '/../templates/users/list.phtml';
    }
}