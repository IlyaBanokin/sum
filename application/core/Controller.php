<?php

namespace core;


abstract class Controller
{

    public $route;
    public $view;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if(!$this->checkAsl())
        {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    
    public function loadModel($name)
    {
        $path = 'models\\'.ucfirst($name);
        if(class_exists($path))
        {
            return new $path;
        }
    }

    public function checkAsl()
    {
        $this->acl = require_once 'application/acl/acl.php';
        if($this->inAcl('all'))
        {
            return true;
        }elseif (isset($_SESSION['admin']) and $this->inAcl('admin')){
            return true;
        }else{
            return false;
        }
    }

    public function inAcl($key)
    {
        return in_array($this->route['action'],$this->acl[$key]);
    }
}