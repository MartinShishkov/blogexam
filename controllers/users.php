<?php

namespace Controllers;

class Users_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views\users\\', get_class(), "user");
    }

    public function register(){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
            $confirm_password = trim($_POST["confirm-password"]);

            if(!empty($username) && !empty($password))
            {
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
            else{
                echo("Empty username or password are not allowed!");
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";

        include_once $this -> layout;
    }

    public function login(){
        $home_location = DX_ROOT_URL . 'home\index';

        if(!empty($this->logged_user)){
            header("Location: " . $home_location);
        }

        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            if(!empty($username) && !empty($password)){
                $is_logged_in = $this->auth->login($username, $password);
                if($is_logged_in){
                    header("Location: " . $home_location);
                }
            }
            echo("Empty username or password are not allowed!");
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