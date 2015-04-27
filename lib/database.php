<?php

namespace Lib;

// A singleton class
class Database{
    private static $db = null;

    public function __construct(){
        $host = DB_HOST;
        $username = DB_USER;
        $pass = DB_PASS;
        $db_name = DB_NAME;

        $db = new \mysqli($host, $username, $pass, $db_name);
        self::$db = $db;
    }

    public static function get_instance(){
        static $instance = null;

        if($instance === null){
            $instance = new static();
        }

        return $instance;
    }

    public static function get_db(){
        return self::$db;
    }
}