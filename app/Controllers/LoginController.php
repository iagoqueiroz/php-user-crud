<?php
namespace App\Controllers;

class LoginController
{
    public function index()
    {
        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/login/login.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function authenticate()
    {
        var_dump($_POST);
    }

    public function register()
    {
        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/login/register.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function registration()
    {
        var_dump($_POST);
    }

    public function logout()
    {
        //
    }
}