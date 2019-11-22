<?php
require_once 'application/lib/Dev.php';

use core\Router;

session_start();

$router = new Router();

$router->run();