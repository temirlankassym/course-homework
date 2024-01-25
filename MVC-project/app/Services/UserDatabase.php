<?php
namespace App\Services;
use DateTime,PDO;
require 'Database.php';

class UserDatabase extends Database{
    public function __construct(){
        parent::__construct('Users',
            "CREATE TABLE IF NOT EXISTS Users
            (id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT, password TEXT,created_at TEXT);");
    }

    public function insert($data){
        $date = new DateTime();
        $date = $date->format('j.m.y H:i:s');
        $sql = "Insert into Users (username, password, created_at) values ($data,\"$date\");";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
    }

    public function validate($username, $password){
        $sql = "SELECT * FROM Users WHERE username = :username AND password = :password";
        $cursor = $this->db->prepare($sql);
        $cursor->bindValue(':name', $username);
        $cursor->bindValue(':password', $password);
        $cursor->execute([
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ]);
        $result = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return count($result) == 1;
    }

    public function getId($username){
        $sql = "SELECT id FROM Users WHERE username = :username";
        $cursor = $this->db->prepare($sql);
        $cursor->bindValue(':username', $username);
        $cursor->execute(['username' => $_POST['username']]);
        $result = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['id'];
    }
}