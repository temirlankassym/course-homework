<?php
class Database{
    private $connection;
    private $cursor;

    public function __construct(){
        try {
            $this->connection = new PDO('sqlite:database.sqlite3');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getUserByEmail($email){
        $sql = 'select * from persons where email = :email';
        $this->cursor = $this->connection->prepare($sql);
        $this->cursor->bindValue(":email",$email);
        $this->cursor->execute();
        return $this->cursor->fetchAll(PDO::FETCH_OBJ);
    }


    public function getAllUsers(){
        $sql = 'select * from persons';
        $this->cursor = $this->connection->prepare($sql);
        $this->cursor->execute();
        return $this->cursor->fetchAll(PDO::FETCH_OBJ);
    }

    public function createUser($firstname, $email, $password){
        $sql = 'insert into persons (firstname, email, password) values (:firstname, :email, :password)';
        $this->cursor = $this->connection->prepare($sql);
        $this->cursor->bindValue(":firstname",$firstname);
        $this->cursor->bindValue(":email",$email);
        $this->cursor->bindValue(":password",$password);
        $this->cursor->execute();
    }
}