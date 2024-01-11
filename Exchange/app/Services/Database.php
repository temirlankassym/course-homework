<?php

namespace App\Services;
use PDO,DateTime;

class Database{
    private $db;
    private $tableName;
    private $cursor;
    private $columns;

    public function __construct($name, $columns){
        try {
            $this->db = new PDO('sqlite:Services/database.sqlite3');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->tableName = $name;
            $this->cursor = $this->db;
            $this->create($columns);
        } catch (PDOException $e) {
            echo "error";
            echo $e->getMessage();
        }
    }

    public function get(){
        $sql = "SELECT * FROM $this->tableName";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
        return $cursor->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        if (empty($data)) return;
        $columns = $this->toString(0,$data);
        $sql = "CREATE TABLE IF NOT EXISTS $this->tableName (id INTEGER PRIMARY KEY AUTOINCREMENT,$columns,created_at TEXT);";
        $cursor = $this->cursor->prepare($sql);
        $cursor->execute();
    }

    public function insert($data){
        $date = new DateTime();
        $date = $date->format('j.m.y H:i:s');

        $columns = $this->toString(1,$data);
        $sql = "insert into $this->tableName ($this->columns created_at) values ($columns,\"$date\")";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
    }

    public function toString($state,$data){
        $columns = "";
        foreach ($data as $key=>$value){
            if($state==1) {
                $key = '';
                $value = "'".$value."'";
            }
            if($state==0) $this->columns .= $key . ",";
            $columns .= $key . " " . $value . " , ";
        }
        $columns = substr($columns, 0, -2);
        return $columns;
    }
}