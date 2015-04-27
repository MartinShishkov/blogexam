<?php

namespace Lib;

class Auth{
    private static $is_logged_in = false;
    private static $logged_user = array();

    private function __construct(){
        session_start();

        if(!empty($_SESSION["username"])){
            self::$is_logged_in = true;
            self::$logged_user = array(
                "id" => $_SESSION["id"],
                "username" => $_SESSION["username"]
            );
        }
    }

    public static function get_instance(){
        static $instance = null;

        if($instance === null){
            $instance = new static();
        }

        return $instance;
    }

    public static function is_logged_in(){
        return self::$is_logged_in;
    }

    public static function get_logged_user(){
        return self::$logged_user;
    }
}