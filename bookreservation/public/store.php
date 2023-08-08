<?php
session_start();
require_once __DIR__ . "/../app/Controllers/BooksController.php";
require_once __DIR__ ."/../helpers.php";
redirectIfNotAuthenticated('login.php');

$request=$_REQUEST;
$request['files'] = $_FILES;

$book = new BooksController();
$book->store($request);
header('Location: index.php');




