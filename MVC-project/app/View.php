<?php
declare(strict_types=1);
namespace App;

class View{
    protected string $view;
    protected array $params;

    public static function make(string $view, array $params = []){
        $instance = new self();
        $instance->view = $view;
        $instance->params = $params;
        return $instance;
    }

    public function render(){
        $viewPath = "views/fileviews/{$this->view}.php";
        include $viewPath;
    }

    public function __toString(): string{
        ob_start();
        $this->render();
        return ob_get_clean();
    }
}