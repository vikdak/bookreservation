<?php
require_once __DIR__ . '/../../helpers.php';
require_once __DIR__ . "/../Models/Users.php";

class Authenticate{

    public function __construct(public $users = Users::class )
    {}
    public function login(array $credentials): void
    {

        $users = (new $this->users)->getByCredentials($credentials['email']);

        if (!$users) {
            redirect('login.php');
            exit;
        }
        $verified = password_verify(($credentials['password'] ?? ''), ($users['password'] ?? ''));
        if ($verified) {
            $this->setAuthenticated($users);
             redirect('index.php');
        } else {
            $_SESSION['message'] = 'Netinkamas slaptažodis arba elektroninis paštas!';
            redirect('login.php');
            exit;
        }
    }

    public function logout()
    {
            session_destroy();
            $_SESSION['authenticated']=0;
            header('Location: ../index.php');
            exit();
    }

    public function setAuthenticated($users){
        $_SESSION['is_authenticated'] = 1;
        $_SESSION['user'] = $users;
    }
}