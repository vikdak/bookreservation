<?php

require_once __DIR__ . "/../Models/Users.php";
require_once __DIR__."/../Models/Book.php";

class BooksController{
    public function index(){
        $book = new Book();
        $books = $book->getAll();
        view(__DIR__.'/../../Views/books/index.php', compact('books'));
    }

    public function show(int $id)
    {
        $book = new Book();
        $book = $book->get($id);
        view(__DIR__.'/../../Views/books/show.php', compact('book'));
    }

    public function store(array $request)
    {
        $book = new Book();
        $data=$request;
        if($data['reserved']==='0'){
            $data['user_id']=NULL;
        }

        if($data['files']??''){
            $data['image']= $book->uploadImage($data['files']);
            unset($data['files']);
        };
        $book->create($data);
    }

    public function create()
    {
        $users= new Users();
        $users= $users->getAll();
        view(__DIR__.'/../../Views/books/create.php', compact( 'users'));
    }

    public function edit($id)
    {
        $book= new Book();
        $users= new Users();
        $book = $book->get($id);
        $users= $users->getAll();
        view(__DIR__.'/../../Views/books/edit.php', compact('book', 'users'));
    }

    public function update(array $data)
    {
        $book = new Book();
        if($data['reserved']=='0' || (!$data['user_id']??'')){
            $data['user_id']=NULL;
        }

        if ($data['files'] ?? '') {
            if($image=$book->uploadImage($data['files'])){
                $data['image']=$image;
            }

            unset($data['files']);
            $book = $book->update($data);
        }
    }

    public function delete($id){
        $book = (new Book())->delete($id);
    }

    public function getAllReserved(){
        $book = new Book();
        $books = $book->getAllReserved();
        view(__DIR__.'/../../Views/books/statistic.php', compact('books'));
    }
}


