<?php

require_once __DIR__ ."/../../core/Connections.php";

class Users extends Connections
{

    public $table = 'users';

    public function getAll()
    {
        return $this->connection->query("SELECT * FROM {$this->table}")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get(int $id):array|bool
    {
        $sql="SELECT * FROM {$this->table} WHERE id=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute([$id]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getByCredentials(string $id):array|bool
    {
        $sql="SELECT * FROM {$this->table} WHERE email=?";
        $stmt=$this->connection->prepare($sql);
        $stmt->execute([$id]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

}