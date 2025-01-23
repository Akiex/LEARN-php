<?php

class UserManager extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }
    
    // 
    // METHOD
    // 
    
    public function findAll() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $usersData=$query->fetchAll(PDO::FETCH_ASSOC);
        
        $users = [];
        foreach ($usersData as $data) {
            $users[] = new User($data['first_name'], $data['last_name'], $data['email'], $data['id']);
        }
        return $users;
    }
    
    public function findOne(int $id) : ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute(["id" => $id]);
        $data=$query->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return new User($data['first_name'], $data['last_name'], $data['email'], $data['id']);
        }
        return null;
    }
    
    public function create(User $user): void
    {
        $query = $this->db->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $query->execute([
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName(),
            "email" => $user->getEmail()
        ]);
        $user->setId($this->db->lastInsertId());
    }
    public function update(User $user): void
    {
        $query = $this->db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email WHERE id = :id");
        $query->execute([
            "id" => $user->getId(),
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName(),
            "email" => $user->getEmail()
        ]);
    }
    public function delete(User $user): void
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $query->execute(["id" => $user-getId()]);
    }
}