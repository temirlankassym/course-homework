<?php

class BaseModel extends Database{
    protected Database $db;
    protected string $tableName;

    public function __construct($tableName, $data){
        $this->db = new Database();
        $this->tableName = $tableName;
        $this->create($data);
    }

    public function get($tableName){
        $sql = "SELECT * FROM $tableName";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->execute();
        return $cursor->fetchAll();
    }

    public function update($column, $newData, $id){
        $sql = "UPDATE $this->tableName SET $column = :newData WHERE id = :id";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->bindValue(':newData', $newData);
        $cursor->bindValue(':id', $id);
        $cursor->execute();
    }

    public function create(array $data){
        $columns = "";
        foreach ($data as $key=>$value){
            $columns .= $key . " " . $value . ",";
        }
        $columns = substr($columns, 0, -1);

        $sql = "CREATE TABLE IF NOT EXISTS $this->tableName (id INTEGER PRIMARY KEY AUTOINCREMENT,$columns);";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->execute();
    }

    public function delete(){
        $sql = "drop table $this->tableName";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->execute();
    }

    public function insert(array $data){
        $columns = "";
        $values = "";
        foreach ($data as $key=>$value){
            $columns .= $key . ",";
            $values .= "'" . $value . "',";
        }
        $columns = substr($columns, 0, -1);
        $values = substr($values, 0, -1);

        $sql = "INSERT INTO $this->tableName ($columns) VALUES ($values)";

        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->execute();
    }
}