<?php
session_start();
class Database{
    private $db;

    public function __construct(){
        try {
            $this->db = new PDO('sqlite:services/database.sqlite3');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createTable();
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM Users";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
        return $cursor->fetchAll();
    }

    public function createTable(){
        $sql = "CREATE TABLE IF NOT EXISTS Users (id INTEGER PRIMARY KEY AUTOINCREMENT,username TEXT,password TEXT)";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
    }

    public function createUser($username, $password){
        $sql = 'insert into Users (username, password) values (:username, :password)';
        $cursor = $this->db->prepare($sql);
        $cursor->bindValue(":username",$username);
        $cursor->bindValue(":password",$password);
        $cursor->execute();
    }

    public function validate($username,$password){
        $sql = "SELECT COUNT(*) FROM Users WHERE username = :username AND password = :password";
        $cursor = $this->db->prepare($sql);
        $cursor->bindParam(":username", $username);
        $cursor->bindParam(":password", $password);
        $cursor->execute();
        if($cursor->fetch()[0]> 0){
            $_SESSION['username'] = $username;
            unset($_SESSION['error']);
            header("Location: dashboard.php");
        }else{
            $_SESSION['error'] = "Invalid username or password";
            header("Location: index.php");
        }
    }
}