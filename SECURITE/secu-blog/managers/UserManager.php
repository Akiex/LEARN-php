<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    // Méthode pour trouver un utilisateur par email
    public function findByEmail(string $email): ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User(
                $data['username'],
                $data['email'],
                $data['password'],
                $data['role'],
                $data['id']
            );
        }
        return null;
    }

    // Méthode pour créer un utilisateur dans la base de données
    public function create(User $user): bool
    {
        $query = $this->db->prepare("
            INSERT INTO users (username, email, password, role) 
            VALUES (:username, :email, :password, :role)
        ");

        return $query->execute([
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(), // Le mot de passe doit être hashé avant d'être passé ici
            'role' => $user->getRole()
        ]);
    }
    public function findUserById(int $id): ?User
        {
            
            $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $query->execute(['id' => $id]);
        
           
            $data = $query->fetch(PDO::FETCH_ASSOC);
        
            
            if ($data) {
                return new User(
                    $data['username'],
                    $data['email'],
                    $data['password'],
                    $data['role'],
                    $data['id']
                );
            }
        
            
            return null;
        }
}