<?php

namespace Controllers;

class Users_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/users/', get_class(), "user");
    }

    public function register(){
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $is_logged_in = $this->auth->login($username, $password);
            if($is_logged_in){
                header("Location: " . DX_ROOT_URL . 'posts/index');
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";

        include_once $this -> layout;
    }

    public function login(){
        if(!empty($this->logged_user)){
            header("Location: " . DX_ROOT_URL . 'posts/index');
        }

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $is_logged_in = $this->auth->login($username, $password);
            if($is_logged_in){
                header("Location: " . DX_ROOT_URL . 'posts/index');
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "login.php";

        include_once $this -> layout;
    }

    public function logout(){
        session_destroy();
        header("Location: " . DX_ROOT_URL);
    }

    public function view($id){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";
        $users = $this->model->get($id);
        var_dump($users);
        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }

}