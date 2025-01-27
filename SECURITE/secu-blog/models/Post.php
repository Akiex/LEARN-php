<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Post
{
    private ?int $id = null;
    private string $title;
    private string $excerpt;
    private string $content;
    private User $author; // L'auteur est un objet User
    private Category $category; // La catégorie est un objet Category

    // Constructeur pour initialiser les propriétés
    public function __construct(
        string $title,
        string $excerpt,
        string $content,
        User $author,
        Category $category,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->author = $author;
        $this->category = $category;
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

    // Getter et Setter pour $excerpt
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt): void
    {
        $this->excerpt = $excerpt;
    }

    // Getter et Setter pour $content
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    // Getter et Setter pour $author (User)
    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    // Getter et Setter pour $category (Category)
    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}