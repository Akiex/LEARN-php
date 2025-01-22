<?php

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/PageController.php';

class Router
{
    public function handleRequest(array $get): void
    {
        $route = $get['route'] ?? '';

        switch ($route) {
            case 'connexion':
                // Route pour la connexion
                $authController = new AuthController();
                $authController->login();
                break;

            case 'inscription':
                // Route pour l'inscription
                $authController = new AuthController();
                $authController->register();
                break;

            case 'a-propos':
                // Route pour la page "À propos"
                $pageController = new PageController();
                $pageController->about();
                break;

            default:
                // Route par défaut ou non trouvée
                $this->handleNotFound();
                break;
        }
    }

    private function handleNotFound(): void
    {
        http_response_code(404);
        echo "Page non trouvée.";
    }
}