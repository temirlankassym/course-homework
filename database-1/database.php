<?php
class Database{
    private $connection;
    private $cursor;

    public function __construct(){
        try {
            $this->connection = new PDO('sqlite:database.sqlite3');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->cursor = $this->connection;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getCursor(){
        return $this->cursor;
    }

    public function getConnection(){
        return $this->connection;
    }
}