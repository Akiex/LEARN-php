<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
     public function findLatest(): array
    {
        $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 4");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($data as $postData) {
            $posts[] = new Post(
                $postData['title'],
                $postData['excerpt'],
                $postData['content'],
                $this->findUserById($postData['author']), // Méthode pour récupérer l'objet User
                $this->findCategoryById($postData['category_id']), // Méthode pour récupérer l'objet Category
                $postData['id']
            );
        }
        return $posts;
    }

    // Trouver un post par son ID
    public function findOne(int $id): ?Post
    {
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $parameters = [  
               "id" => $_GET["id"]  
            ];  
        $query->execute($parameters);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Post(
                $data['title'],
                $data['excerpt'],
                $data['content'],
                $this->findUserById($data['author']), // Méthode pour récupérer l'objet User
                $this->findCategoryById($data['category_id']), // Méthode pour récupérer l'objet Category
                $data['id']
            );
        }
        return null;
    }

    // Trouver tous les posts liés à une catégorie
    public function findByCategory(int $categoryId): array
    {
        $query = $this->db->prepare("SELECT * FROM posts WHERE category_id = :category_id");
        $query->execute(['category_id' => $categoryId]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($data as $postData) {
            $posts[] = new Post(
                $postData['title'],
                $postData['excerpt'],
                $postData['content'],
                $this->findUserById($postData['author']), // Méthode pour récupérer l'objet User
                $this->findOne($postData['category_id']), // Méthode pour récupérer l'objet Category
                $postData['id']
            );
        }
        return $posts;
    }
}