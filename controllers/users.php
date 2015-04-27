<?php

namespace Controllers;

class Users_Controller{
    public function __construct(){
        echo("users controller created.");
    }

    public function register(){
        include_once DX_ROOT_DIR . "views/users/register.php";
    }

    public function login(){

    }

}