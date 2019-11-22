<?php

namespace core;

class View
{

    public $path;
    public $route;
    public $layouts = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];

    }

    public function getViews($title,$vars = [])
    {
        extract($vars); //Распаковывает массив в переменные $vars = ['name' => 'Vasya'] $name = Vasya
        $path = 'application/views/'.$this->path.'.php';
        if (file_exists($path))
        {
        ob_start(); // Заносит в буфер обмена путь
        require_once $path;
        $content = ob_get_clean();
        require_once 'application/views/layouts/'.$this->layouts.'.php';
        }else{
            echo 'Файл не найден:'.$this->path.'.php';
        }
    }

    public function redirect($url)
    {
        header('location:'.$url);
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if(file_exists($path))
        {
            require_once $path;
        }
        exit;
    }

    public function message($status,$message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url)
    {
        exit(json_encode(['url' => $url]));
    }
}