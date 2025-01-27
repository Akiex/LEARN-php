<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    public function findAll() : array
    {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        $categoryData=$query->fetchAll(PDO::FETCH_ASSOC);
        
        $category = [];
        foreach ($categoryData as $data) {
            $category[] = new User($data['title'], $data['description'], $data['id']);
        }
        return $category;
    }
        public function findOne(int $id) : ?User
    {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id=:id");  
        $parameters = [  
           "id" => $_GET["id"]  
        ];  
        $query->execute($parameters);
        $data=$query->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return new User($data['title'], $data['description'], $data['id']);
        }
        return null;
    }
}