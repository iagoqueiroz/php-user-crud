<?php
namespace App\Controllers;

use App\Models\UserModel;

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
        $data = [
            'nome' => filter_input(INPUT_POST, 'name'),
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'senha' => filter_input(INPUT_POST, 'password'),
            'data_nascimento' => filter_input(INPUT_POST, 'birthday')
        ];

        $user = new UserModel;

        if($user->findByEmail($data['email'])) {
            die('Usuário já existente');
        }

        if($user->create($data)) {
            header('Location: ' . URL . 'login');
        }
    }

    public function logout()
    {
        //
    }
}