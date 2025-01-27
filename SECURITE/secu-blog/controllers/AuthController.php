<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class AuthController extends AbstractController
{

    public function login() : void
    {
        // Générer un token CSRF pour protéger le formulaire
        $csrfToken = bin2hex(random_bytes(32));  // Génère un token aléatoire de 32 bytes
        $_SESSION['csrf_token'] = $csrfToken;   // Stocker le token CSRF dans la session

        // Rendre la vue de login en passant le token CSRF
        $this->render("login", ["csrf_token" => $csrfToken]);
    }


    public function checkLogin() : void
    {
        // Vérifier le token CSRF pour éviter les attaques CSRF
        if ($_POST['csrf-token'] !== $_SESSION['csrf_token']) {
            die("Erreur CSRF - Requête non autorisée.");
        }

        // Assainir les entrées pour éviter les attaques XSS
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

        // Chercher l'utilisateur en fonction de l'email dans la base de données
        $userManager = new UserManager();
        $user = $userManager->findByEmail($email);

        // Vérifier si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user->getPassword())) {
            // Connexion réussie, enregistrer l'utilisateur en session
            $_SESSION['user_id'] = $user->getId();

            // Rediriger vers la page d'accueil
            $this->redirect("index.php");
        } else {
            // Erreur de connexion : rediriger vers la page de login
            $this->redirect("index.php?route=login");
        }
    }


    public function register() : void
    {
        // Générer un token CSRF pour protéger le formulaire
        $csrfToken = bin2hex(random_bytes(32));  // Génère un token aléatoire de 32 bytes
        $_SESSION['csrf_token'] = $csrfToken;   // Stocker le token CSRF dans la session

        // Rendre la vue d'inscription en passant le token CSRF
        $this->render("register", ["csrf_token" => $csrfToken]);
    }


    public function checkRegister() : void
    {
        // Vérifier le token CSRF pour éviter les attaques CSRF
        if ($_POST['csrf-token'] !== $_SESSION['csrf_token']) {
            die("Erreur CSRF - Requête non autorisée.");
        }

        // Assainir les entrées pour éviter les attaques XSS
        $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $confirmPassword = htmlspecialchars($_POST['confirm-password'], ENT_QUOTES, 'UTF-8');

        // Vérifier la validité du mot de passe avec une expression régulière
        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
        if (!preg_match($passwordRegex, $password)) {
            die("Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.");
        }

        // Vérifier que les mots de passe correspondent
        if ($password !== $confirmPassword) {
            die("Les mots de passe ne correspondent pas.");
        }

        // Vérifier si l'email est déjà pris
        $userManager = new UserManager();
        if ($userManager->findByEmail($email)) {
            die("Cet email est déjà utilisé.");
        }

        // Hasher le mot de passe avant de l'enregistrer
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Créer un nouvel utilisateur
        $user = new User($username, $email, $hashedPassword, 'user');  // Rôle par défaut 'user'
        if ($userManager->create($user)) {
            // Connexion réussie, enregistrer l'utilisateur en session
            $_SESSION['user_id'] = $user->getId();

            // Rediriger vers la page d'accueil après l'inscription
            $this->redirect("index.php");
        } else {
            // Si l'insertion échoue, rediriger vers le formulaire d'inscription
            $this->redirect("index.php?route=register");
        }
    }

    // Déconnexion de l'utilisateur
    public function logout() : void
    {
        // Détruire la session pour déconnecter l'utilisateur
        session_destroy();

        // Rediriger vers la page d'accueil
        $this->redirect("index.php");
    }
}