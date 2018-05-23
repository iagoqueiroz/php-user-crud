<?php

namespace App\Core;

class App
{

    private $controller = null;
    private $action = null;
    private $params = [];

    public function __construct()
    {
        // split the url and set the properties
        $this->splitUrl();

        // check if has a controller
        if (!$this->controller) {
            $call = new \App\Controllers\HomeController;
            $call->index();
        } elseif (file_exists('application/Controllers/' . ucfirst($this->controller) . 'Controller.php')) {
            $controllerName = "\\App\\Controllers\\" . ucfirst($this->controller) . "Controller";
            $this->controller = new $controllerName();

            // check if the action exists in the controller
            if (method_exists($this->controller, $this->action)) {

                // checking for params
                if (!empty($this->params)) {
                    call_user_func_array([$this->controller, $this->action], $this->params);
                } else {
                    $this->controller->{$this->action}();
                }

            // if not, call index by default
            } else {
                $this->controller->index();
            }
        }
    }

    public function splitUrl()
    {
        if (isset($_GET['url'])) {

            $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
            $url = trim($url, '/');
            $url = explode('/', $url);

            $this->controller = $url[0] ?? null;
            $this->action = $url[1] ?? null;

            unset($url[0], $url[1]);

            $this->params = array_values($url);

        }
    }

}
