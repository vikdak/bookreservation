<?php

require_once __DIR__ ."/../../core/UploadFiles.php";
require_once __DIR__ ."/../../core/Connections.php";

class Book extends Connections
{

    public $table='books';

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

    public function create(array $request):int
    {

        $sql = "INSERT INTO {$this->table} (
                   name, 
                   author,
                   release_date, 
                   image, 
                   genre,
                   developer, 
                   description,
                   reserved,
                   user_id
                   ) 
                VALUES (                
                        :name, 
                        :author,
                        :release_date,
                        :image,
                        :genre, 
                        :developer, 
                        :description,
                        :reserved,
                        :user_id
                        )";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute($request);
        $id=$this->connection->lastInsertId();

        return $id;
    }

    public function update(array $data)
    {
        dump($data);
        $sql = "UPDATE {$this->table} 
                SET 
                    name=:name,
                    author=:author,
                    release_date=:release_date, 
                    image=:image,
                    genre=:genre, 
                    developer=:developer, 
                    description=:description,
                    reserved=:reserved,
                    user_id=:user_id
                WHERE id=:id ";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute($data);
    }

    public function delete(int $id){
        $sql = "DELETE FROM 
                    {$this->table}
                WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

        public function getAllReserved()
    {
        return $this->connection->query("SELECT books.name, books.author, users.first_name 
                                        FROM books JOIN users on users.id=books.user_id")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function uploadImage(array $files)
    {

        return (new UploadFiles)->upload($files['image']);
    }


}

