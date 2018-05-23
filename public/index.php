<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('PUBLIC_PATH', ROOT . 'public' . DIRECTORY_SEPARATOR);

require_once ROOT . 'vendor/autoload.php';
require_once APP . 'config/config.php';

use \App\Core\App as Application;

$app = new Application();