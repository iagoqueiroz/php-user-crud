<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Traits\AuthenticableTrait;

class UsersController
{
    use AuthenticableTrait;

    public function index()
    {
        $this->authenticated();

        $model = new UserModel;
        $users = $model->findAll();

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/index.php';
        require_once APP . 'Views/_partials/footer.php';
    }
}