<?php

namespace Controllers;

class Users_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/users/', get_class(), "user");
    }

    public function register(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "register.php";
        $users = $this->model->get(2);
        var_dump($users);
        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }

    public function login(){

    }

}