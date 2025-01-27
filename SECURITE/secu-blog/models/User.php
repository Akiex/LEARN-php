<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class User
{
    private ?int $id = null;
    private string $username;
    private string $email;
    private string $password;
    private string $role;

    // Constructeur pour initialiser les propriétés
    public function __construct(string $username, string $email, string $password, string $role = 'user', ?int $id = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Getter et Setter pour $id
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // Getter et Setter pour $username
    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    // Getter et Setter pour $email
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Getter et Setter pour $password
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Vérification du mot de passe
    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    // Getter et Setter pour $role
    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }
}