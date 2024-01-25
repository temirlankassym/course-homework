<?php
declare(strict_types=1);
namespace App\Controllers;

class Route{
    private array $routes;

    public function register(string $route, callable|array $action){
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve(string $routesUri){
        $route = explode('?',$routesUri)[0];
        $action = $this->routes[$route] ?? null;

        if(!$action){
            echo "404";
            return;
        }

        if(is_callable($action))
            return call_user_func($action);

        if(is_array($action)){
            $class = new $action[0];
            $method = $action[1];

            if(method_exists($class,$method)){
                return call_user_func([$class,$method]);
            }
        }
    }
}