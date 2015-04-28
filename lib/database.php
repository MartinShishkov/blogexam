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

        // ensures that the database connection
        // has been established successfully and
        // check for any errors if it hasn't
        if($db->connect_errno > 0){
            die('Unable to connect to database [' . $db->connect_error . ']');
        }
        else{
            //echo "Connected to database";
        }

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