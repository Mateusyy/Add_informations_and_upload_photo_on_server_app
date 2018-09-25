<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.09.2018
 * Time: 17:54
 */

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        //pobranie url
        $url = $this->parseUrl();

        //szukanie danego kontrolera
        if(file_exists('Controllers/'.$url[0].'Controller.php')){
            $this->controller = $url[0].'Controller';
            unset($url[0]);
        }

        require_once 'Controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //szukanie metody
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $this->controller->redirect('/');
            }
        }

        //pozyskanie parametrow
        $this->params = $url? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseUrl(){
        if(isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
        }
    }
}