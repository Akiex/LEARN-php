<?php

abstract class  AbstractManager
{
    protected ?PDO $db = null;
    
    public function __construct()
    {
        $this->connect();
    }
      private function connect(): void
    {
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "hugotande_crud_mvc";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
        
        $user = "hugotande";
        $password = "41cebb5ac29e53ec4615efc7252da9de";
        
        $this->db = new PDO(
        $connexionString,
        $user,
        $password
        );
    }
}
