<?php

class AuthController
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
    
            if ($this->checkCredentials($username, $password)) {
                $_SESSION['user'] = $username;
                header('Location: /espace-perso');
                exit();
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            $this->showLoginForm();
        }
    }
    
    private function checkCredentials(string $username, string $password): bool
    {
        // Simulation : remplacez cette logique par une vérification en base de données
        return $username === 'admin' && $password === 'password';
    }
    
    private function showLoginForm(): void
    {
        require __DIR__ . '/../templates/connexion.phtml';
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';
    
            if (empty($username) || empty($password) || empty($confirmPassword)) {
                echo "Tous les champs doivent être remplis.";
                return;
            }
    
            if ($password !== $confirmPassword) {
                echo "Les mots de passe ne correspondent pas.";
                return;
            }
    
            if ($this->registerUser($username, $password)) {
                echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
            } else {
                echo "Une erreur est survenue lors de l'inscription.";
            }
        } else {
            $this->showRegisterForm();
        }
    }
    
    private function registerUser(string $username, string $password): bool
    {
        // Simulation : Ajoutez ici la logique pour insérer l'utilisateur dans une base de données
        return true; // Simule une inscription réussie
    }
    
    private function showRegisterForm(): void
    {
        require __DIR__ . '/../templates/inscription.phtml';
    }
}