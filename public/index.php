<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

require_once ROOT . 'vendor/autoload.php';

use \App\Core\App as Application;

$app = new Application();