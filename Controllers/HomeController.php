<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 24.09.2018
 * Time: 18:01
 */

class HomeController extends Controller{

    public function index(){
        $this->partial("header");
        $this->view("mainPage");
        $this->partial("footer");
    }

    public function setDB(){
        if(isset($_POST)){
            $user = $this->model('simple');
            $user->setDB($_POST);
        }
    }

    public function displayData(){
        $this->partial("header");

        if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == false){
            $this->view('login');
        }else{
            $user = $this->model("user");

            $data['stuff'] = $user->loadInformations();
            $this->view("displayData", $data);
        }

        $this->partial("footer");
    }

    public function login(){
        if(isset($_POST) && !empty($_POST)){
            $user = $this->model("user");

            $errors = $user->checkLoginData($_POST);

            $this->redirect("/ProjectTest/Home/displayData");
            if(count($errors) > 0)
                return $errors;
            else
                return true;
        }

    }
}