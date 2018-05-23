<?php
namespace App\Traits;

use App\Models\UserModel;

trait AuthenticableTrait
{
    public function authenticated()
    {
        if (!isset($_SESSION['user_logged'])) {
            header('Location: ' . URL . 'login');
        }
    }

    public function getUser($onModel = false)
    {
        if (!isset($_SESSION['user_logged'])) {
            die('Nenhum usuário logado');
        }

        if ($onModel) {
            $model = new UserModel;
            $user = $model->find($_SESSION['user_info']['id']);

            return $user;
        }

        return (array) $_SESSION['user_info'];
    }
}
