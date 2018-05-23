<?php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require_once APP . 'Views/_partials/header.php';
        require_once APP . 'Views/home/index.php';
        require_once APP . 'Views/_partials/footer.php';
    }

    public function teste()
    {
        echo "HOME PAGE - TESTE";
    }
}
