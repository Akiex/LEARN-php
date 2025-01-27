<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Comment
{
    private ?int $id = null;
    private string $content;
    private User $user; // L'utilisateur qui a écrit le commentaire
    private Post $post; // Le post auquel le commentaire appartient

    // Constructeur pour initialiser les propriétés
    public function __construct(string $content, User $user, Post $post, ?int $id = null)
    {
        $this->id = $id;
        $this->content = $content;
        $this->user = $user;
        $this->post = $post;
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

    // Getter et Setter pour $content
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    // Getter et Setter pour $user
    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    // Getter et Setter pour $post
    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }
}