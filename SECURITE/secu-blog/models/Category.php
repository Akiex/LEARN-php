<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Category
{
    private ?int $id = null;
    private string $title;
    private string $description;

    // Constructeur pour initialiser les propriétés
    public function __construct(string $title, string $description, ?int $id = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
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

    // Getter et Setter pour $title
    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // Getter et Setter pour $description
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}