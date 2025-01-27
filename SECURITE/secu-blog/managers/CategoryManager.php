<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
            public function findAll(): array
    {
        // Préparer et exécuter la requête SQL
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        
        // Récupérer les données sous forme associative
        $categoryData = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Hydrater les objets Category
        $categories = [];
        foreach ($categoryData as $data) {
            $categories[] = new Category(
                $data['title'], 
                $data['description'], 
                $data['id']
            );
        }
        return $categories;
    }

    // Méthode pour récupérer une catégorie par ID
    public function findOne(int $id): ?Category
    {
        // Préparer et exécuter la requête SQL
        $query = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $query->execute(['id' => $id]);
        
        // Récupérer les données
        $data = $query->fetch(PDO::FETCH_ASSOC);
        
        // Retourner un objet Category ou null si aucune donnée trouvée
        if ($data) {
            return new Category(
                $data['title'], 
                $data['description'], 
                $data['id']
            );
        }
        return null;
    }
}