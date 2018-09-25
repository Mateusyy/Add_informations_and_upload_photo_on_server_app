<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.09.2018
 * Time: 17:54
 */

class Controller {
    public function model($model){
        require_once 'Models/'.$model.'.php';
        return new $model();
    }
    public function view($view, $data = []){
        require_once 'Views/'.$view.'.php';
    }
    public function partial($part){
        require_once 'Views/Partials/'.$part.'.php';
    }
    public function redirect($url){
        if (headers_sent()){
        }else {
            header("location: ".$url);
        }
    }
}