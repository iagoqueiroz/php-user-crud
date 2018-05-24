<?php
namespace App\Controllers;

use App\Models\UserModel;

class LoginController
{
    public function index()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {
            header('Location: ' . URL . 'home');
        }

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/login/login.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function authenticate()
    {
        $data = [
            'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'senha' => filter_input(INPUT_POST, 'password'),
        ];

        $model = new UserModel;

        if (!$user = $model->findByEmail($data['email'])) {
            die('Usuário não cadastrado');
        }

        if (!password_verify($data['senha'], $user->senha)) {
            die('Senha incorreta, tente novamente');
        }

        $_SESSION['user_logged'] = true;
        $_SESSION['user_info']   = ['id' => $user->id, 'name' => $user->nome, 'email' => $user->email];

        header('Location: ' . URL . 'users');
    }

    public function register()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {
            header('Location: ' . URL . 'home');
        }

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/login/register.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function registration()
    {
        $data = [
            'nome'            => filter_input(INPUT_POST, 'name'),
            'email'           => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'senha'           => filter_input(INPUT_POST, 'password'),
            'data_nascimento' => filter_input(INPUT_POST, 'birthday'),
        ];
        // hashing the password
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

        $model = new UserModel;

        if ($model->findByEmail($data['email'])) {
            die('Usuário já existente');
        }

        if ($model->create($data)) {
            header('Location: ' . URL . 'login');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_logged'])) {
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_info']);
        }

        header('Location: ' . URL . 'login');
    }
}
