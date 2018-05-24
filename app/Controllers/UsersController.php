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
        $page = isset($_GET['page']) ? filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) : 1;
        $limit = 1;

        $model = new UserModel;
        
        $total = $model->countTotal();
        $maxPages = ceil($total / $limit);
        $page = ($page > $maxPages) ? $maxPages : $page;
        
        $offset = ($limit * $page) - $limit;
        $users = $model->paginate($offset, $limit);

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/index.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function show($id)
    {
        $this->authenticated();

        $id = filter_var($id, FILTER_VALIDATE_INT);
        $model = new UserModel;

        $user = $model->find($id);

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/show.php';
        require_once APP . 'Views/_partials/footer.php';
    }
}