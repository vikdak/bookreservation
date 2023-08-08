<?php
session_start();
require_once __DIR__ . "/../app/Controllers/BooksController.php";
require_once __DIR__ ."/../helpers.php";
require_once __DIR__ ."/../core/Connections.php";
redirectIfNotAuthenticated('login.php');

$book = new BooksController();
$book->getAllReserved();
