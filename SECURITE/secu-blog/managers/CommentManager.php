<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{
    // Méthode pour récupérer les commentaires liés à un post
    public function findByPost(int $postId): array
    {
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        $query->execute(['post_id' => $postId]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];
        foreach ($data as $commentData) {
            $comments[] = new Comment(
                $commentData['content'],
                $this->findUserById($commentData['user_id']), // Récupère l'objet User
                $this->findPostById($commentData['post_id']), // Récupère l'objet Post
                $commentData['id']
            );
        }
        return $comments;
    }

    // Méthode pour créer un commentaire dans la base de données
    public function create(Comment $comment): bool
    {
        $query = $this->db->prepare("
            INSERT INTO comments (content, user_id, post_id) 
            VALUES (:content, :user_id, :post_id)
        ");

        return $query->execute([
            'content' => $comment->getContent(),
            'user_id' => $comment->getUser()->getId(),
            'post_id' => $comment->getPost()->getId()
        ]);
    }

    // Méthode pour récupérer un User par son ID
    private function findUserById(int $userId): User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $userId]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            throw new Exception("Utilisateur non trouvé avec l'ID $userId");
        }

        return new User($data['username'], $data['email'], $data['password'], $data['role'], $data['id']);
    }

    // Méthode pour récupérer un Post par son ID
    private function findPostById(int $postId): Post
    {
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $query->execute(['id' => $postId]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            throw new Exception("Post non trouvé avec l'ID $postId");
        }

        return new Post(
            $data['title'],
            $data['excerpt'],
            $data['content'],
            $this->findUserById($data['author']),
            $this->findCategoryById($data['category_id']),
            $data['id']
        );
    }

    // Méthode pour récupérer une Category par son ID
    private function findCategoryById(int $categoryId): Category
    {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $query->execute(['id' => $categoryId]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            throw new Exception("Catégorie non trouvée avec l'ID $categoryId");
        }

        return new Category($data['title'], $data['description'], $data['id']);
    }
}