<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $pageParams = [];
    private $param = [];

    function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $val)
        {
           $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $params)
        {
            if (preg_match($route, $url,$matches))
            {
               $this->pageParams = $params;
               $this->param = $matches;
               return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match())
        {
            $path = 'application\controllers\\'.ucfirst($this->pageParams['controller']).'Controller';
            if (class_exists($path))
            {
               $action = $this->pageParams['action'].'Action';
               if (method_exists($path, $action))
               {
                   $controller = new $path($this->pageParams);
                   if (!empty($this->param))
                   {
                       $controller->$action($this->param);
                   }else{
                       $controller->$action();
                   }
               }else{
                   View::errorCode(404);
               }
            }else{
                View::errorCode(404);
            }
        }
    }
}