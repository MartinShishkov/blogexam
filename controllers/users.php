<?php

namespace Controllers;

class Users_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/users/', get_class(), "user");
    }

    public function register(){
        if(!empty($_POST["username"]) &&
            !empty($_POST["password"]) &&
            !empty($_POST["confirm-password"]))
        {

            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm-password"];
            if($password != $confirm_password){
                echo("<p>Passwords do not match!</p>");
            }
            else{
                $user = array(
                    "username" => $username,
                    "passwordHash" => password_hash($password, PASSWORD_DEFAULT)
                );

                $result = $this->model->add($user);
                if($result > 0){
                    $this->login($username, $password);
                }
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";

        include_once $this -> layout;
    }

    public function login(){
        $home_location = DX_ROOT_URL . 'home/index';

        if(!empty($this->logged_user)){
            header("Location: " . $home_location);
        }

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $is_logged_in = $this->auth->login($username, $password);
            if($is_logged_in){
                header("Location: " . $home_location);
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