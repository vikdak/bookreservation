<?php
session_start();
require_once __DIR__ . "/../app/Controllers/BooksController.php";
require_once __DIR__ ."/../helpers.php";

if(!($_SESSION['is_authenticated'] ?? 0)) {
    redirect ('login.php');
}
$book = new BooksController();
$book->index();


