<?php
namespace App\Controllers;

use App\Traits\AuthenticableTrait;

class HomeController
{
    use AuthenticableTrait;

    public function index()
    {
        $this->authenticated();

        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/home/index.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function teste()
    {
        echo "HOME PAGE - TESTE";
    }
}
