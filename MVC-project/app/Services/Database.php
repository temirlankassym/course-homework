<?php

namespace App\Services;
use PDO;
use PDOException;

class Database{
    protected $db;
    protected $tableName;

    public function __construct($name, $sql = null){
        try {
            $this->db = new PDO('sqlite:C:\Users\Темирлан\PhpstormProjects\course\MVC-project\app\Services\Database.sqlite3');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->tableName = $name;
            if ($sql !== null) $this->create($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create($sql){
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
    }

    public function get(){
        $sql = "SELECT * FROM $this->tableName;";
        $cursor = $this->db->prepare($sql);
        $cursor->execute();
        return $cursor->fetchAll();
    }
}