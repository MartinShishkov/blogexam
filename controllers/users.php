<?php

namespace Controllers;

class Users_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/users/', get_class(), "user");
    }

    public function register(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";

        include_once $this -> layout;
    }

    public function view($id){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";
        $users = $this->model->get($id);
        var_dump($users);
        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }

    public function login(){
        $auth = \Lib\Auth::get_instance();
        var_dump($_SESSION);

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $is_logged_in = $auth->login($username, $password);
            var_dump($is_logged_in);
        }

        var_dump($_POST);
        $template_name = DX_ROOT_DIR . $this -> views_dir . "login.php";

        include_once $this -> layout;
    }

}