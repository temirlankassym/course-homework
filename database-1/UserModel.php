<?php

class UserModel extends BaseModel{
    private $username = ['username','TEXT'];
    private $email = ['email','TEXT'];
    private $password = ['password','TEXT'];

    public function __construct($tableName){
        parent::__construct($tableName,[
                $this->username[0]=>$this->username[1],
                $this->email[0]=>$this->email[1],
                $this->password[0]=>$this->password[1]
        ]);
    }

    public function get($tableName){
        return parent::get($tableName);
    }

    public function getById($id){
        $sql = "SELECT * FROM $this->tableName WHERE id = $id";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->bindValue(':id', $id);
        $cursor->execute();
        return $cursor->fetchAll();
    }

    public function getByEmail($email){
        $sql = "SELECT * FROM $this->tableName WHERE email = :email";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->bindValue(':email', $email);
        $cursor->execute();
        return $cursor->fetchAll();
    }

    public function getByUsername($username){
        $sql = "SELECT * FROM $this->tableName WHERE username = :username";
        $cursor = $this->db->getCursor()->prepare($sql);
        $cursor->bindValue(':username', $username);
        $cursor->execute();
        return $cursor->fetchAll();
    }
}