<?php

namespace Lib;

class Auth{
    private static $is_logged_in = false;
    private static $logged_user = array();

    private function __construct(){
        // setting the current session's time span
        // 1800 seconds = 30 minutes
        session_set_cookie_params(1800, "/");

        session_start();

        if(!empty($_SESSION["username"])){
            self::$is_logged_in = true;
            self::$logged_user = array(
                "user_id" => $_SESSION["user_id"],
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

    /*public function register($username, $password){
        $db = \Lib\Database::get_instance();
        $db_connection = $db->get_db();

        $statement = $db_connection->prepare("SELECT id FROM users WHERE username = ? AND passwordHash = MD5( ? ) LIMIT 1");
        if ($statement === FALSE) {
            die ("Mysql Error: " . $db_connection->error);
        }

        $statement->bind_param("ss", $username, $password);

        $statement->execute();

        $result_set = $statement->get_result();
        if($row = $result_set->fetch_assoc()){
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["id"];

            return true;
        }

        return false;
    }*/

    public function login($username, $password){
        $db = \Lib\Database::get_instance();
        $db_connection = $db->get_db();

        $statement = $db_connection->prepare("SELECT id, passwordHash FROM users WHERE username = ? LIMIT 1");
        if ($statement === FALSE) {
            die ("Mysql Error: " . $db_connection->error);
        }

        $statement->bind_param("s", $username);

        $statement->execute();

        $result_set = $statement->get_result();
        if($row = $result_set->fetch_assoc()){
            if(password_verify($password, $row["passwordHash"])){
                $_SESSION["username"] = $username;
                $_SESSION["user_id"] = $row["id"];
            }

            return true;
        }

        return false;
    }
}