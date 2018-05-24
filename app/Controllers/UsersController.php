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
        $page  = isset($_GET['page']) ? filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) : 1;
        $limit = 5;

        $model = new UserModel;

        $total    = $model->countTotal();
        $maxPages = ceil($total / $limit);
        $page     = ($page > $maxPages) ? $maxPages : $page;

        $offset = ($limit * $page) - $limit;
        $users  = $model->paginate($offset, $limit);

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/index.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function show($id)
    {
        $this->authenticated();

        $id    = filter_var($id, FILTER_VALIDATE_INT);
        $model = new UserModel;

        $user = $model->find($id);

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/show.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function edit($id)
    {
        $this->authenticated();

        $model = new UserModel;
        $user  = $model->find($id);

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/edit.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function update($id)
    {
        $this->authenticated();
        $auth = $this->getUser();

        $data = [
            'nome'            => filter_input(INPUT_POST, 'nome'),
            'email'           => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'senha'           => filter_input(INPUT_POST, 'senha'),
            'data_nascimento' => filter_input(INPUT_POST, 'data_nascimento'),
            'emissao'         => filter_input(INPUT_POST, 'emissao'),
            'data_emissao'    => filter_input(INPUT_POST, 'data_emissao'),
        ];

        if (count($data = array_filter($data))) {
            // hashing the password
            $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

            $model = new UserModel;
            $model->update($data, $id);

            if ($id == $auth['id']) {
                $_SESSION['user_info']['name']  = $data['nome'];
                $_SESSION['user_info']['email'] = $data['email'];
            }

            header('Location: ' . URL . 'users');
        }
    }

    public function delete($id)
    {
        $this->authenticated();
        $auth = $this->getUser();

        if ($id == $auth['id']) {
            unset($_SESSION['user_logged']);
            unset($_SESSION['user_info']);
        }

        $model = new UserModel;
        $model->delete($id);

        header('Location: ' . URL . 'users');
    }

    public function create()
    {
        $this->authenticated();

        $data = [
            'nome'            => filter_input(INPUT_POST, 'nome'),
            'email'           => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
            'senha'           => filter_input(INPUT_POST, 'senha'),
            'data_nascimento' => filter_input(INPUT_POST, 'data_nascimento'),
            'emissao'         => filter_input(INPUT_POST, 'emissao'),
            'data_emissao'    => filter_input(INPUT_POST, 'data_emissao'),
        ];

        if (count($data = array_filter($data))) {
            $model = new UserModel;

            if ($model->findByEmail($data['email'])) {
                echo ('E-mail já em uso. Por favor cadastre o usuário com outro e-mail.');
                die();
            }
            // hashing the password
            $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

            $model->create($data);

            header('Location: ' . URL . 'users');
        }

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/users/create.php';
        require_once APP . 'Views/_partials/footer.php';
    }
}
