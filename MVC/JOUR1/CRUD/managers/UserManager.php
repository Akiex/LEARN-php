<?php

class UserManager
{
    private PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=db.3wa.io;port=3306;dbname=hugotande_userbase_poo;charset=utf8', 'hugotande', '41cebb5ac29e53ec4615efc7252da9de');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }

    
    public function create(User $user): bool
    {
        try {
            $query = $this->db->prepare('
                INSERT INTO users (email, first_name, last_name) 
                VALUES (:first_name, :email, :last_name)
            ');
            $query->bindValue(':first_name', $user->getFirstName(), PDO::PARAM_STR);
            $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':last_name', $user->getLastName(), PDO::PARAM_STR);

            if ($query->execute()) {
                // Récupère l'ID du dernier utilisateur inséré
                $user->setId($this->db->lastInsertId());
                return true;
            }
            return false;
        } catch (PDOException $e) {
            error_log('Erreur lors de la création de l\'utilisateur : ' . $e->getMessage());
            return false;
        }
    }
    
    public function findAll(): array {
        $query = "SELECT * FROM users"; 
        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User'); 
        return $users; 
    }
    
    public function findOne(int $id): ?User {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $result = $query->fetch();
    
        // Vérifiez si $result est `false`, retournez `null` dans ce cas
        if ($result === false) {
            return null;
        }
    
        return $result;
    }
}