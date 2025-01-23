<?php

class User {
    private ?int $id = null;
    private string $firstname;
    private string $lastname;
    private string $email;

    public function __construct(string $firstname, string $lastname, string $email, ?int $id = null)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
    }
    // Getters et setters
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getFirstName(): string {
        return $this->firstname;
    }
    public function setFirstName(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getLastName(): string {
        return $this->lastname;
    }
    public function setLastName(string $lastname): void {
        $this->lastname = $lastname;
    }
}