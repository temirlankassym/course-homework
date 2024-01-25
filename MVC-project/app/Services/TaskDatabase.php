<?php
namespace App\Services;
use DateTime,PDO;
require 'Database.php';

class TaskDatabase extends Database{
    public function __construct(){
        parent::__construct('Tasks',
            "CREATE TABLE IF NOT EXISTS Tasks
            (id INTEGER PRIMARY KEY AUTOINCREMENT, user_id INTEGER, 
            task TEXT, created_at TEXT,
            FOREIGN KEY(user_id) REFERENCES Users(id));");
    }

    public function insert($data){
        $date = new DateTime();
        $date = $date->format('j.m.y H:i:s');
        $sql = "Insert into Tasks (user_id, task,created_at) values ('$data[0]','$data[1]',\"$date\");";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
    }

    public function getTasks($id){
        $sql = "SELECT * FROM Tasks WHERE user_id = :id";
        $cursor = $this->db->prepare($sql);
        $cursor->bindValue(':id', $id);
        $cursor->execute(['id' => $id]);
        $result = $cursor->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}