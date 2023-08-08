<?php
session_start();
require_once __DIR__ . "/../helpers.php";
require_once __DIR__ . "/../app/auth/authenticate.php";
require_once __DIR__ . "/../app/Models/Users.php";

$auth=new Authenticate( new Users);
if(($_SESSION['is_authenticated'] ?? 0)) {
    redirect ('index.php');
};
if($_GET['reset'] ?? ''){
    $auth->logout();
}
if($_POST){
   $auth->login($_POST);
}else{
    view(__DIR__ . "/../Views/app/auth/login_form.php");
}









